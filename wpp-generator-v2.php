<?php

/*
Plugin Name: WPPG Next
Plugin URI: https://github.com/Maksym-Marko/wp-plugin-skeleton
Description: This is my extremely useful plugin
Author: Maksym Marko
Version: 1.0
Author URI: https://github.com/Maksym-Marko
*/

defined('ABSPATH') || exit;

/*
* Unique string - MXSFWN
*/

/*
* Define MXSFWN_PLUGIN_PATH
*
* D:\xampp\htdocs\my-domain.com\wp-content\plugins\stuff-for-wpp2\stuff-for-wpp2.php
*/
if (!defined('MXSFWN_PLUGIN_PATH')) {

    define('MXSFWN_PLUGIN_PATH', __FILE__);
}

/*
* Define MXSFWN_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/stuff-for-wpp2/
*/
if (!defined('MXSFWN_PLUGIN_URL')) {

    define('MXSFWN_PLUGIN_URL', plugins_url('/', __FILE__));
}

/*
* Define MXSFWN_PLUGIN_BASE_NAME
*
* Return stuff-for-wpp2/stuff-for-wpp2.php
*/
if (!defined('MXSFWN_PLUGIN_BASE_NAME')) {

    define('MXSFWN_PLUGIN_BASE_NAME', plugin_basename(__FILE__));
}

/*
* Define MXSFWN_PLUGIN_ABS_PATH
* 
* D:\xampp\htdocs\my-domain.com\wp-content\plugins\stuff-for-wpp2/
*/
if (!defined('MXSFWN_PLUGIN_ABS_PATH')) {

    define('MXSFWN_PLUGIN_ABS_PATH', dirname(MXSFWN_PLUGIN_PATH) . '/');
}

/*
* Define MXSFWN_PLUGIN_VERSION
* 
* The version of all CSS and JavaScript files in this plugin.
*/
if (!defined('MXSFWN_PLUGIN_VERSION')) {

    define('MXSFWN_PLUGIN_VERSION', time()); // Must be replaced before production on for example '1.0'
}

/**
 * Autoload.
 */
require MXSFWN_PLUGIN_ABS_PATH . 'vendor/autoload.php';

/**
 * Helper functions.
 */
require_once MXSFWN_PLUGIN_ABS_PATH . 'includes/Core/functions.php';

/**
 * activation|deactivation.
 */
require_once MXSFWN_PLUGIN_ABS_PATH . 'install.php';

/**
 * Run plugin parts.
 */
require_once MXSFWN_PLUGIN_ABS_PATH . 'index.php';
