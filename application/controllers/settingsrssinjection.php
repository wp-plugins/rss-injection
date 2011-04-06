<?php
class settingsrssinjection extends wv25v_controller_action_adminmenu {
	public function settingsAction($content)
	{
		$this->view->data = $this->settings()->post('options');
		return $content . $this->updated();
	}
}
		