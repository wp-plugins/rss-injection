<?php
/*****************************************************************************************
* ??document??
*****************************************************************************************/
class wv46v_mail extends bv46v_mail {
/*****************************************************************************************
* ??document??
*****************************************************************************************/
	protected function headercharset() {
		return "charset=\"" . get_option ( 'blog_charset' ) . "\"\n";
	}
/*****************************************************************************************
* ??document??
*****************************************************************************************/
	protected function sendit($to, $subject, $message, $headers = "") {
		wp_mail ( $to, $subject, $message, $headers );
	}
}