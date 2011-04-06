<?php
class bv25v_controller_dispatcher extends bv25v_base {
	protected $_controllers = null;
	public function controllers() {
		$this->_controllers = array ();
		$dirs = $this->application ()->loader ()->includepath ( array('controllers') );
		foreach ( $dirs as $dir ) {
			$fs = new bv25v_fs ( $this->application (), $dir );
			$fs_controllers = $fs->dir ( '*.php' );
			foreach ( $fs_controllers as $fs_controller ) {
				$this->_controllers [] = $fs_controller;
			}
		}
		return $this->_controllers;
	}
}