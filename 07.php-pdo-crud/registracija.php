<?php 
//file for registration

require_once "konektor.php";

$err = "";
// $username = $_POST['username'];
// $password = $_POST['pass'];
// $name = $_POST['name'];
// $email = $_POST['email'];

if (isset($_POST['submit'])) {

//korisnik - proverka dali takov korisnik postoi vo bazata
	if (!empty($_POST['username'])) {
		$qUserName = "SELECT * FROM `korisnici` WHERE `username` = :username";
		$korisnici = $konektor->prepare($qUserName);//pripremi gi podatocite od bazata ...
		$korisnici->execute(array(":username" => $_POST['username']));//izvrsi gi podatocite od bazata
		// i koe pole da mi go povrzis so promenlivata :username

		if ($korisnici->rowCount()) {//rowCount(prebrojuva redovi) ako vo redoti ima takov username ispisi .....
			$err .= "username postoi vo baza, odberi nov </br>";
		}else{
			$username = $_POST['username'];
		}
	}else {
		$err .= "- Morate da go popolnite praznoto mesto na Username</br>";
	}

//Pasvord
	if (!empty($_POST['pass'])) {
		
	}else {
		$err .= "- Morate da go popolnite praznoto mesto na Password</br>";
	}

//rePasvord
	if (!empty($_POST['repass'])) {
		
	}else {
		$err .= "- Morate da go popolnite praznoto mesto na rePassword</br>";
	}

//proverka dali se ednakvi pasvordite	
	if (!empty($_POST['pass']) && !empty($_POST['repass']))	
	{
		if ($_POST['pass'] == $_POST['repass']) {
			$pass = md5($_POST['pass']);//md5 za zastita na pasvordite vo bazata
		}else{
			$err .= "Pasvordite ne se ednakvi";
		}
	}

//ime
	if (!empty($_POST['name'])) {
		
	}else {
		$err .= "- Morate da go popolnite praznoto mesto na Name</br>";
	}

//Mail - i proverka dali takov mail postoi vo bazata
	if (!empty($_POST['email'])) 
	{
		$qUserName = "SELECT * FROM `korisnici` WHERE `email` = :email";
		$korisnici = $konektor->prepare($qUserName);//pripremi gi podatocite od bazata ...
		$korisnici->execute(array(":email" => $_POST['email']));//izvrsi gi podatocite od bazata
		// i koe pole da mi go povrzis so promenlivata :email

		if ($korisnici->rowCount()) {//rowCount(prebrojuva redovi) ako vo redoti ima takov email ispisi .....
			$err .= "email postoi vo baza, odberi nov </br>";
		}else{
			$email = $_POST['email'];
		}
	}else {
		$err .= "- Morate da go popolnite praznoto mesto na eMail</br>";
	}


//gore navedenoto prazno mesto e popolneto ..... proveruva ako praznoto mesto ne e prazno t.e razlicno e od prazno mesto togas daj mi izvestuvanje ... koe izvestuvanje ? izvestuvanjeto od polinata za popolnuvanje a ako ne izvrsi mi go else ... koj gi vnesuva site podatoci vo baza i ispisuva se registriravte.
	if ($err <> "") {
		echo $err;
	}else{
//====================================vnesuvanje na podatocite vo baza====================================
	//	baranje za korisnikot da se vnesat podatodicite kade .... tamu
		$qk = "INSERT INTO `korisnici` 
			   SET `username` = :username, 
			   		`password` = :password,
			   		`name` = :name,
			   		`email` = :email
			  ";
	 	//pripremi go baranjeto od korisnikot
		$k = $konektor->prepare($qk);
		$k->execute(array(
					  	':username' => $username,//mozi i na ovoj nacin da se definira
					  	':password' => $pass,//mozi i na ovoj nacin da se definira
					  	':name' => $_POST['name'],//mozi i na ovoj nacin da se definira
					  	':email' => $email,
					));
		echo "Se registriravte";
		header("Location:index.php");
	}
}
 ?>




 <form accept="index.php?opcija=registracija" method="POST" enctype="multipart/form-data">
 	
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
			<td>
				RePassword
			</td>
			<td>
				<input type="password" name="repass"></input>
			</td>
		</tr>
		<tr>
			<td>
				Name
			</td>
			<td>
				<input type="text" name="name"></input>
			</td>
		</tr>
		<tr>
			<td>
				eMail
			</td>
			<td>
				<input type="text" name="email"></input>
			</td>
		</tr>
			<td colspan="2">
				<input type="submit" name="submit" value="Registation">
			</td>
		</tr>		
	</table>

 </form>