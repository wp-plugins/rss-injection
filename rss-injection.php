<?php
/**
 * Main plugin definition
 * Plugin Name: RSS Injection
 * Plugin URI: 
 * Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
 * Author: DCoda
 * Author URI: http://www.dcoda.co.uk
 * Version: 1.1.15.d6v
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
$lib = dirname ( __FILE__ ) . '/library/wordpress/w3v/Application.php';
if (! file_exists ( $lib )) {
	require_once dirname ( __FILE__ ) . '/' . basename ( __FILE__, '.php' ) . '/' . basename ( __FILE__ );
} else {
	require_once $lib;
	new w3v_Application ( __FILE__,array() );
}
