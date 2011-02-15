<?php /*
Plugin Name: RSSInjection
Plugin URI: http://wordpress.org/extend/plugins/rss-injection/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: http://dcoda.co.uk
Version: 1.2.3
 */ 
$lib = dirname ( __FILE__ ) . '/library/wordpress/w14v/Application.php';
if (! file_exists ( $lib )) {
	require_once dirname ( __FILE__ ) . '/' . basename ( __FILE__, '.php' ) . '/' . basename ( __FILE__ );
} else {
	require_once $lib;


	new w14v_Application ( __FILE__,array('RSSInjectionData') );
}
