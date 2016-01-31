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

/** 
 * Set ACF 5 license key on theme activation.
 * 
 * wp-config/functions - DEFINE('ACF_5_KEY', 'b3JkZXJfaWQ9NzIyNzZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDEtMDkgMDU6MDA6MTU=');
 */
add_action('after_switch_theme', 'brw_auto_set_license_keys');
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

/**
 * Return a custom field stored by the Advanced Custom Fields plugin
 * 
 * @global $post
 * @param str $key The key to look for
 * @param mixed $id The post ID (int|str, defaults to $post->ID)
 * @param mixed $default Value to return if get_field() returns nothing
 * @return mixed
 * @uses get_field()
 */
function _get_field( $key, $id=false, $default='' ) {
  global $post;
  $key = trim( filter_var( $key, FILTER_SANITIZE_STRING ) );
  $result = '';
 
  if ( function_exists( 'get_field' ) ) {
    if ( isset( $post->ID ) && !$id )
      $result = get_field( $key );
    else
      $result = get_field( $key, $id );
 
    if ( $result == '' ) // If ACF enabled but key is undefined, return default
      $result = $default;
 
  } else {
    $result = $default;
  }

  return $result;
}

/**
 * Shortcut for 'echo _get_field()'
 * @param str $key The meta key
 * @param mixed $id The post ID (int|str, defaults to $post->ID)
 * @param mixed $default Value to return if there's no value for the custom field $key
 * @return void
 * @uses _get_field()
 */
function _the_field( $key, $id=false, $default='' ) {
  echo _get_field( $key, $id, $default );
}

/**
 * Get a sub field of a Repeater field
 * @param str $key The meta key
 * @param mixed $default Value to return if there's no value for the custom field $key
 * @return mixed
 * @uses get_sub_field()
 */
function _get_sub_field( $key, $default='' ) {
   if ( function_exists( 'get_sub_field' ) &&  get_sub_field( $key ) )  
    return get_sub_field( $key );
   else 
    return $default;
}

/**
 * Shortcut for 'echo _get_sub_field()'
 * @param str $key The meta key Value to return if there's no value for the custom field $key
 * @return void
 * @uses _get_sub_field()
 */
function _the_sub_field( $key, $default='' ) {
  echo _get_sub_field( $key, $default );
}

/**
 * Check if a given field has a sub field
 * @param str $key The meta key
 * @param mixed $id The post ID
 * @return bool
 * @uses has_sub_field()
 */
function _has_sub_field( $key, $id=false ) {
  if ( function_exists('has_sub_field') )
    return has_sub_field( $key, $id );
  else
    return false;
}
