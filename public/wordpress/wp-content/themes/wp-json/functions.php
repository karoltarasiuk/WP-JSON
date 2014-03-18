<?php
/**
 * WP-JSON functions and definitions
 */

function removeBeginningSlash($str) {
	return ltrim($str, '/');
}

function removeTrailingSlash($str) {
	return rtrim($str, '/');
}
