<?php
/**
 * Ties wordpress filters to application actions IE
 * @example public function initAction() is the same as add_filter('init,array($this,'initAction')
 * @package Library
 * @subpackage Controller_Action_WP_Filter
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
abstract class DCode_Controller_Action_WP_Filter extends DCode_Controller_Action_WP_Abstract
{
	protected function marker($tag,$content)
	{
		$tagc = Dcode_Tag::instance ();
		$matches =$tagc->get($tag, $content, true);
		foreach ((array) $matches as $match) {
			$new = call_user_func(array($this,$tag.'_Marker'),$match);
			$content = str_replace($match['match'], DCode_WP_Values::fixPostInsert($new), $content);
		}
		return $content;
	}
	public function __construct ($application)
	{
		$this->set_type(self::WP_FILTER);
		parent::__construct($application);
	}
	public function setup ()
	{
		foreach ((array) $this->actions() as $action) {
			//DCode_Debug::show($action);
			$numargs = 5;
			add_filter($action['raw_title'], array($this , "controller"), $action['priority'],$numargs);
		}
	}
}
