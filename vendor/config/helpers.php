<?php
/** 
 * Function exst() - Checks if the variable has been set 
 * (copy/paste it in any place of your code)
 * 
 * If the variable is set and not empty returns the variable (no transformation)
 * If the variable is not set or empty, returns the $default value
 *
 * @param  mixed $var
 * @param  mixed $default
 * 
 * @return mixed 
 *
 * Example
 * $greeting = "Hello, ".exst($user_name, 'Visitor')." from ".exst($user_location);
 */
function exst( & $var, $default = "") {
    $t = "";
    if ( !isset($var)  || !$var ) {
        if (isset($default) && $default != "") $t = $default;
    }
    else  {  
        $t = $var;
    }
    if (is_string($t)) $t = trim($t);
    return $t;
}



/** 
 * Custom Output Buffer Wrapper 
 * @link http://wordpress.stackexchange.com/q/1034/43806
 * 
 * Useage: $title = get_output('the_title');
 */
function get_output() {
    $args     = func_get_args();
    $callback = array_shift($args);
    ob_start();
    call_user_func_array($callback, $args);
    return ob_get_clean();
}



/**
 * Remove Slider Revolution Metabox
 * for certain post types
 *
 * add_action( 'do_meta_boxes', 'remove_slider_rev_metabox' );
 *
 */
function remove_slider_rev_metabox() {
  if ( is_admin() ) {
    $post_types = array('page','post','acf');
    foreach ($post_types as $post_type) { 
      remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
    }
  }
}







/**
 * Defer / Async Scripts
 *
 */
class WP_Scholar_Defer_Scripts {
	public static function initialize() {
		add_filter( 'script_loader_tag', array( __CLASS__, 'defer_scripts' ), 10, 2 );
		add_filter( 'script_loader_tag', array( __CLASS__, 'async_scripts' ), 10, 2 );
	}
	public static function defer_scripts( $tag, $handle ) {
		global $wp_scripts;
		if ( $wp_scripts->get_data( $handle, 'defer' ) ) {
			$tag = str_replace( '></', ' defer></', $tag );
		}
		return $tag;
	}
	public static function async_scripts( $tag, $handle ) {
		global $wp_scripts;
		if ( $wp_scripts->get_data( $handle, 'async' ) ) {
			$tag = str_replace( '></', ' async></', $tag );
		}
		return $tag;
	}
}


/* #Useage

add_action( 'login_enqueue_scripts', function () {
	wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' );
	wp_script_add_data( 'recaptcha', 'async', 'true' );
	wp_script_add_data( 'recaptcha', 'defer', 'true' );
} );

*/
