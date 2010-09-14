<?php
/**
 * Main plugin definition
 * Plugin Name: RSS Injection
 * Plugin URI: 
 * Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
 * Author: DCoda
 * Author URI: http://www.dcoda.co.uk
 * Version: 1.0.11.21
 * @package RSSSticky
 * @subpackage Plugin
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
$lib = dirname ( __FILE__ ) . '/library/DCode/WP/Plugin.php';
/**
 * check to see if plugin is run from project folder or from parent folder IE as mu plugin.
 */
if (!file_exists ( $lib ))
{
	require_once dirname( __FILE__ ) . '/'.basename(__FILE__,'.php').'/'.basename(__FILE__);
}
else
{
	require_once $lib;
	class rssinjection extends DCode_WP_Plugin
	{

		public function __construct ( $filename )
		{
			$this->set_name ( "RSSInjection" );
			parent::__construct ( $filename );
		}
		public function preload_classes ( $classes = array() )
		{
			parent::preload_classes ( 'RSSInjectionData' );
		}
	}
	new rssinjection ( __FILE__ );
}
