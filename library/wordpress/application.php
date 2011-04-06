<?php
if (! class_exists ( 'bv25v_application' )) :
	require_once dirname ( dirname ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'base/application.php';
	class wv25v_application extends bv25v_application {
		protected function set_frontcontroller() {
			parent::set_frontcontroller ( wv25v_controller_front::getInstance ( $this->application () ) );
		}
		protected $passed_classes = null;
		public function __construct($filename = "", $classes = array(), $handler = 'wv25v_settings') {
			$this->passed_classes = $classes;
			add_action ( "plugins_loaded", array ($this, "setup" ) );
			parent::__construct ( $filename, $handler );
			$this->info = new wv25v_info ( $this );
			add_action ( "admin_menu", array ($this, "pages" ) );
		}
		public function pages() {
			$obj = new wv25v_controller_action_sandboxsandbox ( $this );
			$obj->setup ();
			$obj = new wv25v_controller_action_pluginsandbox ( $this );
			$obj->setup ();
		}
		public function relative_path($uri = null) {
			global $current_blog;
			if (null === $uri) {
				$uri = $_SERVER ['REQUEST_URI'];
			}
			//$uri = substr ( $uri , strlen ( $current_blog->path ) );
			$uri = substr ( $uri, strlen ( get_option ( 'site_url' ) ) );
			
			$uri = explode ( '?', $uri );
			$uri = $uri [0];
			$uri = rtrim ( $uri, '/' );
			$uri = '/' . rtrim ( $uri, '/' );
			return $uri;
		}
		public function setup() {
			load_plugin_textdomain ( get_class ( $this ), false, dirname ( plugin_basename ( $this->application ()->filename () ) ) . "/languages/" );
		}
		public function preload_classes($classes = array()) {
			$classes = ( array ) $classes;
			array_unshift ( $classes, 'wv25v_info', 'wv25v_values', 'wv25v_table', 'wv25v_table_sitemeta', 'wv25v_table_sites', 'wv25v_table_site', 'wv25v_table_posts', 'wv25v_table_blogs', 'wv25v_table_blog', 'wv25v_table_options', 'wv25v_table_users', 'wv25v_table_usermeta', 'wv25v_view', 'wv25v_controller_action_abstract', 'wv25v_controller_action_action', 'wv25v_controller_action_adminmenu', 'wv25v_controller_action_control', 'wv25v_controller_action_filter', 'wv25v_controller_front', 'wv25v_controller_dispatcher', 'wv25v_table_comments', 'wv25v_settings', 'wv25v_controller_action_pluginsandbox', 'wv25v_controller_action_sandboxsandbox' );
			foreach ( $this->passed_classes as $class ) {
				$classes [] = $class;
			}
			parent::preload_classes ( $classes );
		}
		private $info = null;
		public function info() {
			return $this->info;
		}
	}


endif;