<?php /*
Plugin Name: RSSInjection
Plugin URI: http://wordpress.org/extend/plugins/rss-injection/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: http://dcoda.co.uk
Version: 1.4.0
 */ 
require_once  dirname ( __FILE__ ) . '/library/wordpress/application.php';

new wv25v_application ( __FILE__,array(),'rssinjectionsettings' );
