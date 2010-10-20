=== RSS Injection ===
Contributors: dcoda
Donate link: http://wordpress.dcoda.co.uk/donate/rss-injection/
Tags: php5,post,rss,footer,header,content scrapers,added content
Requires at least: 3.0.0
Tested up to: 3.0.1
Stable tag: 1.1.15.d6v
Inject content into your RSS feed to entice people to subscribe or allow you to add a message so if the feed it aggregated onto another site it is at least attribute.

<!--

@package RSSInjection
@subpackage RSSInjection Readme
@copyright DCoda Ltd
@author DCoda Ltd
@license http://www.gnu.org/licenses/gpl.txt
$HeadURL$
$LastChangedDate$
$LastChangedRevision$
$LastChangedBy$

-->

== Description ==
This Plugin is only supported on PHP 5.2 or greater.

RSS Injection allows you to modify the post for your RSS feed.
 You may be able think of you own reasons for doing this, but it was originally designed to add a copyright message and link to the feed to show the posts origins should a blog scraper republish your feed on their own blog.   
Another possible use is to add extra content to your feed to entice users to subscribe, which this is mind you can now add a message that will only display in the blog to promote this offer.
 
 
 
== Installation ==

1. Copy the plugin folder to `wp-content/plugins`
2. Log in to WordPress as an administrator.
3. Enable the plugin in the `Plugins` admin screen.
4. Visit the admin page `Settings->RSS Injection` to configure the test.

== Changelog ==

= 1.1.15.d6v = 

+ update base library

= 1.0.11.21 =
Initial release specification:

+ Allow addition of footer to post in rss.
+ Allow addition of header to post in rss.
+ Allow variables to be looked up and inserted at runtime.
+ Addition of [else] tag.

== Copyright ==

(c) Copyright DCoda Ltd, 2007 -, All Rights Reserved.

This code is released under the GPL license version 3 or later, available here:

[http://www.gnu.org/licenses/gpl.txt](http://www.gnu.org/licenses/gpl.txt)

There are so many possibly configurations of installation the plugin can be installed on we limit testing to a php 5.2+ linux platform running the latest version of WordPress at the time of release but it is released WITHOUT ANY WARRANTY;
 without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

