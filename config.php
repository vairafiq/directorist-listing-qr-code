<?php
// Plugin version.
if ( ! defined( 'Directorist_QR_Code_VERSION' ) ) {define( 'Directorist_QR_Code_VERSION', $version );}
// Plugin Folder Path.
if ( ! defined( 'Directorist_QR_Code_DIR' ) ) { define( 'Directorist_QR_Code_DIR', plugin_dir_path( Directorist_QR_Code_FILE ) ); }
// Plugin Folder URL.
if ( ! defined( 'Directorist_QR_Code_URL' ) ) { define( 'Directorist_QR_Code_URL', plugin_dir_url( Directorist_QR_Code_FILE ) ); }
// Plugin Root File.
if ( ! defined( 'Directorist_QR_Code_BASE' ) ) { define( 'Directorist_QR_Code_BASE', plugin_basename( Directorist_QR_Code_FILE ) ); }
// Plugin Includes Path
if ( !defined('Directorist_QR_Code_INC_DIR') ) { define('Directorist_QR_Code_INC_DIR', Directorist_QR_Code_DIR.'inc/'); }
// Plugin Assets Path
if ( !defined('Directorist_QR_Code_ASSETS') ) { define('Directorist_QR_Code_ASSETS', Directorist_QR_Code_URL.'assets/'); }
// Plugin Template Path
if ( !defined('Directorist_QR_Code_TEMPLATES_DIR') ) { define('Directorist_QR_Code_TEMPLATES_DIR', Directorist_QR_Code_DIR.'templates/'); }
// Plugin Language File Path
if ( !defined('Directorist_QR_Code_LANG_DIR') ) { define('Directorist_QR_Code_LANG_DIR', dirname(plugin_basename( Directorist_QR_Code_FILE ) ) . '/languages'); }
// Plugin Name
if ( !defined('Directorist_QR_Code_NAME') ) { define('Directorist_QR_Code_NAME', 'Directorist - FAQs'); }

// Plugin Alert Message
if ( !defined('Directorist_QR_Code_ALERT_MSG') ) { define('Directorist_QR_Code_ALERT_MSG', __('You do not have the right to access this file directly', 'directorist-listing-qr-code')); }

// plugin author url
if (!defined('ATBDP_AUTHOR_URL')) {
    define('ATBDP_AUTHOR_URL', 'https://directorist.com');
}
// post id from download post type (edd)
if (!defined('ATBDP_Directorist_QR_Code_POST_ID')) {
    define('ATBDP_Directorist_QR_Code_POST_ID', 13780 );
}
