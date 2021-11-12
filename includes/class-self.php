<?php
/**
 * Created by PhpStorm.
 * User: stim
 * Date: 2/19/19
 * Time: 10:21 AM
 */

namespace Awake\AwakeReactQuizPlugin;

defined( __NAMESPACE__ . '\PATH' ) or die();

if( class_exists( __NAMESPACE__ . '\_self' ) ) return;

/**
 * Class _self
 *
 * Plugin loader
 *
 * @package Awake\AwakeReactQuizPlugin
 */
final class _self {

	/**
	 * Load all required classes
	 */
	public static function load() {
		Template::init();
	}

}
