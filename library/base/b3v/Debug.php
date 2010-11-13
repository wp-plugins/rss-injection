<?php
class b3v_Debug extends b3v_Base
{
	public static function dodebug()
	{
		return (getenv('DEBUG') == 'yes');
	}
	public static function show($value)
	{
		if (! self::doDebug()) {
			return;
		}
		echo "<pre>" . print_r ( $value , true ) . "</pre><br/>";
		 
	}
}