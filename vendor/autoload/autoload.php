<?php
/**
 * Module : Plugin Autoloader
 * 
 * Description: Will load all plugins in this directory as 
 * long as the plugin file name is the same as the plugin
 * floder name
 *
 */


function ig_mu_plugins_loader() {
	
    if( ! defined( 'BW_AUTOLOAD_PLUGIN_DIR' ) {
		return;
	}

	$mu_plugins_dirs = array_filter( scandir( WPMU_PLUGIN_DIR ) );

	$non_dirs = array(
		'.',
		'..',
		'.DS_Store',
	);

	//strip out non-dirs
	for( $i = 0; $i < count( $non_dirs ); $i++ ) {
		$not_dir_key = array_search( $non_dirs[ $i ], $mu_plugins_dirs );

		if( $not_dir_key !== false ) {
			unset( $mu_plugins_dirs[ $not_dir_key ] );
		}

		unset( $not_dir_key );
	}

	unset( $non_dirs );

	if( empty( $mu_plugins_dirs ) ) {
		return;
	}

	sort( $mu_plugins_dirs );

	//load up mu-plugins from each valid directory
	foreach( $mu_plugins_dirs as $dir ) {
		$plugin_dir = trailingslashit( BW_AUTOLOAD_PLUGIN_DIR ) . $dir;
		$plugin_file = trailingslashit( $plugin_dir ) . $dir . '.php';

		if( is_dir( $plugin_dir ) && file_exists( $plugin_file ) ) {
			require_once( $plugin_file );
		}

		unset( $plugin_file, $plugin_dir );
	}
}

ig_mu_plugins_loader();

//EOF