<?php
class rssinjectionsettings extends wv23v_settings {
	public function __construct($application)
	{
		parent::__construct($application);
		$this->legacy_move('rssinjection','options');
	}
}
