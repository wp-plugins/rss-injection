<?php
class SettingsRSSInjectionController extends wv15v_Controller_Action_AdminMenu {
	public function SettingsAction($content)
	{
		$dataObj = new RSSInjectionData();
		$this->view->data = $dataObj->post();
		return $content . $this->updated();
	}
}
		