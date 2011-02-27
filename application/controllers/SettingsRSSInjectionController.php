<?php
class SettingsRSSInjectionController extends wv15v_Controller_Action_AdminMenu {
	public function SettingsAction($content)
	{
		$this->view->data = $this->settings()->post('options');
		return $content . $this->updated();
	}
}
		