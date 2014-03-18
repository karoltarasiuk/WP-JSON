<?php
/**
 * The main template file
 */

define( 'SLUG',
	removeTrailingSlash(
		removeBeginningSlash(
			str_replace(
				dirname($_SERVER["SCRIPT_NAME"]), '', $_SERVER["REQUEST_URI"]
			)
		)
	)
);

echo('<pre>');
var_dump(SLUG);
echo('</pre>');
die();