<?php

require_once( MYSTYLE_INCLUDES . 'frontend/class-mystyle-cart.php' );
require_once( MYSTYLE_PATH . 'tests/mocks/mock-mystyle-woocommerce.php' );
require_once( MYSTYLE_PATH . 'tests/mocks/mock-mystyle-woocommerce-cart.php' );
require_once( MYSTYLE_PATH . 'tests/mocks/mock-mystyle-designqueryresult.php' );

/**
 * The MyStyleCartTest class includes tests for testing the MyStyle_Cart class.
 *
 * @package MyStyle
 * @since 1.5.0
 */
class MyStyleCartTest extends WP_UnitTestCase {

	/**
	 * Overrwrite the setUp function so that our custom tables will be persisted
	 * to the test database.
	 */
	function setUp() {
		// Perform the actual task according to parent class.
		parent::setUp();

		//Create the tables
		MyStyle_Install::create_tables();
	}

	/**
	 * Overrwrite the tearDown function to remove our custom tables.
	 */
	function tearDown() {
		global $wpdb;
		// Perform the actual task according to parent class.
		parent::tearDown();

		//Drop the tables that we created
		$wpdb->query("DROP TABLE IF EXISTS " . MyStyle_Design::get_table_name());
		$wpdb->query("DROP TABLE IF EXISTS " . MyStyle_Session::get_table_name());
	}

	/**
	 * Test the constructor
	 */
	public function test_constructor() {
		$mystyle_cart = new MyStyle_Cart();

		global $wp_filter;

		//Assert that the filter_cart_button_text function is registered.
		$function_names = get_function_names($wp_filter['woocommerce_product_single_add_to_cart_text']);
		$this->assertContains('filter_cart_button_text', $function_names);

		//Assert that the filter_add_to_cart_handler function is registered.
		$function_names = get_function_names($wp_filter['woocommerce_add_to_cart_handler']);
		$this->assertContains('filter_add_to_cart_handler', $function_names);

		//Assert that the mystyle_add_to_cart_handler_customize function is registered.
		$function_names = get_function_names($wp_filter['woocommerce_add_to_cart_handler_mystyle_customizer']);
		$this->assertContains('mystyle_add_to_cart_handler_customize', $function_names);

		//Assert that the mystyle_add_to_cart_handler function is registered.
		$function_names = get_function_names($wp_filter['woocommerce_add_to_cart_handler_mystyle_add_to_cart']);
		$this->assertContains('mystyle_add_to_cart_handler', $function_names);

		//Assert that the loop_add_to_cart_link function is registered.
		$function_names = get_function_names($wp_filter['woocommerce_loop_add_to_cart_link']);
		$this->assertContains('loop_add_to_cart_link', $function_names);
	}

	/**
	 * Test the init function.
	 */
	public function test_init() {
		global $wp_filter;

		//call the function
		$mystyle_cart = new MyStyle_Cart();
		$mystyle_cart->init();

		//Assert that the expected functions are registered.
		$function_names = get_function_names($wp_filter['woocommerce_cart_item_thumbnail']);
		$this->assertContains('modify_cart_item_thumbnail', $function_names);

		$function_names = get_function_names($wp_filter['woocommerce_in_cart_product_thumbnail']);
		$this->assertContains('modify_cart_item_thumbnail', $function_names);

		$function_names = get_function_names($wp_filter['woocommerce_cart_item_name']);
		$this->assertContains('modify_cart_item_name', $function_names);
	}

	/**
	 * Mock the mystyle_metadata
	 * @param type $metadata
	 * @param type $object_id
	 * @param type $meta_key
	 * @param type $single
	 * @return string
	 */
	function mock_mystyle_metadata($metadata, $object_id, $meta_key, $single) {
		return 'yes';
	}

	/**
	 * Test the filter_cart_button_text function when product isn't mystyle
	 * enabled.
	 * @global \WC_Product $product
	 */
	public function test_filter_cart_button_text_doesnt_modify_button_text_when_not_mystyle_enabled() {
		global $product;

		$product = create_test_product();

		$GLOBALS['post'] = $product;

		//call the function
		$text = MyStyle_Cart::get_instance()->filter_cart_button_text('Add to Cart');

		//Assert that the expected text is returned
		$this->assertContains('Add to Cart', $text);
	}

	/**
	 * Test the filter_cart_button_text function when product is mystyle enabled.
	 */
	public function test_filter_cart_button_text_modifies_button_text_when_mystyle_enabled() {
		global $product;

		//Mock the global $post variable
		//$product_id = create_wc_test_product();
		//$product = new \WC_Product_Simple( $product_id )
		//;
		$product = WC_Helper_Product::create_simple_product();
		add_post_meta($product->get_id(), '_mystyle_enabled', 'yes');
		$GLOBALS['post'] = $product;

		//Mock the mystyle_metadata
		add_filter('get_post_metadata', array(&$this, 'mock_mystyle_metadata'), true, 4);

		//run the function
		$text = MyStyle_Cart::get_instance()->filter_cart_button_text('Add to Cart');

		//Assert that the expected text is returned
		$this->assertContains('Customize', $text);
	}

	/**
	 * Test the filter_add_to_cart_handler function when product isn't mystyle
	 * enabled.
	 */
	public function test_filter_add_to_cart_handler_doesnt_modify_handler_when_not_mystyle_enabled() {
		global $product;

		//Mock the global $post variable
		$product_id = create_wc_test_product();
		$product = new \WC_Product_Simple($product_id);
		$GLOBALS['post'] = $product;

		$text = MyStyle_Cart::get_instance()->filter_add_to_cart_handler('test_handler', $product);

		//Assert that the expected text is returned
		$this->assertContains('test_handler', $text);
	}

	/**
	 * Test the filter_add_to_cart_handler function when product is mystyle enabled.
	 */
	public function test_filter_add_to_cart_handler_modifies_handler_when_mystyle_enabled() {
		global $product;

		//Mock the global $post variable
		$product_id = create_wc_test_product();
		$product = new \WC_Product_Simple($product_id);
		$GLOBALS['post'] = $product;

		//Mock the mystyle_metadata
		add_filter('get_post_metadata', array(&$this, 'mock_mystyle_metadata'), true, 4);

		if (MyStyle()->get_WC()->version_compare('2.3', '<')) { //we intercept the filter and call the the handler in old versions of WC, so this test always fails
			//call the function
			$text = MyStyle_Cart::get_instance()->filter_add_to_cart_handler('test_handler', $product);

			//Assert that the expected text is returned
			$this->assertContains('mystyle_customizer', $text);
		}
	}

	/**
	 * Test the loop_add_to_cart_link function for a regular (uncustomizable)
	 * product.
	 */
	public function test_loop_add_to_cart_link_for_uncustomizable_product() {
		//Create a mock link
		$link = '<a href="">link</a>';

		//Mock the global $post variable
		$product_id = create_wc_test_product();
		$product = new \WC_Product_Simple($product_id);
		$GLOBALS['post'] = $product;

		$html = MyStyle_Cart::get_instance()->loop_add_to_cart_link($link, $product);

		$this->assertContains($link, $html);
	}

	/**
	 * Test the loop_add_to_cart_link function for a customizable product.
	 */
	public function test_loop_add_to_cart_link_for_customizable_product() {
		//Create a mock link
		$link = '<a href="">link</a>';

		//Mock the global $post variable
		$product_id = create_wc_test_product();
		$product = new \WC_Product_Simple($product_id);
		$GLOBALS['post'] = $product;

		//Mock the mystyle_metadata
		add_filter('get_post_metadata', array(&$this, 'mock_mystyle_metadata'), true, 4);

		//Create the MyStyle Customize page (needed by the function)
		MyStyle_Customize_Page::create();

		//Run the function
		$html = MyStyle_Cart::get_instance()->loop_add_to_cart_link($link, $product);

		//var_dump($html);

		$cust_pid = MyStyle_Customize_Page::get_id();
		$h = base64_encode(json_encode(array('post' => array('quantity' => 1, 'add-to-cart' => $product_id))));
		$expected_url = 'http://example.org/';
		$expected_url = add_query_arg('page_id', $cust_pid, $expected_url);
		$expected_url = add_query_arg('product_id', $product_id, $expected_url);
		$expected_url = add_query_arg('h', $h, $expected_url);
		$expected_url = esc_url($expected_url);

		//$expectedUrl = 'http://example.org/?page_id=' . $cust_pid . '&#038;product_id=' . $product_id . '&#038;h=' . $h;

		$expected_html = '<a href="' . $expected_url . '" rel="nofollow" class="button  product_type_simple" >Customize</a>';

		$this->assertEquals($expected_html, $html);
	}

	/**
	 * Test the loop_add_to_cart_link function for a customizable but variable
	 * product.  It should leave the button "Select Options" unchanged.
	 */
	public function test_loop_add_to_cart_link_for_variable_product() {
		$mystyle_cart = new MyStyle_Cart();

		//Create a mock link
		$link = '<a href="">link</a>';

		//Mock the global $post variable
		$product = WC_Helper_Product::create_variation_product();

		//fix the test data (WC < 3.0 is broken)
		fix_variation_product($product);

		$GLOBALS['post'] = $product;

		$html = $mystyle_cart->loop_add_to_cart_link($link, $product);

		//assert that the link is returned unmodified
		$this->assertContains($link, $html);
	}

	/**
	 * Test the mystyle_add_to_cart_handler function.
	 */
	public function test_mystyle_add_to_cart_handler() {
		global $woocommerce;

		$mystyle_cart = MyStyle_Cart::get_instance();

		//Create the MyStyle Customize page
		MyStyle_Customize_Page::create();

		//Mock woocommerce
		$woocommerce = new MyStyle_MockWooCommerce();
		$woocommerce->cart = new MyStyle_MockWooCommerceCart();

		//Mock the request
		$_REQUEST['add-to-cart'] = 1;
		$_REQUEST['design_id'] = 2;
		$_REQUEST['quantity'] = 1;

		//Disable the redirect
		add_filter('wp_redirect', array(&$this, 'filter_wp_redirect'), 10, 2);

		//call the function
		$mystyle_cart->mystyle_add_to_cart_handler('http://www.example.com');

		//Assert that the mock add_to_cart function was called.
		$this->assertEquals(1, $woocommerce->cart->add_to_cart_call_count);
	}

	/**
	 * Disable the wp_redirect function so that it returns false and doesn't
	 * perform the redirect. This is used by the
	 * test_mystyle_add_to_cart_handler function below.
	 * @param string $location
	 * @param integer $status
	 * @return type
	 */
	function filter_wp_redirect($location, $status) {
		global $filter_wp_redirect_called;

		$filter_wp_redirect_called = true;
	}

	/**
	 * Test the mystyle_add_to_cart_handler_customize function.
	 */
	public function test_mystyle_add_to_cart_handler_customize() {
		global $product;
		global $filter_wp_redirect_called;

		//Mock the global $post variable
		$product_id = create_wc_test_product();
		$product = new \WC_Product_Simple($product_id);
		$GLOBALS['post'] = $product;

		//Set the expected request variables
		$_REQUEST['add-to-cart'] = $product_id;
		$_REQUEST['quantity'] = 1;

		//Create the MyStyle Customize page (needed by the function)
		MyStyle_Customize_Page::create();

		//Disable the redirect
		add_filter('wp_redirect', array(&$this, 'filter_wp_redirect'), 10, 2);

		//call the function
		$mystyle_cart = MyStyle_Cart::get_instance();
		$mystyle_cart->mystyle_add_to_cart_handler_customize('');

		//Assert that the function called the filter_wp_redirect function (see above)
		$this->assertTrue($filter_wp_redirect_called);
	}

	/**
	 * Test the modify_cart_item_thumbnail function.
	 */
	public function test_modify_cart_item_thumbnail() {
		//Create the MyStyle Customize page (needed for the link in the email)
		MyStyle_Customize_Page::create();

		//Create the MyStyle Design Profile page (needed for the link in the email)
		MyStyle_Design_Profile_Page::create();

		$design_id = 1;
		$get_image = '<img src="someimage.jpg"/>';
		$cart_item = array();
		$cart_item['mystyle_data'] = array();
		$cart_item['mystyle_data']['design_id'] = $design_id;
		$cart_item_key = null;

		//Create the design (note: we should maybe mock this in the tested class)
		$result_object = new MyStyle_MockDesignQueryResult($design_id);
		$design = MyStyle_Design::create_from_result_object($result_object);
		MyStyle_DesignManager::persist($design);

		//call the function
		$mystyle_cart = MyStyle_Cart::get_instance();
		$new_image = $mystyle_cart->modify_cart_item_thumbnail($get_image, $cart_item, $cart_item_key);

		$this->assertContains('http://www.example.com/example.jpg', $new_image);
	}

	/**
	 * Test the modify_cart_item_name function.
	 */
	public function test_modify_cart_item_name() {
		global $wp_rewrite;

		//Create the MyStyle Design Profile page (needed for the link in the email)
		MyStyle_Design_Profile_Page::create();

		//disable page permalinks
		$wp_rewrite->page_structure = null;

		$design_id = 1;
		$name = 'Foo';
		$cart_item = array();
		$cart_item['mystyle_data'] = array();
		$cart_item['mystyle_data']['design_id'] = $design_id;
		$cart_item_key = null;

		//Create the design (note: we should maybe mock this in the tested class)
		$result_object = new MyStyle_MockDesignQueryResult($design_id);
		$design = MyStyle_Design::create_from_result_object($result_object);
		MyStyle_DesignManager::persist($design);

		//call the function
		$mystyle_cart = MyStyle_Cart::get_instance();
		$new_name = $mystyle_cart->modify_cart_item_name($name, $cart_item, $cart_item_key);

		$expected = '<a href="http://example.org/?page_id=' . MyStyle_Design_Profile_Page::get_id() . '&#038;design_id=1">Foo</a>';

		//Assert that the expected name is returned
		$this->assertEquals($expected, $new_name);
	}

}
