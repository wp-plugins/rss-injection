<?php /*
Plugin Name: RSSInjection
Plugin URI: http://redactor.dcoda.co.uk/donate/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: 
Version: 2.2.43
License: GPLv2 or later
*/
@require_once  dirname ( __FILE__ ) . '/library/wordpress/application.php';
if (class_exists("wv43v_application"))
{
	new wv43v_application ( __FILE__);
}