<?php
class rssinjection_filters extends wv48fv_action {
	public function the_contentWPfilter($content) {
		if (get_post_type () == 'post') {
			$data = $this->data ()->options;
			$header = $this->dcode ( $data ['header'] );
			$footer = $this->dcode ( $data ['footer'] );
			$content = $header . $content . $footer;
		}
		return $content;
	}
	
	private function dcode($string) {
		$a = explode ( '[else]', $string );
		$rss = '';
		$post = '';
		if (count ( $a ) > 0) {
			$rss = $a [0];
		}
		if (count ( $a ) > 1) {
			$post = $a [1];
		}
		if (is_feed ()) {
			$return = $rss;
		} else {
			$return = $post;
		}
		$replace = array ('post_author' => 'get_the_author', 'post_url' => 'get_permalink', 'post_date' => 'get_the_modified_date', 'post_time' => 'get_the_modified_time', 'post_title' => 'get_the_title', 'blog_url' => array ('get_bloginfo', array ('url' ) ), 'blog_name' => array ('get_bloginfo', array ('name' ) ) );
		foreach ( array_keys ( $replace ) as $key ) {
			if (is_array ( $replace [$key] )) {
				$value = call_user_func_array ( $replace [$key] [0], $replace [$key] [1] );
			} else {
				$value = call_user_func ( $replace [$key] );
			}
			$return = str_replace ( "[$key]", $value, $return );
		}
		return $return;
	}
}

		