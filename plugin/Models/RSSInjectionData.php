<?php
/**
 * Model for the RSSINjection data
 * @package RSSInjection
 * @subpackage RSSInjection Data
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class RSSInjectionData extends d6vCode_Base
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
			$data = new d6vCode_WP_SiteMeta ( );
		}
		else
		{
			$data = new d6vCode_WP_Options ( );
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
			$data = new d6vCode_WP_SiteMeta ( );
			$settings = $data->get ( $this->key () );
		}
		else
		{
			$data = new d6vCode_WP_Options ( );
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
