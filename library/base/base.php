<?php
if (! class_exists ( 'bv21v_base' )) :
	abstract class bv21v_base {
		
		protected static $_instance = null;
		public function __construct($application = null) {
			$this->_application = $application;
		}
		private $_application = null;
		public function set_application($application = null) {
			$this->_application = $application;
		}
		public function application() {
			if (null === $this->_application) {
				throw new Exception ( "Application not set \n" );
			}
			return $this->_application;
		}
		public function settings() {
			return $this->application ()->settings ();
		}
		public function debug() {
			$this->show ( func_get_args (), false );
		}
		public function tdebug() {
			$this->show ( func_get_args (), true );
		}
		public function dodebug() {
			return (getenv ( 'DEBUG' ) == 'yes' || $this->force_debug || $_SERVER['HTTP_HOST']=='demo.dcoda.co.uk');
		}
		public $force_debug = false;
		public function trace()
		{
			$ret = debug_backtrace();
			foreach($ret as $key=>$value)
			{
				unset($ret[$key]['object']);
				unset($ret[$key]['args']);
			}
			$this->debug($ret);
			
		}
		private function show($values, $type) {
			if (! $this->dodebug ()) {
				return;
			}
			echo "<pre>";
			foreach ( $values as $value ) {
				if ($type) {
					var_dump ( $value );
				} else {
					print_r ( $value );
				}
				echo "<br/>";
			}
			echo "</pre><br/>";
		}
	}




endif;