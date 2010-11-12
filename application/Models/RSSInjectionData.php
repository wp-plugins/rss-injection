<?php
class RSSInjectionData extends b3v_Base
{

	private function key ()
	{
		return 'rssinjection';
	}
	public function defaults()
	{
		return array(
			'header'=>'',
			'footer'=>''
		
		);
	} 
	public function post ()
	{
		if($this->global)
		{
			$data = new w3v_TableSiteMeta ( );
		}
		else
		{
			$data = new w3v_TableOptions ( );
		}
		if ($_SERVER ['REQUEST_METHOD'] == 'POST')
		{
			$data->post ( $this->key () );
		}
		return $this->get();
	}

	public function get ()
	{
		if($this->global)
		{
			$data = new w3v_TableSiteMeta ( );
			$settings = $data->get ( $this->key () );
		}
		else
		{
			$data = new w3v_TableOptions ( );
			$settings = $data->get ( $this->key ());
		}
		$settings = (array)$settings;
		$defaults = $this->defaults();
		return $settings+$defaults;
	}
	public function __construct ( $global = false )
	{
		$this->global = $global;
		parent::__construct ();
	}
}
