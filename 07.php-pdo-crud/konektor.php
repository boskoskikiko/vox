<?php 
//file za povrzuvanje na DB

try{
	$konektor = new PDO('mysql:host=localhost;dbname=pdologreg','root','');
	$konektor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}

 ?>