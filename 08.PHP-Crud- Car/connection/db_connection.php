<?php 

class Connection{

private static $conn;

private function __construct(){

}

	public static function connect(){

		if(!empty(self::$conn)){
		return self::$conn;
		}

    try {
      $servername = "localhost";
      $dbname = "car";
      $username = "root";
      $password = "";

      $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

      //lets now assign the database connection to our $conn property 
      self::$conn = $dbh;
      //return the connection 
      return $dbh;

    } catch (PDOException $e) {
     print "Error! : " . $e->getMessage() . "<br/>";
     die();
    }
	}//end method 
}//end class


 ?>