<?php 

require_once 'connection/db_connection.php';
require_once 'Model.php';

class CarModel extends Model{

	private $id;
	private $ime;
	private $registracija;
	private $godina;
	private $id_cartype;
	private $test
	;
	static private $tableName = "carmodel";
	
	public function __construct($rows = [])
	{
		foreach ($rows as $key => $value) {
			$this->{$key} = $value;
		}
	}


	public function getId(){
		return $this->id;
	}

	public function setid_cartype($id_cartype){
		$this->id_cartype = $id_cartype;
	}
	public function getid_cartype(){
		return $this->id_cartype;
	}


	public function setTest($test){
		$this->test = $test;
	}
	public function gettest(){
		return $this->test;
	}


	public function setIme($ime){
		$this->ime = $ime;
	}
	public function getIme(){
		return $this->ime;
	}


	public function setRegistracija($registracija)	{
		$this->registracija = $registracija;
	}
	public function getRegistracija()
	{
		return $this->registracija;
	}


	public function setGodina($godina)	{
		$this->godina = $godina;
	}
	public function getGodina()
	{
		return $this->godina;
	}





	// //====select
	// public static function getById($id){
		
	//   try{
	// 		$db = Connection::connect();
	// 		$stmt = $db->prepare("SELECT * FROM ".self::$tableName." WHERE id = :id");
	// 		$stmt->bindParam(':id', $id);
	// 		$stmt->execute();
	// 		$model = $stmt->fetch();
	// 	    if($model){
	// 		    $car = new self($model);
	// 		    return $car;
	// 		  }else{
	// 		    return FALSE;
	// 	    }
	// 	}
	// 	catch(PDOException $e) {
	// 	  echo $sql . "<br>" . $e->getMessage();
	// 	}
 // 	}//end function getId





	public function save(){
		
		if (isset($this->id)) {
					
			//====Update
			try {
				
				$db = Connection::connect();

				$stmt = $db->prepare("UPDATE ".self::$tableName." 
		      	SET ime=:ime,
					registracija=:registracija,
					godina=:godina
					id_cartype=:id_cartype
					test=:test
		      	 WHERE id=:id");

				// var_dump($this->ime);
			

				$stmt->bindParam(':ime', $this->ime);
				$stmt->bindParam(':registracija',$this->registracija);
				$stmt->bindParam(':godina', $this->godina);
				$stmt->bindParam(':id', $this->id);
				$stmt->bindParam(':id_cartype', $this->id_cartype);
				$stmt->bindParam(':test', $this->test);
				$stmt->execute();
			} catch (PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
			}
		}else{

			//====Insert
			try {
				
				$db = Connection::connect();

				$stmt = $db->prepare("INSERT INTO ".self::$tableName." (ime, registracija, godina, id_cartype, test) VALUES (:ime, :registracija, :godina, :id_cartype, :test)");

				$stmt->bindParam(':ime', $this->ime);
				$stmt->bindParam(':registracija',$this->registracija);
				$stmt->bindParam(':godina', $this->godina);
				$stmt->bindParam(':id_cartype', $this->id_cartype);
				$stmt->bindParam(':test', $this->test);
				$stmt->execute();
				echo "New Car created Seccessfull";

			} catch (PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
			}
		}//end ifelse
	}//end function save
	// var_dump(save());






}//end Class CarModel

 ?>