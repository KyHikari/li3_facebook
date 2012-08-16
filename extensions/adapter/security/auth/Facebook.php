<?php

namespace li3_facebook\extensions\adapter\security\auth;

use li3_facebook\extensions\FacebookProxy;

class Facebook extends \lithium\core\Object {

	public function check($credentials, array $options = array()) {
		$data = $credentials->query;
		if (isset($data['code']) && FacebookProxy::getUser()) {
			return FacebookProxy::getUserProfile();
		}
		return false;
	}

	public function set($data, array $options = array()) {
		return $data;
	}

	public function clear(array $options = array()) {
	}
}

?>