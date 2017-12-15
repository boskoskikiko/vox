<?php 

class Model {


	// public function getIdzaednicko()
	// {
	//    $db = Connection::connect();
 //       $dbh->prepare("ALTER TABLE car ADD FOREIGN KEY (id_cartype) REFERENCES cartype(id)");
	// }

	
	public static function getAll(){

 		$table = strtolower(get_called_class());
 		$class = get_called_class();


		$db = connection::connect();
		$stmt = $db->prepare("SELECT * FROM " . $table);
		$stmt->execute();
		$model = $stmt->fetchAll();

		$array=[];

		foreach ($model as $key => $value) {
			$car = new $class($value);
			$array[] = $car;
		}
		return $array;
	}

	public function delete()
	{
		self::deleteByID($this->id);
	}


	//====delete
	public static function deleteByID($id){

	

		$table = strtolower(get_called_class());


		try{
			$db = Connection::connect();
			$stmt = $db->prepare("DELETE FROM ". $table ." WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
		}
		catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		}
  	}




  		//====select
	public static function getById($id){


		$table = strtolower(get_called_class());
		$class = get_called_class();
		
	 	try{
			$db = Connection::connect();
			$stmt = $db->prepare("SELECT * FROM ". $table ." WHERE id = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			$model = $stmt->fetch();
		    if($model){
			    $car = new $class($model);
			    return $car;
			  }else{
			    return FALSE;
		    }
		}
		catch(PDOException $e) {
		  echo $sql . "<br>" . $e->getMessage();
		}
 	}//end function getId



 // 	//====SAVE UPDATE / INSERT
 // 	public function save(){

		

	// 	if (isset($this->id)) {
			
 // 		$table = strtolower(get_called_class());
	// 	$class = get_called_class();
					
	// 		//====Update
	// 		try {
				
	// 			$db = Connection::connect();

	// 			$stmt = $db->prepare("UPDATE ". $table ." 
	// 	      	SET ime=:ime,
	// 						registracija=:registracija,
	// 						godina=:godina
	// 	      	 WHERE id=:id");

	// 			// var_dump($this->ime);
			

	// 			$stmt->bindParam(':ime', $this->ime);
	// 			$stmt->bindParam(':registracija',$this->registracija);
	// 			$stmt->bindParam(':godina', $this->godina);
	// 			$stmt->bindParam(':id', $this->id);
	// 			$stmt->execute();
	// 		} catch (PDOException $e) {
	// 				echo $sql . "<br>" . $e->getMessage();
	// 		}
	// 	}else{

	// 		//====Insert
	// 		try {
				
	// 			$db = Connection::connect();

	// 			$stmt = $db->prepare("INSERT INTO ". $table ." (ime, registracija, godina) VALUES (:ime, :registracija, :godina)");

	// 			$stmt->bindParam(':ime', $this->ime);
	// 			$stmt->bindParam(':registracija',$this->registracija);
	// 			$stmt->bindParam(':godina', $this->godina);
	// 			$stmt->execute();
	// 			echo "New Car created Seccessfull";

	// 		} catch (PDOException $e) {
	// 				echo $sql . "<br>" . $e->getMessage();
	// 		}
	// 	}//end ifelse
	// }//end function save


}

 ?>