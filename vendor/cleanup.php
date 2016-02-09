<?php
/**
 * Cleanup
 * 
 * @package  WP_Cleanup
 * @author   BryanWillis
 * @license  MIT
 * @link     http://mbistaffing.com/
 */
 
/**
 * Disable Emojis
 */
function bsgen_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'bsgen_disable_emojis_tinymce' );
}
add_action( 'init', 'bsgen_disable_emojis' );

function bsgen_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}




/**
 * Relative URLs
 */
function soil_root_relative_url($input) {
  preg_match('|https?://([^/]+)(/.*)|i', $input, $matches);
  if (!isset($matches[1]) || !isset($matches[2])) {
    return $input;
  } elseif (($matches[1] === $_SERVER['SERVER_NAME']) || $matches[1] === $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']) {
    return wp_make_link_relative($input);
  } else {
    return $input;
  }
}

function soil_enable_root_relative_urls() {
  return !(is_admin() || in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')));
}

if (soil_enable_root_relative_urls()) {
  $root_rel_filters = array(
    'bloginfo_url',
    'the_permalink',
    'wp_list_pages',
    'wp_list_categories',
    'soil_wp_nav_menu_item',
    'the_content_more_link',
    'the_tags',
    'get_pagenum_link',
    'get_comment_link',
    'month_link',
    'day_link',
    'year_link',
    'tag_link',
    'the_author_posts_link',
    'script_loader_src',
    'style_loader_src'
  );
  add_filters($root_rel_filters, 'soil_root_relative_url');
}
function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}




/**
 * Jquery CDN
 */
function bw_register_jquery_google_cdn() {
  $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
  $jquery_version = wp_scripts()->registered['jquery']->ver; 
  
  wp_deregister_script('jquery');
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/' . $jquery_version . '/jquery' . $suffix . '.js', array(), null, true);
  
  add_filter('script_loader_src', 'bw_jquery_local_fallback', 10, 2);
  
  foreach( wp_scripts()->registered as $script ) {
      if ( 'html5shiv' == $script->handle ) {
            wp_script_add_data( $script->handle, 'group', 0 );
      } else {
          wp_script_add_data( $script->handle, 'group', 1 );
      }
  }
  
}
add_action('wp_enqueue_scripts', 'bw_register_jquery_google_cdn', 100);

function bw_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;
  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . $add_jquery_fallback .'"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }
  if ($handle === 'jquery') {
    $add_jquery_fallback = apply_filters('script_loader_src', \includes_url('/js/jquery/jquery.js'), 'jquery-fallback');
  }
  return $src;
}
add_action('wp_head', 'bw_jquery_local_fallback');




/**
 * Remove HTML Comments
 */
function remove_html_comments_callback($buffer) {
    $buffer = preg_replace('/<!--[^\[\>\<](.|\s)*?-->/', '', $buffer);
    return $buffer;
}
function buffer_start_remove_html_comments() {
    ob_start("remove_html_comments_callback");
}
function buffer_end_remove_html_comments() {
    ob_end_flush();
}
add_action('template_redirect', 'buffer_start_remove_html_comments', -1);
add_action('get_header', 'buffer_start_remove_html_comments'); 
add_action('wp_footer', 'buffer_end_remove_html_comments', 999);




/**
 * Remove Head Crap
 */
add_action( 'get_header', function() {
	remove_action('wp_head', 'rsd_link'); // Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wp_generator'); // XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'index_rel_link'); // index link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // relational links 4 the posts adjacent 2 the currentpost
    remove_action('template_redirect', 'wp_shortlink_header', 11);	
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    //remove_action('wp_head', 'rel_canonical');
    remove_action( 'wp_head', 'genesis_do_meta_pingback' ); // Genesis Pingback
}, 99);





/**
 * Remove CSS JS Query Strings
 */
function _remove_query_strings_1( $src ){
	$rqs = explode( '?ver', $src );
        return $rqs[0];
}
add_filter( 'script_loader_src', '_remove_query_strings_1', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_1', 15, 1 );

function _remove_query_strings_2( $src ){
	$rqs = explode( '&ver', $src );
        return $rqs[0];
}
add_filter( 'script_loader_src', '_remove_query_strings_2', 15, 1 );
add_filter( 'style_loader_src', '_remove_query_strings_2', 15, 1 );




/**
 * Clean up output of stylesheet <link> tags
 */
function soil_clean_style_tag($input) {
  preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
  if (empty($matches[2])) {
    return $input;
  }
  // Only display media if it is meaningful
  $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
add_filter('style_loader_tag', 'soil_clean_style_tag');




/**
 * Clean up output of <script> tags
 */
function soil_clean_script_tag($input) {
  $input = str_replace("type='text/javascript' ", '', $input);
  return str_replace("'", '"', $input);
}
add_filter('script_loader_tag', 'soil_clean_script_tag');
