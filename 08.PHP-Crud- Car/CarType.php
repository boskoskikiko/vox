<?php 

require_once 'connection/db_connection.php';
require_once 'Model.php';

class CarType extends Model {

	private $id;
	private $name;
	private $power;
	private $image;

	public function getId(){
		return $this->id;
	}
	// public function getIdzaednicko()
	// {
	//    $db = Connection::connect();
 //       $dbh->prepare("ALTER TABLE car ADD FOREIGN KEY (id_cartype) REFERENCES cartype(id)");
	// }

	public function getName() {
		return $this->name;
	}

	public function getPower() {
		return $this->power;
	}

	public function getImage() {
		return $this->image;
	}

	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function setPower($power) {
		$this->power = $power;
		return $this;
	}
	public function setImage($image) {
		 $this->image = $image;
		 return $this;
	}


	public function __construct($rows = [])
	{
		foreach ($rows as $key => $value) {
			$this->{$key} = $value;
		}
	}



	static private $tableName = "cartype";



//==============SAVE / UPDATE-INSERT ==Method

	public function save(){
		
		if (isset($this->id)) {
					
			//====Update
			try {
				
				$db = Connection::connect();

				$stmt = $db->prepare("UPDATE ".self::$tableName." 
		      	SET name=:name,
					power=:power,
					image=:image
		      	 WHERE id=:id");

				// var_dump($this->ime);
			

				$stmt->bindParam(':name', $this->name);
				$stmt->bindParam(':power',$this->power);
				$stmt->bindParam(':image',$this->image);

				$stmt->bindParam(':id', $this->id);
				$stmt->execute();
			} catch (PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
			}
		}else{

			//====Insert
			try {
				
				$db = Connection::connect();

				$stmt = $db->prepare("INSERT INTO cartype (name, power, image) VALUES (:name, :power, :image)");
				
				$stmt->bindParam(':name',$this->name);
				$stmt->bindParam(':power',$this->power);
				$stmt->bindParam(':image',$this->image);
				//die(var_dump($this));
				$stmt->execute();
				echo "New Car created Seccessfull";

			} catch (PDOException $e) {
				
					echo $sql . "<br>" . $e->getMessage();
			}
		}//end ifelse
	}//end function save

}

?>