<?php
if (! class_exists ( 'wv30v_application' )) :
	require_once dirname ( dirname ( __FILE__ ) ) . '/library/wordpress/application.php';
endif;
class rssinjectionapp extends wv30v_application {
	public function __construct($file)
	{
		parent::__construct($file);
		$this->legacy_move('rssinjection','options');
	}
}
