<?php

namespace li3_facebook\extensions;

use lithium\core\Libraries;
use lithium\util\Set;
use Facebook;

class FacebookProxy extends \lithium\core\StaticObject {

	protected static $_options = array(
		'appId' => '',
		'secret' => '',
		'trustForwarded' => false,
		'fileUpload' => false
	);

	protected static $_facebook = null;

	protected static $_user = null;

	public static function __init() {
		$options = Libraries::get('li3_facebook', 'options');
 		static::$_options = Set::merge(static::$_options, $options);
		static::config();
	}

	public static function config(array $options = array()) {
		if ($options) {
			static::$_options = Set::merge(static::$_options, $options);
		}
		static::$_facebook = new Facebook(static::$_options);
		return static::$_options;
	}

	public static function __callStatic($method, $args = array()) {
		return static::run($method, $args);
	}

	public static function run($method, $params = array()) {
		if ($method === null) {
			return null;
		}

		$params = (array) $params;
		$params = compact('method', 'params');

		$facebook = static::$_facebook;

		$filter = function($self, $params) use ($facebook) {
			extract($params);
			if (!method_exists($facebook, $method)) {
				return false;
			}
			switch (count($params)) {
				case 0:
					return $facebook->{$method}();
				case 1:
					return $facebook->{$method}($params[0]);
				case 2:
					return $facebook->{$method}($params[0], $params[1]);
				case 3:
					return $facebook->{$method}($params[0], $params[1], $params[2]);
				default:
					return call_user_func_array(array($facebook, $method), $params);
			}
		};
		 return static::_filter(__FUNCTION__, $params, $filter);
	}

	public static function getUserProfile() {
		if (static::$_user) {
			return static::$_user;
		}
		return static::$_user = static::run('api', '/me');
	}
}

?>