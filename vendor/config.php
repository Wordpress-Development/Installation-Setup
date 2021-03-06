<?php

# Load Modules / Plugins in autoload folder
define( 'BOOT_LOAD_MODULES', 1 )
include_once( dirname( __FILE__ ) . '/config/advanced-custom-fields-pro.php' );
include_once( dirname( __FILE__ ) . '/config/template-loader.php' );

    
# Advanced Custom Fields Pro
$acf_real_path = "realpath(__DIR__ . '/./config.php')";
DEFINE('BW_ACF_SETTINGS_PATH', $acf_real_path); // ACF path relative to this file
DEFINE('ACF_5_KEY', 'b3JkZXJfaWQ9NzIyNzZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDEtMDkgMDU6MDA6MTU='); // ACF Pro Key
// add_filter('acf/settings/show_admin', '__return_false'); //Hide ACF field group menu item