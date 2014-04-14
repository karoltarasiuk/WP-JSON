<?php

class Posts extends AFunction {
	
	protected static $defaultArgs = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true
	);

	protected static $functionName = 'get_posts';

	protected function process( $data ) {
		
		if( empty($this->params['noMeta']) || $this->params['noMeta'] != 1 ) {

			foreach($data as $index => $post) {

				$post->meta = get_post_meta($post->ID);
			}
		}

		return $data;
	}
}