<?php
/**
 * Theme Plugin Functions
 */


//* ACF PRO LICENSE KEY
DEFINE('ACF_5_KEY', 'b3JkZXJfaWQ9NzIyNzZ8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDEtMDkgMDU6MDA6MTU=');

//* SLIDER REVOLUTION KEY
DEFINE('REVSLIDER_KEY', 'a42aae42-f225-4770-9644-b50609fc1fa3');



// add_action( 'do_meta_boxes', 'remove_slider_rev_metabox' ); // Remove revolution slider metabox


add_action( 'init', function() {
    $user_name    = wp_get_current_user()->user_login;
	  if( $user_name != 'bryanwillis' ) {
		  defined('DISALLOW_FILE_EDIT') || define( 'DISALLOW_FILE_EDIT', true );
		  defined('DISALLOW_FILE_MODS') || define( 'DISALLOW_FILE_MODS', true );
	  } else {
		  define( 'DISALLOW_FILE_EDIT', false );
		  define( 'DISALLOW_FILE_MODS', false );
	  }
});
