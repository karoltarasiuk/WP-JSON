<?php

class Factory {

	public static function build($function)
    {
    	$class = '';

    	switch($function) {
    		case 'get_posts':
    		case 'posts': $class = 'Posts'; break;
    		case 'get_categories':
    		case 'categories': $class = 'Categories'; break;
    		case 'get_pages':
    		case 'pages': $class = 'Pages'; break;
    	}

        if (empty($class) || !class_exists($class)) {
            throw new Exception('Method not supported.');
        }

        return new $class;
    }
}