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