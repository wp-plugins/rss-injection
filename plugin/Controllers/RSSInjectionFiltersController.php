<?php
/**
 * adds WordPress filters for injection
 * @package RSSINjection
 * @subpackage RSSInjectionFilterController
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class RSSInjectionFiltersController extends DCode_Controller_Action_WP_Filter
{

	public function plugin_action_linksAction ( $links , $file )
	{
		if ($file != plugin_basename ( $this->application ()->filename () ))
		{return $links;}
		array_unshift ( $links , '<a href="plugins.php?page=DCode_Plugins_RSSInjection">About</a>' , '<a href="options-general.php?page=DCode_Settings_RSSInjection">Settings</a>' );
		return $links;
	}

	public function the_contentAction ( $content )
	{
		if (get_post_type() == 'post')
		{
			$dataObj = new RSSInjectionData ( false );
			$data = $dataObj->get ();
			$header = $this->dcode ( stripslashes($data ['header']) );
			$footer = $this->dcode ( stripslashes($data ['footer']) );
			$content = $header . $content . $footer;
		}
		return $content;
	}

	public function dcode ( $string )
	{
		$a = explode ( '[else]' , $string );
		$rss = '';
		$post = '';
		if (count ( $a ) > 0)
		{
			$rss = $a [0];
		}
		if (count ( $a ) > 1)
		{
			$post = $a [1];
		}
		if (is_feed ())
		{
			$return = $rss;
		}
		else
		{
			$return = $post;
		}
		$replace = array ( 
			'post_author' => 'get_the_author' , 'post_url' => 'get_permalink' , 'post_date' => 'get_the_modified_date' , 'post_time' => 'get_the_modified_time' , 'post_title' => 'get_the_title' , 'blog_url' => array ( 
			'get_bloginfo' , array ( 
			'url' 
		) 
		) , 'blog_name' => array ( 
			'get_bloginfo' , array ( 
			'name' 
		) 
		) 
		);
		foreach ( array_keys ( $replace ) as $key )
		{
			if (is_array ( $replace [$key] ))
			{
				$value = call_user_func_array ( $replace [$key] [0] , $replace [$key] [1] );
			}
			else
			{
				$value = call_user_func ( $replace [$key] );
			}
			$return = str_replace ( "[$key]" , $value , $return );
		}
		return $return;
	}
}
		