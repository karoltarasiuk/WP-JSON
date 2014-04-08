<?php
/**
 * The main template file
 */

$_WRONG_PARAMS = array('error' => 'wrong params');
$_MODELS_DIR = get_template_directory() . '/models/';

if( !empty( $_GET['function'] ) ) {
	$method = $_GET['function'];
}
else {
	$temp = strpos($_SERVER["REQUEST_URI"], '?');
	if($temp === false) {
		$temp = strlen($_SERVER["REQUEST_URI"]);
	}

	$method = removeTrailingSlash(
		removeBeginningSlash(
			str_replace(
				dirname($_SERVER["SCRIPT_NAME"]),
				'',
				substr($_SERVER["REQUEST_URI"], 0, $temp)
			)
		)
	);
}

if( empty( $method ) ) {
	die( json_encode( $_WRONG_PARAMS ) );
}

define( 'METHOD', $method);

$files = scandir( $_MODELS_DIR );
foreach($files as $k => $file) {
	if( strpos($file, '.php') !== false ) {
		require_once $_MODELS_DIR . $file;
	}
}

$model = Factory::build( METHOD );
$data = $model->execute();

die( json_encode($data) );