<?php
/*
Plugin Name:  Github Plugin Explorer
Description:  Install and update plugins from Github.
Plugin URI: http://tormorten.no
Author: Tor Morten Jensen
Author URI: http://tormorten.no
Version: 0.0.1
*/

/**
 * The path to the plugin
 */
define( 'GITHUB_EXPLORER_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The url to the plugin
 */
define( 'GITHUB_EXPLORER_URL', plugin_dir_url( __FILE__ ) );

/**
 * Autoload all classes in the lib/-folder
 * @param  string $className The name of class
 * @return void
 */
function github_explorer_autoload($className) {
	$segments = explode( '_', $className );
	$name = strtolower( end( $segments ) );
	$filename = GITHUB_EXPLORER_DIR . "lib/" . $name. ".php";
	if (is_readable($filename)) {
		require $filename;
	}
}

spl_autoload_register('github_explorer_autoload');

/**
 * Load the plugin
 * @return void
 */
function github_explorer_load() {
	global $github_explorer;
	$github_explorer = new Github_Explorer_Plugin;
}
add_action('plugins_loaded', 'github_explorer_load');
