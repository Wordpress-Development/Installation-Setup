<?php 
/**
 * @package WordPress
 */


define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');


define('DB_HOST', $_ENV{DATABASE_SERVER}); 
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts: https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
define('AUTH_SALT', 'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT', 'put your unique phrase here');
define('NONCE_SALT', 'put your unique phrase here');
/**#@-*/


# Folder Constants
/*
$wp_content = 'wp-content';
$plugins = 'plugins';

define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] ); // automatic
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] ); // automatic
define( 'WP_CONTENT_FOLDERNAME', 'site' ); // wp-content folder name
define( 'WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . WP_CONTENT_FOLDERNAME );
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/' . $plugins );
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/' . $plugins );
// define( 'UPLOADS', 'assets'); // has issues sometimes
// */

# Caching
//define( 'ENABLE_CACHE', true );
//define( 'CONCATENATE_SCRIPTS', true );

# Default Theme Folder
//define( 'WP_DEFAULT_THEME', 'genesis' );

# Database
$table_prefix  = 'aym_';
//define( 'DO_NOT_UPGRADE_GLOBAL_TABLES', true );

# Fix Site 
//define( 'WP_ALLOW_REPAIR', true ); // http://www.yoursite.com/wp-admin/maint/repair.php

# Language
//define( 'WPLANG', '' );

# Memory
//define( 'WP_MEMORY_LIMIT', '256M' );
//define( 'WP_MAX_MEMORY_LIMIT', '256M' );

# Debug
//define( 'WP_DEBUG', true );
//define( 'WP_DEBUG_LOG', true );
//define( 'WP_DEBUG_DISPLAY', true );

# Code Snippets Plugin
 //define('CODE_SNIPPETS_SAFE_MODE', true);
 
# Post Control
define('WP_POST_REVISIONS', 10);
define('AUTOSAVE_INTERVAL', 300);
define( 'EMPTY_TRASH_DAYS', 3 );

# Cookie Paths (if changing admin url names)
//define('SITECOOKIEPATH', preg_replace('|https?://[^/]+|i', '', 'http://www.candidbusiness.com' . '/' ) );
//define('ADMIN_COOKIE_PATH', SITECOOKIEPATH . 'dashboard');


 /* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
