<?php
if (! class_exists ( 'bv25v_application' )) :
	require dirname ( __FILE__ ) . '/base.php';
	class bv25v_application extends bv25v_base {
		private static $applications = array ();
		public function applications() {
			return self::$applications;
		}
		private $_page = null;
		public function page() {
			if (null === $this->_page) {
				$this->set_page ();
			}
			return $this->_page;
		}
		public function set_page($page = null) {
			if (null === $page) {
				$this->_page = $this->relative_path ();
			} else {
				$this->_page = '/' . ltrim ( rtrim ( $page, '/' ), '/' );
			}
		}
		public function relative_path($uri = null) {
			if (null === $uri) {
				$uri = $_SERVER ['REQUEST_URI'];
			}
			$uri = explode ( '?', $uri );
			$uri = $uri [0];
			$uri = rtrim ( $uri, '/' );
			$project = dirname ( $this->filename () );
			$root_uri = $uri;
			while ( strpos ( $project, $root_uri ) === false ) {
				$root_uri = substr ( $root_uri, 0, strrpos ( $root_uri, '/' ) );
			}
			$uri = '/' . ltrim ( rtrim ( substr ( $uri, strlen ( $root_uri ) ), '/' ), '/' );
			return $uri;
		}
		private $_filename = null;
		public function filename() {
			return $this->_filename;
		}
		protected $handler = null;
		public function __construct($filename = "",$handler='bv25v_settings') {
			if (! class_exists ( 'bv25v_loader' )) {
				require_once dirname ( dirname ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'base/loader.php';
			}
			$this->_loader = new bv25v_loader ( $this );
			parent::__construct ( $this );
			$this->handler=$handler;
			$this->_filename = $filename;
			$this->preload_classes ();
			$class = $this->_class();
			$this->settings=new $class($this);
			$this->set_frontcontroller ();
			self::$applications [] = $this;
		}
		private $osettings = null;
		public function osettings() {
			if (null == $this->osettings) {
				$this->osettings = new bv25v_oSettings ( $this );
			}
			return $this->osettings;
		}
		private $_frontController;
		public function frontcontroller() {
			$this->set_frontcontroller ();
			return $this->_frontcontroller;
		}
		protected function set_frontcontroller($controller = null) {
			if (null === $controller) {
				$this->_frontcontroller = bv25v_controller_front::getInstance ( $this->application () );
			} else {
				$this->_frontcontroller = $controller;
			}
		}
		private $_loader = null;
		public function loader() {
			return $this->_loader;
		}
		private $settings = null;
		public function settings()
		{
			return $this->settings;
		}
		protected function _class()
		{
			return $this->handler;
		}
		protected function preload_classes($classes = array()) {
			$classes = ( array ) $classes;
			$loader = $this->loader ();
			array_unshift ( $classes, 'bv25v_info', 'bv25v_controller_action', 'bv25v_type_abstract', 'bv25v_type_string', 'bv25v_type_array', 'bv25v_fs', 'bv25v_view', 'bv25v_http', 'bv25v_tag', 'bv25v_data_abstract', 'bv25v_data_xml', 'bv25v_fs', 'bv25v_http', 'bv25v_controller_front', 'bv25v_controller_dispatcher', 'bv25v_table','bv25v_settings' );
			foreach ( $classes as $class ) {
				$loader->load_class ( $class );
			}
			$loader->load_class ( $this->_class() );
		}
	}


endif;