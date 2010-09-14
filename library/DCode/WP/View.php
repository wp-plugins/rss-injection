<?php
/**
 * modifies the standard view class to point to WP specific funcitons
 * @package Library
 * @subpackage WP_View
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class DCode_WP_View extends DCode_View
{
	protected function set_image()
	{
		parent::set_image(new DCode_WP_Image($this->application()));
	}
}
