<?php
class RSSInjectionData extends w8v_Table_Options {
	public function defaults()
	{
		return array(
			'header'=>'',
			'footer'=>''
		
		);
	} 
	public function __construct() {
		parent::__construct ();
		$this->set_key ( array ('rssinjection' ) );
	}
}
