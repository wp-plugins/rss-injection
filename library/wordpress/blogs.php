<?php
/*****************************************************************************************
* ??document??
*****************************************************************************************/
class wv46v_blogs extends bv46v_base {
/*****************************************************************************************
* ??document??
*****************************************************************************************/
	public function swap($id = null,$validate=false) {
		if(is_multisite())
		{
			if (null !== $id) {
				if($id!='')
				{
					switch_to_blog($id,$validate);
				}
			} else {
				restore_current_blog();
			}
		}
	}
}