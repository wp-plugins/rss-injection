<?php
/**
 * adds admin pages for censor under the plugin option
 * @package RSSSticky
 * @subpackage PluginsRSSStickyController
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class SettingsRSSInjectionController extends DCode_Controller_Action_WP_AdminMenu {
	public function SettingsAction($content)
	{
		$dataObj = new RSSInjectionData(false);
		$this->view->data = $dataObj->post();
		return $content;
	}
}
		