<?php
class wv25v_table_comments extends wv25v_table {
	public function name() {
		return $this->wpdb ()->comments;
	}
}