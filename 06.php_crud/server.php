<?php 
	session_start();
	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$edit_state = false;
	//connect to database
	$db = mysqli_connect('localhost', 'root', '', 'crud');



	//if save button database
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['msg'] = "Address saved"; 
		header('location: index.php');
	}


	//update records
	if (isset($_POST['update'])){
		$name = mysqli_real_escape_string($db,$_POST['name']);
		$address = mysqli_real_escape_string($db,$_POST['address']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$the_query = "UPDATE info SET name= '$name', address= '$address' WHERE id= '$id'";
		// $the_query = "UPDATE info SET name = ".$name.", address = ".$address" WHERE id = "$id";
		mysqli_query($db,$the_query);
		// print "<pre>";

		// var_dump($name);
		// var_dump($address);
		// var_dump($id);

		// print "</pre>";

		// die();
		$_SESSION['msg'] = "Address update"; 
		header('location: index.php');
	}

	//delete records
	if(isset($_GET['del'])){
		$id = $_GET['del'];
		mysqli_query($db,"DELETE FROM info WHERE id=$id");
	$_SESSION['msg'] = "Address delete"; 
	header('location: index.php');
	}


	//retrive records
	$results = mysqli_query($db, "SELECT * FROM info");