<?php
/**
 * class for loading and parseing ini data
 * @package Library
 * @subpackage Data_INI
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
class DCode_Data_INI extends DCode_Data_Abstract
{
	public function load ()
	{
		$this->value = $this->staticLoad($this->filename);
		return $this;
	}
	public function staticLoad ($file)
	{
		return parse_ini_file($this->findfile($file));
	}
}
