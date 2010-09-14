<?php
/**
 * find images in the project using wp specific find routines
 * @package Library
 * @subpackage WP_Image
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class DCode_WP_Image extends DCode_Image
{
	public function twitter ()
	{
		return DCode_WP_Values::urlFromFileame(parent::twitter());
	}
	public function facebook ()
	{
		return DCode_WP_Values::urlFromFileame(parent::facebook());
	}
}