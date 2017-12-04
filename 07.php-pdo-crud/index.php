<?php  
//dinamicka strana

session_start();

//povrzuvanje na baza
require_once"konektor.php";

if (isset($_SESSION['id'])) {
	//sesija postoi
	?>
	
	<a href="index.php">POCETNA</a> |
	<a href="index.php?opcija=lista_korisnici">KORISNICI</a> |
	<a href="index.php?opcija=profil">PROFIL</a> |
	<a href="index.php?opcija=logout">LOGOUT</a><hr>
	<?php
	if (isset($_GET['opcija'])) {
		$file = $_GET['opcija'] . ".php";
		if (file_exists($file)) {
			include_once($file);
		}else{
			echo "Baranata stranica ne postoi,vrate te se na <a href='index.php'>POCETNA</a>";
		}

	}else{
		echo "POCETNA STRANICA <br><br>";
	}


}else{
	//sesija ne postoi
	?>
	
	<a href="index.php">POCETNA</a> |
	<a href="index.php?opcija=registracija">REGISTRACIJA</a> |
	<a href="index.php?opcija=login">LOGIN</a><hr>
	<?php
	if (isset($_GET['opcija'])) {
		$file = $_GET['opcija'] . ".php";
		if (file_exists($file)) {
			include_once($file);
		}else{
			echo "Baranata stranica ne postoi,vrate te se na <a href='index.php'>POCETNA</a>";
		}

	}else{
		echo "POCETNA STRANICA <br><br>";
		echo "NAJAVI SE";
		include_once "login.php";
		echo "<br>";
		echo "REGISTRIRAJ SE";
		include_once "registracija.php";
	}
}


?>