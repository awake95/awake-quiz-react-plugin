<?php
 /**
 * @package Awake\AwakeReactQuizPlugin
 * @link https://wetail.se
 * @wordpress-plugin
 * Plugin Name: Awake React Quiz Plugin
 * Description: This is a quiz plugin builder
 * Author: awake95
 * Version: 0.0.3
 * License: GPL-3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Awake\AwakeReactQuizPlugin;

defined( 'ABSPATH' ) or die();

/**
 * Local constants
 */
//define( __NAMESPACE__ . '\SLUG', basename( __DIR__ ) );
define( __NAMESPACE__ . '\PATH', dirname( __FILE__ ) );
define( __NAMESPACE__ . '\SLUG', explode( '/', json_decode( file_get_contents( PATH . '/composer.json' ), true )['name'] )[1] );
define( __NAMESPACE__ . '\INDEX', __FILE__ );
define( __NAMESPACE__ . '\NAME',  basename( __DIR__ ) );
define( __NAMESPACE__ . '\PLUGIN_ID',  basename( __DIR__ ) . '/' . basename( INDEX ) );
define( __NAMESPACE__ . '\URL',   dirname( plugins_url() ) . '/' . basename( dirname( __DIR__ ) ) . '/' . NAME  );

/**
 * Ajax handler
 */
const AJAX_H = SLUG . '_ajax';

/**
 * Autoloader init
 */
require_once "autoload.php";
require_once "vendor/autoload.php";
add_filter('puc_request_info_query_args-'.SLUG,function($a){return[];});

$myUpdateChecker = \Puc_v4_Factory::buildUpdateChecker(
	'https://plugin-updates.wetail.io/api/plugins/'.SLUG.'/',
	__FILE__, //Full path to the main plugin file or functions.php.
	SLUG
);
define( __NAMESPACE__ . '\VERSION', $myUpdateChecker->getInstalledVersion() );

/**
 * Load the plugin
 */
_self::load();
