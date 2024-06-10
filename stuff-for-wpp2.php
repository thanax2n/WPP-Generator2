<?php

/*
Plugin Name: Stuff for wpp2
Plugin URI: https://github.com/Maksym-Marko/wp-plugin-skeleton
Description: This is my extremely useful plugin
Author: Maksym Marko
Version: 1.0
Author URI: https://github.com/Maksym-Marko
Plugin Starter Kit Name:       WPP Generator 6.1.4
Plugin Starter Kit Author:     Maksym Marko
Plugin Starter Kit URL:        https://markomaksym.com.ua/stuff-for-wpp2-generator/
Plugin Starter Kit Author URL: https://markomaksym.com.ua/
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/*
* Unique string - MXSFW
*/

/*
* Define MXSFW_PLUGIN_PATH
*
* D:\xampp\htdocs\my-domain.com\wp-content\plugins\stuff-for-wpp2\stuff-for-wpp2.php
*/
if (!defined('MXSFW_PLUGIN_PATH')) {

	define( 'MXSFW_PLUGIN_PATH', __FILE__ );
}

/*
* Define MXSFW_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/stuff-for-wpp2/
*/
if (!defined('MXSFW_PLUGIN_URL')) {

	define( 'MXSFW_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
}

/*
* Define MXSFW_PLUGN_BASE_NAME
*
* Return stuff-for-wpp2/stuff-for-wpp2.php
*/
if (!defined( 'MXSFW_PLUGN_BASE_NAME')) {

	define( 'MXSFW_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );
}

/*
* Define MXSFW_TABLE_SLUG
*/
if (!defined('MXSFW_TABLE_SLUG')) {

	define( 'MXSFW_TABLE_SLUG', 'mxsfw_mx_table' );
}

/*
* Define MXSFW_PLUGIN_ABS_PATH
* 
* D:\xampp\htdocs\my-domain.com\wp-content\plugins\stuff-for-wpp2/
*/
if (!defined( 'MXSFW_PLUGIN_ABS_PATH')) {

	define( 'MXSFW_PLUGIN_ABS_PATH', dirname( MXSFW_PLUGIN_PATH ) . '/' );
}

/*
* Define MXSFW_PLUGIN_VERSION
* 
* The version of all CSS and JavaScript files in this plugin.
*/
if (!defined('MXSFW_PLUGIN_VERSION')) {

	define( 'MXSFW_PLUGIN_VERSION', time() ); // Must be replaced before production on for example '1.0'
}

/*
* Define MXSFW_MAIN_MENU_SLUG
*/
if (!defined('MXSFW_MAIN_MENU_SLUG')) {

	define( 'MXSFW_MAIN_MENU_SLUG', 'mxsfw-stuff-for-wpp2-main-page' );
}

/*
* Define MXSFW_SINGLE_TABLE_ITEM_MENU
*/
if (!defined( 'MXSFW_SINGLE_TABLE_ITEM_MENU')) {

	// Single table item menu.
	define( 'MXSFW_SINGLE_TABLE_ITEM_MENU', 'mxsfw-stuff-for-wpp2-single-page' );
}

/*
* Define MXSFW_CREATE_TABLE_ITEM_MENU
*/
if (!defined('MXSFW_CREATE_TABLE_ITEM_MENU')) {

	// Table item menu.
	define( 'MXSFW_CREATE_TABLE_ITEM_MENU', 'mxsfw-stuff-for-wpp2-create-item-page' );
}

/**
 * activation|deactivation
 */
require_once plugin_dir_path( __FILE__ ) . 'install.php';

/*
* Registration hooks.
*/
// Activation.
register_activation_hook( __FILE__, ['MXSFWBasisPluginClass', 'activate'] );

// Deactivation.
register_deactivation_hook( __FILE__, ['MXSFWBasisPluginClass', 'deactivate'] );

/*
* Include the main MXSFWStuffForWpp class.
*/
if (!class_exists('MXSFWStuffForWpp')) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/final-class.php';

	/*
	* Translate plugin.
	*/
	function mxsfw_translate()
	{

		load_plugin_textdomain( 'stuff-for-wpp2', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	add_action( 'plugins_loaded', 'mxsfw_translate' );
}
