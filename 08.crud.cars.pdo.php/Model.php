<?php 

class Model {



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

}

 ?>