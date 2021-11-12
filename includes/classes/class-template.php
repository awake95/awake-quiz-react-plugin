<?php
/**
 * Created by PhpStorm.
 * User: George
 * Date: 2/19/19
 * Time: 10:21 AM
 */

namespace Awake\AwakeReactQuizPlugin;

defined( __NAMESPACE__ . '\PATH' ) or die();

if ( class_exists( __NAMESPACE__ . '\Template' ) ) {
	return;
}

final class Template {

	/**
	 * Init hooks
	 */
	public static function init() {
		add_action( 'admin_notices', function () {
			$constants = get_defined_constants();
			echo '<div class="notice notice-warning is-dismissible">';
			echo '<h5>' . SLUG . ' debug info</h5>Remove it in ' . str_replace(PATH,SLUG,__FILE__);
			echo '<table>';
			foreach ( $constants as $key => $value ) {
				if ( false !== strpos( $key, __NAMESPACE__ ) ) {
					echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
				}
			}
			echo '</table>';
			echo '</div>';
		} );
	}


}
