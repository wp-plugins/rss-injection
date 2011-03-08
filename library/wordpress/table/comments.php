<?php
class wv21v_table_comments extends wv21v_table {
	public function name() {
		return $this->wpdb ()->comments;
	}
}