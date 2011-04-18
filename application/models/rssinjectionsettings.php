<?php
class rssinjectionsettings extends wv26v_settings {
	public function __construct($application)
	{
		parent::__construct($application);
		$this->legacy_move('rssinjection','options');
	}
}
