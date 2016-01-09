<?php 
/**
 * Include Advanced Custom Fields theme or plugin
 * 
 * include_once( plugins_url('addons/acf/acf.php', __DIR__) );
 * 
 */


/** customize ACF path  */
add_filter('acf/settings/path', 'bw_acf_settings_path');
function bw_acf_settings_path( $path ) {
    // update path
    $path = plugin_dir_path( __FILE__ ) . BW_ACF_PATH;
    // return
    return $path;
}

/** 2. customize ACF dir  */
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = plugin_dir_url( __FILE__ ) . BW_ACF_PATH;
    return $dir;
}

/**  3. Include ACF */
include_once( plugin_dir_url( __FILE__ ) . BW_ACF_PATH;
// include_once( plugins_url('vendor/advanced-custom-fields-pro/acf.php', __DIR__) );


add_action('after_switch_theme', 'brw_auto_set_license_keys');
/** 
 * Set ACF 5 license key on theme activation.
 * 
 * wp.config - DEFINE('ACF_5_KEY', 'YOUR_KEY_GOES_HERE');
 */
function brw_auto_set_license_keys() {
  if ( !get_option('acf_pro_license') && defined('ACF_5_KEY') ) {
    $save = array(
		'key'	=> ACF_5_KEY,
		'url'	=> home_url()
	);
	$save = maybe_serialize($save);
	$save = base64_encode($save);
    update_option('acf_pro_license', $save);
  }
}
