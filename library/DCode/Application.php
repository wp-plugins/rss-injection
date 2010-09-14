<?php
/**
 * The main controlling element , loads required classes keeps track of requirements, and other co-applications, and keeps a reference to the base of the application using filename
 * @package Library
 * @subpackage Application
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
if (! class_exists ( 'DCode_Application' ))
:
	require dirname ( __FILE__ ) . '/Base.php';
	class DCode_Application extends DCode_Base
	{
		private $_page = null;

		public function page ()
		{
			if (null === $this->_page)
			{
				$this->set_page ();
			}
			return $this->_page;
		}

		public function set_page ( $page = null )
		{
			if (null === $page)
			{
				$this->_page = $this->relative_path ();
			}
			else
			{
				$this->_page = '/' . ltrim ( rtrim ( $page , '/' ) , '/' );
			}
		}

		public function relative_path ( $uri = null )
		{
			if (null === $uri)
			{
				$uri = $_SERVER ['REQUEST_URI'];
			}
			$uri = explode ( '?' , $uri );
			$uri = $uri [0];
			$uri = rtrim ( $uri , '/' );
			$project = dirname ( $this->filename () );
			$root_uri = $uri;
			while ( strpos ( $project , $root_uri ) === false )
			{
				$root_uri = substr ( $root_uri , 0 , strrpos ( $root_uri , '/' ) );
			}
			$uri = '/' . ltrim ( rtrim ( substr ( $uri , strlen ( $root_uri ) ) , '/' ) , '/' );
			return $uri;
		}
		//--- filename
		private $_filename = null;

		public function filename ()
		{
			return $this->_filename;
		}

		private function set_filename ( $filename )
		{
			$this->_filename = $filename;
		}
		//--- applications
		private static $_applications = array ();

		public function applications ()
		{
			return self::$_applications;
		}

		private function add_application ()
		{
			self::$_applications [] = $this;
		}

		//--- contructor
		public function __construct ( $filename = "" )
		{
			if ($this->MeetsSpec ())
			{
				$this->set_loaded ();
				parent::__construct ( $this );
				$this->set_filename ( $filename );
				$this->preload_classes ();
				$this->set_frontcontroller ();
				$this->add_application ();
			}
		}
		//---
		private $_frontController;

		public function frontcontroller ()
		{
			$this->set_frontcontroller ();
			return $this->_frontcontroller;
		}

		protected function set_frontcontroller ( $controller = null )
		{
			if (null === $controller)
			{
				$this->_frontcontroller = DCode_Controller_Front::getInstance ( $this->application () );
			}
			else
			{
				$this->_frontcontroller = $controller;
			}
		}
		//--- loader
		private $_loader = null;

		public function loader ()
		{
			return $this->_loader;
		}

		protected function set_loader ()
		{
			if (! class_exists ( 'DCode_Loader' ))
			{
				require_once dirname ( dirname ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'DCode/Loader.php';
			}
			$this->_loader = new DCode_Loader ( $this );
			$this->_loader->add_subfolder ( 'application' );
		}

		//--- meet spec
		protected function phpmin ()
		{
			return '5.0.2';
		}
		protected $errors = null;

		protected function MeetsSpec ()
		{
			$this->errors = array ();
			if (version_compare ( phpversion () , $this->phpmin () ) >= 0)
			{
				$this->set_loader ();
				if (! class_exists ( 'DCode_Loader' ))
				{
					require_once dirname ( dirname ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'DCode/Loader.php';
				}
				$db = debug_backtrace ();
				$file = $db ['1'] ['file'];
				DCode_Loader::addRoot ( $file );
				return true;
			}
			$this->errors [] = "%s requires a minimum of PHP " . $this->phpmin ();
			$this->showError ();
			return false;
		}

		protected function showError ()
		{
			foreach ( ( array ) self::$errors as $error )
			{
				printf ( $error , $this->name () );
			}
		}

		//--- autoload
		protected function preload_classes ( $classes = array() )
		{
			$classes = ( array ) $classes;
			$loader = $this->loader ();
			array_unshift ( $classes , 'DCode_Controller_Action' , 'DCode_Type_Abstract' , 'DCode_Mysql' , 'DCode_Type_String' , 'DCode_Type_Array' , 'DCode_Debug' , 'DCode_Values' , 'DCode_FS' , 'DCode_View' , 'DCode_Http' , 'DCode_Tag' , 'DCode_Data_Abstract' , 'DCode_Data_INI' , 'DCode_Data_CSV' , 'DCode_Image' , 'DCode_Data_XML' , 'DCode_FS' , 'DCode_Http'  , 'DCode_Controller_Front' , 'DCode_Controller_Dispatcher_Standard' , 'DCode_Validate' , 'DCode_Table', 'DCode_Controller_Action_Direct' ,'Project');
			foreach ( $classes as $class )
			{
				$loader->load_class ( $class );
			}
		}
		//--- app loaded
		private $_apploaded = false;

		protected function apploaded ()
		{
			return $this->apploaded;
		}

		protected function set_apploaded ()
		{
			$this->_apploaded = true;
		}
		//--- name
		private $_name = 'DCoda Application';
		private $_loaded = false;
		private $_loadedname = false;

		public function name ()
		{
			$this->set_name ();
			return $this->_name;
		}

		protected function set_loaded ()
		{
			$this->_loaded = true;
		}

		protected function set_name ( $name = null )
		{
			if (null !== $name)
			{
				$this->_name = $name;
				return;
			}
			if ($this->_loaded && ! $this->_loadedname)
			{
				$project = new Project ( $this,$this->filename() );
				$info = $project->blocks();
				$this->_name = $info[0]['Plugin Name'];
				$this->_loadedname = true;
			}
		}
	}









endif;