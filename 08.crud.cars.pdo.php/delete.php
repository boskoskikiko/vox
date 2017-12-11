<?php 
require_once 'CarModel.php';
	
if (isset($_GET['id'])) {
	$car = CarModel::deleteByID($_GET['id']);
	header("Location:index.php");
}



?>