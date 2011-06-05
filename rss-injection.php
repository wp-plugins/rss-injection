<?php /*
Plugin Name: RSSInjection
Plugin URI: http://dcoda.co.uk/wordpress/
Description: Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.
Author: dcoda
Author URI: http://dcoda.co.uk
Version: 1.5.30
 */ 
require_once  dirname ( __FILE__ ) . '/application/rssinjectionapp.php';
new rssinjectionapp ( __FILE__);
