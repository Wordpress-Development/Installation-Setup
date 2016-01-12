<?php 
/**
 * @package WordPress
 */
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');


define('DB_HOST', $_ENV{DATABASE_SERVER}); 
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix  = 'aym_';



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
//define( 'UPLOADS', 'assets'); // has issues sometimes

//define('TEMPLATEPATH', get_template_directory());
//define('STYLESHEETPATH', get_stylesheet_directory());
//define('TEMPLATEPATH', '/absolute/path/to/wp-content/themes/active-theme');
//define('STYLESHEETPATH', '/absolute/path/to/wp-content/themes/active-theme');
// */


# Caching
//define( 'WP_CACHE', TRUE );
//define( 'ENABLE_CACHE', true ); 
//define( 'CONCATENATE_SCRIPTS', true );
//define( 'COMPRESS_SCRIPTS', true );
//define( 'COMPRESS_CSS', true );
//define( 'CACHE_EXPIRATION_TIME', 3600); // in seconds


# Default Theme Folder
//define( 'WP_DEFAULT_THEME', 'genesis' );

# Database
//define( 'DO_NOT_UPGRADE_GLOBAL_TABLES', true );


# Fix Site 
//define( 'WP_ALLOW_REPAIR', true ); // http://www.yoursite.com/wp-admin/maint/repair.php


# Language
//define( 'WPLANG', '' );
//define('LANGDIR', '');

# Memory
//define( 'WP_MEMORY_LIMIT', '256M' );
//define( 'WP_MAX_MEMORY_LIMIT', '256M' );


# Debug
//define( 'WP_DEBUG', true );
//define( 'WP_DEBUG_LOG', true );
//define( 'WP_DEBUG_DISPLAY', true );
//define( 'SCRIPT_DEBUG', false );
//define('SAVEQUERIES', true);
//@ini_set('log_errors','On');
//@ini_set('display_errors','Off');
//@ini_set('error_log','/home/path/domain/logs/php_error.log');


# Post Control
//define('WP_POST_REVISIONS', 10);
//define('AUTOSAVE_INTERVAL', 300);
//define( 'EMPTY_TRASH_DAYS', 3 );


# Cookie Paths (if changing admin url names)
//define('SITECOOKIEPATH', preg_replace('|https?://[^/]+|i', '', 'http://www.example.com' . '/' ) );
//define('ADMIN_COOKIE_PATH', SITECOOKIEPATH . 'dashboard');


# Cron
//define( 'DISABLE_WP_CRON', false );


# Code Snippets Plugin
//define('CODE_SNIPPETS_SAFE_MODE', true);


#ACF License Key
//define('ACF_5_KEY','');


# File Editing
//define( 'DISALLOW_FILE_MODS', FALSE );
//define( 'DISALLOW_FILE_EDIT', FALSE );
//define( 'FS_METHOD', 'direct' );
//define( 'FS_CHMOD_DIR', 0775 );
//define( 'FS_CHMOD_FILE', 0664 );


 /* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');