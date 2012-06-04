<?php
class rssinjection_dashboard extends wv48fv_action {
	public function rssinjectionWPmenuMeta($return) {
		$return ['title'] = $this->application()-> name;
		$return ['slug'] = $this->application()-> slug;
		return $return;
	}
	public function settingsActionMeta($return) {
		$return ['link_name'] = $return ['title'];
		$return ['classes'] [] = 'v48fv_16x16_settings';
		$return ['priority'] = - 1;
		return $return;
	}
	public function settingsAction() {
		$this->view->data = $this->application()->data ()->post ( 'options' );
		$this->view->title = $this->help('settings')->render('Settings');
		$this->view->column_count=1;
		$this->view->table_type='standard';
		$this->view->option='http';
		$this->view->rows[] = $this->render_script('common/row1.phtml');
		$this->view->rows[] = $this->render_script('common/row2.phtml');
		$page = $this->render_table();
		//$page .= $this->render_script('common/settings.phtml');
		return $page;
	}
}

		