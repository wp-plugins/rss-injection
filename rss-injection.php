<?php /*
Plugin Name: &raquo;&raquo;&raquo;&nbsp;RSSInjection&nbsp;&alpha;
Plugin URI: http://wordpress.org/extend/plugins/rss-injection/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: http://dcoda.co.uk
Version: 1.3.0&alpha;
 */ 
require_once  dirname ( __FILE__ ) . '/library/wordpress/application.php';

new wv21v_application ( __FILE__,array(),'rssinjectionsettings' );
