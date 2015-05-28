<?php

/**
 * MyStyle Admin class.
 * The MyStyle Admin class sets up and controls the MyStyle Plugin administrator
 * interace.
 *
 * @package MyStyle
 * @since 0.1.0
 */
class MyStyle_Admin {
    
    /**
     * Constructor, constructs the admin class and registers hooks.
     * menu.
     */
    public function __construct() {
        add_filter( 'plugin_action_links_' . MYSTYLE_BASENAME, array( &$this, 'add_settings_link' ) );
        
        add_action( 'admin_init', array( &$this, 'admin_init' ) );
        add_action( 'admin_notices', array( &$this, 'admin_notices' ) );
    }
    
    /**
     * Init the mystyle admin
     */
    public static function admin_init() {
        //Add the MyStyle admin stylesheet to the WP admin head
        wp_register_style( 'myStyleAdminStylesheet', plugins_url( '../../css/admin.css', __FILE__ ) );
        wp_enqueue_style( 'myStyleAdminStylesheet' );
        
        //Add the MyStyle admin js file to the WP admin head
        wp_register_script( 'myStyleAdminJavaScript', plugins_url( '../../js/admin.js', __FILE__ ) );
        wp_enqueue_script( 'myStyleAdminJavaScript' );
        
        $options = get_option(MYSTYLE_OPTIONS_NAME, array());
        $data_version = ( array_key_exists( 'version', $options ) ) ? $options['version'] : null;
        if( $data_version != MYSTYLE_VERSION ) {
            $options['version'] = MYSTYLE_VERSION;
            update_option( MYSTYLE_OPTIONS_NAME, $options );
            if( ! is_null( $data_version ) ) {  //skip if not an upgrade
                //do any necessary version data upgrades here
                $notices = get_option( MYSTYLE_NOTICES_NAME );
                $notices[] = 'Upgraded version from ' . $data_version . ' to ' . MYSTYLE_VERSION . '.';
                update_option( MYSTYLE_NOTICES_NAME, $notices );
            }
        }
    }

    /**
     * Add Notices in the administrator. Notices may be stored in the 
     * mystyle_options. Once the notices have been displayed, delete them from
     * the database.
     */
    public static function admin_notices() {
        $stored_notices = get_option( MYSTYLE_NOTICES_NAME );
        $screen = get_current_screen();
        $screen_id = ( !empty($screen) ? $screen->id : null );
        $notices = array();
        
        //stored notices
        if( $stored_notices ) {
            foreach( $stored_notices as $notice ) {
                $notices[] = $notice;
            }
            delete_option( MYSTYLE_NOTICES_NAME );
        }
        
        if( ! MyStyle_Options::are_keys_installed() ) {
            if( $screen_id != 'settings_page_mystyle' ) {
                $notices[]= 'You\'ve activated the MyStyle Plugin! Now let\'s <a href="options-general.php?page=mystyle">configure</a> it!';
            }
        }
        
        //print the notices
        foreach( $notices as $notice ) {
            echo '<div class="updated"><p><strong>MyStyle:</strong> ' . $notice . '</p></div>';
        }
    }
    
    /**
     * Add settings link on plugin page
     * @param array $links An array of existing links for the plugin
     * @return array The new array of links
     */
    public static function add_settings_link( $links ) { 
        $settings_link = '<a href="options-general.php?page=mystyle">Settings</a>'; 
        array_unshift( $links, $settings_link ); 
        return $links;
    }
    
    /**
     * Called when the plugin is activated.
     */
    static function activate() {
        MyStyle_Customize_Page::create();
    }

    /**
     * Called when the plugin is deactivated.
     */
    static function deactivate() {
        MyStyle_Customize_Page::delete();
    }
    
    /**
     * Function called when MyStyle is uninstalled
     */
    static function uninstall() {
        delete_option( MYSTYLE_OPTIONS_NAME );
        delete_option( MYSTYLE_NOTICES_NAME );
    }

}

