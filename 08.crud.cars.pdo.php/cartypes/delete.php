<?php 

require_once '../CarType.php';
	
if (isset($_GET['id'])) {
	$car = CarType::deleteByID($_GET['id']);
	header("Location:index.php");
}


 ?>