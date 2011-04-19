<?php
class settingsrssinjection extends wv27v_controller_action_adminmenu {
	public function getting_startedAction($content) {
		return $content;
	}
	public function settingsActionMeta($return)
	{
		$return['priority'] = -1;
		return $return;
	}
	public function settingsAction($content)
	{
		$this->view->data = $this->settings()->post('options');
		return $content . $this->updated();
	}
}
		