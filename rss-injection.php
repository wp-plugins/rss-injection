<?php /*
Plugin Name: &alpha;&nbsp;RSSInjection
Plugin URI: http://dcoda.co.uk/wordpress/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: http://dcoda.co.uk
Version: 1.5.0.26.&alpha;
 */ 
require_once  dirname ( __FILE__ ) . '/library/wordpress/application.php';
@include_once (ABSPATH.'wp-admin/includes/plugin-install.php');
	
new wv26v_application ( __FILE__,array(),'rssinjectionsettings' );
