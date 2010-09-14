<?php
/**
 * base of all file data classes
 * @package Library
 * @subpackage Data_Abstract
 * @copyright DCoda Ltd
 * @author DCoda Ltd
 * @license http://www.gnu.org/licenses/gpl.txt
 * $HeadURL$
 * $LastChangedDate$
 * $LastChangedRevision$
 * $LastChangedBy$
 */
abstract class DCode_Data_Abstract extends Dcode_Type_Array
{
	abstract public function staticLoad ($file);
	abstract public function load ();
	protected function findfile ($file)
	{
		return $this->application()->loader()->find_file("Data" . DIRECTORY_SEPARATOR . $file);
	}
	protected $filename = "";
	public function __construct ($application, $file, $array = null)
	{
		parent::__construct($array);
		$this->set_application($application);
		$this->filename = $file;
		$this->load();
	}
}
