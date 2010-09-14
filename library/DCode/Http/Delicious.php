<?php
/**
 * Routines to access delicio.us
 * @package Library
 * @subpackage Http_Delicious
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class DCode_Http_Delicious extends DCode_Http {
	// keep track of when last command finished, to throttle calls. made static to make sure it applies to all instances
	private static $lastCommandTime = 0;
	public function get()
	{
		set_time_limit(300);
		if(self::$lastCommandTime+10>time())
		{
			sleep(1);
		}
		$return = parent::get();
		self::$lastCommandTime = time();
		return $return;

	}
	public function get_recent_posts()
	{
		throw new DCode_Exception('Not yet implemented');
		$this->url('https://api.del.icio.us/v1/posts/recent');
		return $this->get();
	}

	public function get_update_posts()
	{
		$this->url('https://api.del.icio.us/v1/posts/update');
		$return = $this->get();
		$return = $this->tag->get('update',$return);
		$return = $return[0]['attributes'];
		return $return;
	}
	public function get_add_posts($url,$description,$extended,$tags,$dt,$replace="no",$shared="no")
	{
		throw new DCode_Exception('Not yet implemented');
		$this->url('https://api.del.icio.us/v1/posts/add?');
		return $this->get();
	}
	public function get_delete_posts($url)
	{
		throw new DCode_Exception('Not yet implemented');
		$this->url('https://api.del.icio.us/v1/posts/delete?');
		return $this->get();
	}
	public function get_posts($hashes)
	{
		$this->url('https://api.del.icio.us/v1/posts/get');
		$this->data('hashes='.$hashes.'&meta=yes');
		$return = $this->justattribs($this->tag->get('post',$this->get()));
		return $return;
	}
	public function get_dates_posts($tag)
	{
		throw new DCode_Exception('Not yet implemented');
		$this->url('https://api.del.icio.us/v1/posts/dates?');
		return $this->get();
	}
	public function get_all_posts($tag="",$start="",$results="",$fromdt="",$todt="",$meta="")
	{
		$this->url('https://api.del.icio.us/v1/posts/all');
		//$this->data('results=100');
		$return = $this->justattribs($this->tag->get('post',$this->get()));
		return $return;
	}
	public function get_all_hashes_posts()
	{
		$this->url('https://api.del.icio.us/v1/posts/all');
		$this->data('hashes');
		$return = $this->justattribs($this->tag->get('post',$this->get()));
		return $return;
	}
	private function justattribs($tags)
	{
		$return = array();
		foreach($tags as $tag)
		{
			$return[]=$tag['attributes'];
		}
		return $return;
	}
	private $tag = null;
	public function get_tags()
	{
		$this->url('https://api.del.icio.us/v1/tags/get');
		$return = $this->justattribs($this->tag->get('post',$this->get()));
		return $return;
	}
	public function __construct()
	{
		parent::__construct();
		$this->tag = new DCode_Tag($this->get_application());
	}
}
