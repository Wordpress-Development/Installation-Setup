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
//define('WP_CONTENT_DIR',$_SERVER['DOCUMENT_ROOT'] . WP_CONTENT_FOLDERNAME );
define( 'WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME ); 
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . WP_CONTENT_FOLDERNAME );
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/' . $plugins );
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/' . $plugins );

//define('WP_DEFAULT_THEME', 'my-custom-theme-directory-name-here');
//define('UPLOADS', 'assets'); // can have compatability issues with plugins
//define('TEMPLATEPATH', get_template_directory()); 
//define('STYLESHEETPATH', get_stylesheet_directory());
//define('TEMPLATEPATH', '/absolute/path/to/wp-content/themes/active-theme');
//define('STYLESHEETPATH', '/absolute/path/to/wp-content/themes/active-theme');
// */

# SSL Encryption - https://letsencrypt.org/getting-started/
//define('FORCE_SSL_LOGIN', true);
//define('FORCE_SSL_ADMIN', true);



# Caching
//define( 'WP_CACHE', FALSE );
define( 'ENABLE_CACHE', FALSE ); 
define( 'CONCATENATE_SCRIPTS', FALSE ); // enables compression and concatenation of scripts and CSS
define( 'COMPRESS_SCRIPTS', FALSE ); // enables compression of scripts
define( 'COMPRESS_CSS', true ); // enables compression of CSS
define( 'CACHE_EXPIRATION_TIME', 10000 ); // in seconds
define( 'ENFORCE_GZIP', true ); // forces gzip for compression (default is deflate)


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
//define('WP_POST_REVISIONS', 7);
//define('AUTOSAVE_INTERVAL', 600);
//define( 'EMPTY_TRASH_DAYS', 3 );


# Cookie Paths (if changing admin url names)
// define('COOKIE_DOMAIN', '.example.com'); // don't omit the leading '.'
//define('COOKIEPATH', preg_replace('|https?://[^/]+|i', '', get_option('home').'/'));
//define('SITECOOKIEPATH', preg_replace('|https?://[^/]+|i', '', get_option('siteurl').'/'));
//define('PLUGINS_COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', WP_PLUGIN_URL));
//define('ADMIN_COOKIE_PATH', SITECOOKIEPATH.'wp-admin');

# Cron
//define( 'DISABLE_WP_CRON', false );


# Code Snippets Plugin
//define('CODE_SNIPPETS_SAFE_MODE', true);

#ACF License Key
//define('ACF_5_KEY','');

#Akismet Key
//define('WPCOM_API_KEY','your-key');


//define( 'WP_HTTP_BLOCK_EXTERNAL', true );
//define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.github.com' );

# Disable all automatic updates:
//define( 'AUTOMATIC_UPDATER_DISABLED', true );

# Enable all core updates, including minor and major (true, false, minor)
//define( 'WP_AUTO_UPDATE_CORE', true ); 

# File Editing
//define( 'DISALLOW_FILE_MODS', FALSE );
//define( 'DISALLOW_FILE_EDIT', FALSE );
//define( 'FS_CHMOD_DIR', 0755 );
//define( 'FS_CHMOD_FILE', 0644 );

//define( 'FS_METHOD', 'direct' );
//define('FS_METHOD', 'ftpext'); // forces the filesystem method: "direct", "ssh", "ftpext", or "ftpsockets"

//define('FTP_BASE', '/path/to/wordpress/'); // absolute path to root installation directory
//define('FTP_CONTENT_DIR', '/path/to/wordpress/wp-content/'); // absolute path to "wp-content" directory
//define('FTP_PLUGIN_DIR ', '/path/to/wordpress/wp-content/plugins/'); // absolute path to "wp-plugins" directory
//define('FTP_PUBKEY', '/home/username/.ssh/id_rsa.pub'); // absolute path to your SSH public key
//define('FTP_PRIVKEY', '/home/username/.ssh/id_rsa'); // absolute path to your SSH private key
//define('FTP_USER', 'username'); // either your FTP or SSH username
//define('FTP_PASS', 'password'); // password for FTP_USER username
//define('FTP_HOST', 'ftp.domain.tld:21'); // hostname:port combo for your SSH/FTP server


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


// register_theme_directory( dirname( __FILE__ ) . '/assets' );
