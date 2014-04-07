<?php

/*
This class is extended by other classes.
Name begins with 'A' to have it listed and included before other files using PHP 'scandir' function.
*/
class AFunction {
	
	protected static $defaultArgs = array();
	protected static $functionName = null;

	protected $params = array();

	public function __construct($params = array()) {

		if( is_null($params) || !is_array($params) ) {
			$params = $_GET;
		}

		$this->extendParams($params);
	}

	public function extendParams($params) {

		$this->params = static::$defaultArgs;

		foreach($params as $param => $value) {
			$this->params[$param] = $value;
		}
	}

	public function execute() {

		return $this->process( call_user_func(static::$functionName, $this->params));
	}

	protected function process( $data ) {

		return $data;
	}
}