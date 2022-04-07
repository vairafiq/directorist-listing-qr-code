<?php
/**
 * Plugin Name: Directorist - Listing QR Code
 * Plugin URI: https://exlac.com/
 * Description: This is an extension for Directorist Plugin. You can display listing QR Code of a listing easily by this extension.
 * Version: 0.1.1
 * Author: Exlac
 * Author URI: https://exlac.com
 * License: GPLv2 or later
 * Text Domain: directorist-listing-qr-code
 * Domain Path: /languages
 */


// prevent direct access to the file
defined('ABSPATH') || die('No direct script access allowed!');
if (!class_exists('Directorist_QR_Code')){
    final class Directorist_QR_Code
    {


        /** Singleton *************************************************************/

        /**
         * @var Directorist_QR_Code The one true Directorist_QR_Code
         * @since 1.0
         */
        private static $instance;

        /**
         * Main Directorist_QR_Code Instance.
         *
         * Insures that only one instance of Directorist_QR_Code exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @return object|Directorist_QR_Code The one true Directorist_QR_Code
         * @uses Directorist_QR_Code::setup_constants() Setup the constants needed.
         * @uses Directorist_QR_Code::includes() Include the required files.
         * @uses Directorist_QR_Code::load_textdomain() load the language files.
         * @see  Directorist_QR_Code()
         * @since 1.0
         * @static
         * @static_var array $instance
         */
        public static function instance()
        {
            if (!isset(self::$instance) && !(self::$instance instanceof Directorist_QR_Code)) {
                self::$instance = new Directorist_QR_Code;
                self::$instance->setup_constants();

                add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));

                self::$instance->includes();
            }

            return self::$instance;
        }

        private function __construct()
        {
            /*making it private prevents constructing the object*/

        }

        /**
         * Throw error on object clone.
         *
         * The whole idea of the singleton design pattern is that there is a single
         * object therefore, we don't want the object to be cloned.
         *
         * @return void
         * @since 1.0
         * @access protected
         */
        public function __clone()
        {
            // Cloning instances of the class is forbidden.
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'directorist-listing-qr-code'), '1.0');
        }

        /**
         * Disable unserializing of the class.
         *
         * @return void
         * @since 1.0
         * @access protected
         */
        public function __wakeup()
        {
            // Unserializing instances of the class is forbidden.
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'directorist-listing-qr-code'), '1.0');
        }
        /**
         * Setup plugin constants.
         *
         * @access private
         * @return void
         * @since 1.0
         */
        private function setup_constants()
        {
            if ( ! defined( 'Directorist_QR_Code_FILE' ) ) { define( 'Directorist_QR_Code_FILE', __FILE__ ); }
            require_once plugin_dir_path(__FILE__) . '/config.php'; // loads constant from a file so that it can be available on all files.
        }

        /**
         * It  loads a template file from the Default template directory.
         * @param string $name Name of the file that should be loaded from the template directory.
         * @param array $args Additional arguments that should be passed to the template file for rendering dynamic  data.
         */
        public function load_template($template, $args = array())
        {
            dfaqs_get_template( $template, $args );
        }

        /**
         * It register the text domain to the WordPress
         */
        public function load_textdomain()
        {
            load_plugin_textdomain('directorist-listing-qr-code', false, Directorist_QR_Code_LANG_DIR);
        }

        /**
         * It Includes and requires necessary files.
         *
         * @access private
         * @return void
         * @since 1.0
         */
        private function includes()
        {
            require_once Directorist_QR_Code_INC_DIR . 'helper-functions.php';
            require_once Directorist_QR_Code_INC_DIR . 'directory_type.php';
            new Directorist_QR_Code_Post_Type_Manager();
        }
    }

    if ( ! function_exists( 'directorist_is_plugin_active' ) ) {
        function directorist_is_plugin_active( $plugin ) {
            return in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) || directorist_is_plugin_active_for_network( $plugin );
        }
    }
    
    if ( ! function_exists( 'directorist_is_plugin_active_for_network' ) ) {
        function directorist_is_plugin_active_for_network( $plugin ) {
            if ( ! is_multisite() ) {
                return false;
            }
                    
            $plugins = get_site_option( 'active_sitewide_plugins' );
            if ( isset( $plugins[ $plugin ] ) ) {
                    return true;
            }
    
            return false;
        }
    }


    /**
     * The main function for that returns Directorist_QR_Code
     *
     * The main function responsible for returning the one true Directorist_QR_Code
     * Instance to functions everywhere.
     *
     * Use this function like you would a global variable, except without needing
     * to declare the global.
     *
     *
     * @return object|Directorist_QR_Code The one true Directorist_QR_Code Instance.
     * @since 1.0
     */
    function Directorist_QR_Code()
    {
        return Directorist_QR_Code::instance();
    }

    // Instantiate Directorist Stripe gateway only if our directorist plugin is active
    if ( directorist_is_plugin_active( 'directorist/directorist-base.php' ) ) {
        Directorist_QR_Code(); // get the plugin running
    }
}