<?php


/* // Load All Plugins
foreach ( glob( plugin_dir_path( __FILE__ ) . "vendor/*.php" ) as $file ) {
    include_once $file;
}
// */


# Advanced Custom Fields Pro
DEFINE('BW_ACF_SETTINGS_PATH', '/acf/'); // ACF path relative to this file
DEFINE('ACF_5_KEY', 'b3JkZXJfaWQ9NzIyNzZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDEtMDkgMDU6MDA6MTU='); // ACF Pro Key
include_once( dirname( __FILE__ ) . '/vendor/advanced-custom-fields-pro.php' );
// add_filter('acf/settings/show_admin', '__return_false'); //Hide ACF field group menu item


# Kirki Customizr Toolkit
include_once( dirname( __FILE__ ) . '/vendor/kirki/kirki.php' );
