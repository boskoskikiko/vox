<?php 
//file za povrzuvanje na DB

try{
	$konektor = new PDO('mysql:host=localhost;dbname=pdologreg','root','');
	$konektor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	die();
}




	// //delete records
	// if(isset($_GET['del'])){
	// 	$id = $_GET['del'];
	// 	$qdelete = "DELETE FROM korisnici WHERE id=$id";
	// 	$korisnici = $konektor->prepare($qUserName);
	// 	$korisnici->execute(array(
	// 		":id" => $_POST['id']
	// 	));
	// $_SESSION['msg'] = "Address delete"; 
	// header('location: lista_korisnici.php');
	// }





 ?>
