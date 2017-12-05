<?php 
require_once "konektor.php";

$err = "";
// $username = $_POST['username'];
// $password = $_POST['pass'];


if (isset($_POST['submit'])) {
//ako login e kliknat

	if (!empty($_POST['username'])) {
		 $qUserName = "SELECT * FROM `korisnici` WHERE `username` = :username";
		 $korisnici = $konektor->prepare($qUserName);
		 $korisnici->execute(array(
		 	':username'=> $_POST['username'] 
		 ));
		 
		 //preprojuvanje usename vo baza
		 if ($korisnici->rowCount()==1) {
		 	//prijava na korisnik
		 }else if ($korisnici->rowCount() >= 2) {
		 	//greska vo sistem
		 	$err .= "- Greska, kontaktirajte go administratorot </br>";
		 }else{
		 	$err .= "- Username ne postoi vo bazata, ve molime registrirajte se </br>";
		 }


	}else {
		$err .= "- Morate da go popolnite praznoto mesto na Username</br>";
	}

//Proverka na Password
	if (!empty($_POST['pass'])) {
		if (isset($_POST['username'])) {
			$qAcount = "SELECT * FROM `korisnici` WHERE `username` = :username AND `password` = :pass";
		}
		$korisnici = $konektor->prepare($qAcount);
		$korisnici->execute(array(
		 	':username'=> $_POST['username'],
		 	':pass' => md5($_POST['pass']) 
		 ));

		if ($korisnici->rowCount()==1) {
			echo "Najaveni ste";
		}else if ($korisnici->rowCount()>=2) {
			$err .= "- Greska, kontaktirajte go administratorot </br>";
		}else{
			$err .= "- Password-ot ne postoi vo bazata, ve molime registrirajte se </br>";
		}

	}else {
		$err .= "- Morate da go popolnite praznoto mesto na Password</br>";
	}

//dali postoi greska?
	if ($err == "") {
		//ne postoi greska, se izvrsuva logiranjeto
		echo "- Uspesno logiranje";
		$qlog = $korisnici->fetchALL(PDO::FETCH_OBJ);

		foreach ($qlog as $acount) {
			$nalog = $acount->id;
		}
		$_SESSION['id'] = $nalog;
		header("Location:index.php");

	}else{
		echo $err;
	}

}


 ?>
 
<form accept="index.php?opcija=login" method="POST">
 	
	<table>
		<tr>
			<td>
				Username
			</td>
			<td>
				<input type="text" name="username"></input>
			</td>
		</tr>
		<tr>
			<td>
				Password
			</td>
			<td>
				<input type="password" name="pass"></input>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="submit" value="login">
			</td>
		</tr>		
	</table>

 </form>