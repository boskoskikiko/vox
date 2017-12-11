<?php 

require_once 'connection/db_connection.php';
require_once 'Model.php';

class CarType extends Model {

	private $name;
	private $power;

	public function getName() {
		return $this->name;
	}

	public function getPower() {
		return $this->power;
	}

	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function setPower($power) {
		$this->power = $power;
		return $this;
	}

	public function __construct($rows = [])
	{
		foreach ($rows as $key => $value) {
			$this->{$key} = $value;
		}
	}



	static private $tableName = "carmodel";

}

?>