<?php

require_once(MYSTYLE_PATH . 'admin/help/help-dispatch.php');

/**
 * The HelpDispatchTest class includes tests for testing the functions in the
 * help-dispatch.php file.
 *
 * @package MyStyle
 * @since 1.1.29
 */
class HelpDispatchTest extends WP_UnitTestCase {
    
    /**
     * Test that the mystyle_help_dispatch function properly dispatches help for
     * the options page.
     */    
    public function test_help_dispatch_for_options_page() {
        //set up the variables
        $contextual_help = "";
        global $mystyle_hook;
        $mystyle_hook = 'mock-hook';
        $screen_id = $mystyle_hook;
        $screen = WP_Screen::get($mystyle_hook);
        
        //Assert that the MyStyle help is not in the screen.
        $this->assertNotContains('MyStyle Plugin Help', serialize($screen));
        
        //run the function
        mystyle_help_dispatch($contextual_help, $screen_id, $screen);
        
        //Asset that the MyStyle help is now in the screen.
        $this->assertContains('MyStyle Plugin Help', serialize($screen));
    }
    
    /**
     * Test that the mystyle_help_dispatch function properly dispatches help for
     * the options widgets page.
     */    
    public function test_help_dispatch_for_widgets_page() {
        //set up the variables
        $contextual_help = "";
        $screen_id = 'widgets';
        $screen = WP_Screen::get($screen_id);
        
        //Assert that the MyStyle help is not in the screen.
        $this->assertNotContains('MyStyle Widget Help', serialize($screen));
        
        //run the function
        mystyle_help_dispatch($contextual_help, $screen_id, $screen);
        
        //Asset that the MyStyle help is now in the screen.
        $this->assertContains('MyStyle Widget Help', serialize($screen));
    }
    
}

