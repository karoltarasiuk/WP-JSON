<?php
/**
 * The main template file
 */

$_WRONG_PARAMS = array('error' => 'wrong params');
$_MODELS_DIR = get_template_directory() . '/models/';

if( !empty( $_GET['function'] ) ) {
	$slug = $_GET['function'];
}
else {
	$slug = removeTrailingSlash(
		removeBeginningSlash(
			str_replace(
				dirname($_SERVER["SCRIPT_NAME"]), '', $_SERVER["REQUEST_URI"]
			)
		)
	);
}

if( empty( $slug ) ) {
	die( json_encode( $_WRONG_PARAMS ) );
}

define( 'SLUG', $slug);

$files = scandir( $_MODELS_DIR );
foreach($files as $k => $file) {
	if( strpos($file, '.php') !== false ) {
		require_once $_MODELS_DIR . $file;
	}
}

$model = Factory::build(SLUG);
$data = $model->execute();

die( json_encode($data) );