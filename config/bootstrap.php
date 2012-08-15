<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use lithium\core\Libraries;

/**
 * Add the `facebook_php_sdk` library.
 */
Libraries::add('facebook_php_sdk', array(
	'bootstrap' => false,
	'path' => dirname(__DIR__) . '/libraries/facebook_php_sdk/src/',
	'prefix' => '',
	'defer' => true,
	'transform' => function($class, $config) {
		$class = strtolower($class);
		$file = $config['path'] . $class . $config['suffix'];
		if (file_exists($file)) {
			return $file;
		}
	}
));

?>