<?php
class settingsrssinjectioncontroller extends wv15v_controller_action_adminmenu {
	public function SettingsAction($content)
	{
		$this->view->data = $this->settings()->post('options');
		return $content . $this->updated();
	}
}
		