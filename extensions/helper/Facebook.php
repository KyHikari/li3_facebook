<?php

namespace li3_facebook\extensions\helper;

use li3_facebook\extensions\FacebookProxy;
use Exception;

class Facebook extends \lithium\template\helper\Html {

	public function loginUrl($title, array $params = array(), array $options = array()) {
		$url = FacebookProxy::getLoginUrl($params);
		return $this->link($title, $url, $options);
	}

	public function logoutUrl($title, array $options = array()) {
		$url = FacebookProxy::getLogoutUrl();
		return $this->link($title, $url, $options);
	}

	public function __call($method, $params = array()) {
		return FacebookProxy::invokeMethod($method, $params);
	}

	public function javascriptSdk(array $options = array()) {
		$defaults = array(
			'type' => 'element',
			'template' => 'facebook_js_sdk',
			'data' => array(),
			'options' => array()
		);
		$options += $defaults;

		$appId = FacebookProxy::getAppId();
		$data = compact('appId');
		$options['data'] = $data + $options['data'];

		$view = $this->_context->view();
		$type = array($options['type'] => $options['template']);
		$output = '';

		try {
			$request = $this->_context->_config['request'];
			if (!empty($request->params['library'])) {
				$options['options'] += array('library' => $request->params['library']);
			}
			$output = $view->render($type, $data, $options['options']);
		} catch (Exception $e) {
			$output = $view->render($type, $data, array('library' => 'li3_facebook'));
		}
		return $output;
	}
}

?>