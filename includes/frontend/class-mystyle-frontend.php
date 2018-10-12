<?php

/**
 * MyStyle FrontEnd class.
 * The MyStyle FrontEnd class sets up and controls the MyStyle front end
 * interface.
 *
 * @package MyStyle
 * @since 0.2.1
 */
class MyStyle_FrontEnd {

	/**
	 * Singleton class instance
	 * @var MyStyle_Frontend
	 */
	private static $instance;

	/**
	 * Stores the current user (when the class is instantiated as a singleton).
	 * @var WP_User
	 */
	private $user;

	/**
	 * Stores the current session (when the class is instantiated as a
	 * singleton).
	 * @var MyStyle_Session
	 */
	private $session;

	/**
	 * The current MyStyle_Design. This is retrieved via the design_id query
	 * variable in the url. If there isn't a design_id in the url, it will be
	 * null.
	 * @var MyStyle_Design
	 */
	private $design;

	/**
	 * Stores the currently thrown exception (if any) (when the class is
	 * instantiated as a singleton).
	 * @var MyStyle_Exception
	 */
	private $exception;

	/**
	 * Stores the current (when the class is instantiated as a singleton) status
	 * code.  We store it here since php's http_response_code() function wasn't
	 * added until php 5.4.
	 * see: http://php.net/manual/en/function.http-response-code.php
	 * @var int
	 */
	private $http_response_code;

	/**
	 * Constructor, constructs the class and sets up the hooks.
	 */
	public function __construct() {
		add_filter('query_vars', array(&$this, 'add_query_vars_filter'), 10, 1);

		add_action('init', array(&$this, 'init'), 10, 0);
		add_action('template_redirect', array(&$this, 'init_vars'), 10, 0);
	}

	/**
	 * Init the MyStyle front end.
	 */
	public function init() {
		//Add the MyStyle frontend stylesheet to the WP frontend head
		wp_register_style('myStyleFrontendStylesheet', MYSTYLE_ASSETS_URL . 'css/frontend.css');
		wp_enqueue_style('myStyleFrontendStylesheet');

		//Add the WordPress Dashicons icon font to the frontend.
		wp_enqueue_style('dashicons');

		//Add the swfobject.js file to the WP head
		wp_register_script('swfobject', 'http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
		wp_enqueue_script('swfobject');
	}

	/**
	 * Init the MyStyle front end variables.
	 */
	public function init_vars() {

		$this->user = wp_get_current_user();

		$this->session = MyStyle()->get_session();

		//get the design from the url
		$design_id = intval(get_query_var('design_id', null));

		if ($design_id != null) {
			//get the design.  If the user doesn't have access, an exception
			//is thrown.
			try {

				$this->design = MyStyle_DesignManager::get(
								$design_id, $this->user, $this->session
				);

				if ($this->design == null) {
					throw new MyStyle_Not_Found_Exception('Design \'' . $design_id . '\' not found.');
				}

				// When an exception is thrown, set the status code and set the
				// exception in the singleton instance, it will later be used by
				// the shortcode and view layer
			} catch (MyStyle_Not_Found_Exception $ex) {
				$response_code = 404;
				status_header($response_code);

				$this->exception = $ex;
				$this->http_response_code = $response_code;
			} catch (MyStyle_Unauthorized_Exception $ex) { //unauthenticated
				//$response_code = 401;
				$response_code = 200;
				status_header($response_code);

				$this->exception = $ex;
				$this->http_response_code = $response_code;
			} catch (MyStyle_Forbidden_Exception $ex) {
				//$response_code = 403;
				$response_code = 200;
				status_header($response_code);

				$this->exception = $ex;
				$this->http_response_code = $response_code;
			}
		}
	}

	/**
	 * Add design_id as a custom query var.
	 * @param array $vars
	 * @return string
	 */
	public function add_query_vars_filter($vars) {
		$vars[] = 'design_id';

		return $vars;
	}

	/**
	 * Gets the current WP_User.
	 * @return WP_User Returns the current WordPress user, if any.
	 */
	public function get_user() {
		return $this->user;
	}

	/**
	 * Gets the current MyStyle_Session.
	 * @return MyStyle_Session Returns the current MyStyle_Session.
	 */
	public function get_session() {
		return $this->session;
	}

	/**
	 * Sets the current design. This is just here for testing purposes.
	 * @param MyStyle_Design $design The design to set as the current design.
	 */
	public function set_design(MyStyle_Design $design) {
		$this->design = $design;
	}

	/**
	 * Gets the current design.
	 * @return MyStyle_Design Returns the currently loaded MyStyle_Design.
	 */
	public function get_design() {
		return $this->design;
	}

	/**
	 * Gets the current exception.
	 * @return MyStyle_Exception Returns the currently thrown MyStyle_Exception
	 * if any. This is used by the shortcode and view layer.
	 */
	public function get_exception() {
		return $this->exception;
	}

	/**
	 * Resets the singleton instance. This is used during testing if we want to
	 * clear out the existing singleton instance.
	 * @return MyStyle_Design_Profile_Page Returns the singleton instance of
	 * this class.
	 */
	public static function reset_instance() {

		self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Gets the singleton instance.
	 * @return MyStyle_Design_Profile_Page Returns the singleton instance of
	 * this class.
	 */
	public static function get_instance() {
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}
