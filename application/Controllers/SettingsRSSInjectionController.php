<?php
class SettingsRSSInjectionController extends w3v_Controller_Action_AdminMenu {
	public function SettingsAction($content)
	{
		$dataObj = new RSSInjectionData(false);
		$this->view->data = $dataObj->post();
		return $content;
	}
}
		