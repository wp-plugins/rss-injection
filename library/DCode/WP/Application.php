<?php
/**
 * base of all wp applications, loads requred classes and has a few plugins. This show be phasesed out and not used
 * @package Library
 * @subpackage WP_Application
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
if (! class_exists ( 'DCode_WP_Application' ))
:
	require_once dirname ( dirname ( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'Application.php';
	class DCode_WP_Application extends DCode_Application
	{

		public function relative_path ( $uri = null )
		{
			global $current_blog;
			if (null === $uri)
			{
				$uri = $_SERVER ['REQUEST_URI'];
			}
			$uri = substr ( $uri , strlen ( $current_blog->path ) );
			$uri = explode ( '?' , $uri );
			$uri = $uri [0];
			$uri = rtrim ( $uri , '/' );
			$uri = '/' . rtrim ( $uri , '/' );
			return $uri;
		}

		public function __construct ( $filename = "" , &$view = null )
		{
			if (! function_exists ( "wp" ))
			{throw new Exception ( "WordPress has not loaded." );}
			parent::__construct ( $filename );
		}

		public static function WPload ()
		{
			$path = __FILE__;
			while ( ! empty ( $path ) )
			{
				$path = dirname ( $path );
				$file = $path . DIRECTORY_SEPARATOR . 'wp-load.php';
				if (file_exists ( $file ))
				{return $file;}
			}
		}

		public function preload_classes ( $classes = array() )
		{
			$classes = (array)$classes;
			array_unshift($classes,
				 'DCode_WP_Application' , 'DCode_WP_Values' , 'DCode_WP_Mysql'  , 'DCode_WP_Image' , 'DCode_WP_Table' , 'WP_Sites' , 'WP_Site' , 'WP_SiteMeta' , 'WP_Posts' , 'WP_Blogs' , 'WP_Blog' , 'WP_Options' , 'WP_Users' , 'WP_UserMeta'
		);
			parent::preload_classes ( $classes );
		}
	}




endif;
