<?php  
//dinamicka strana

session_start();

//povrzuvanje na baza
require_once"konektor.php";


$qKor = "SELECT * FROM korisnici";

$korisnici = $konektor->query($qKor);
$fKor = $korisnici->fetchAll(PDO::FETCH_OBJ);



if (isset($_SESSION['id'])) {
	//sesija postoi
	?>
	
	<a href="index.php">POCETNA</a> |
	<a href="index.php?opcija=lista_korisnici">KORISNICI</a> |
	<a href="index.php?opcija=profil">PROFIL</a> |
	<a href="index.php?opcija=uciliste">UCILISTE</a> |
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
?>
<table border="1">
	<tr>
		<th>ID</th>
		<th>USERNAME</th>
		<th>NAME</th>
		<th>UCILISTE</th>
		<th>EMAIL</th>
	</tr>

	<?php
	foreach ($fKor as $k) {
	?>	
		<tr>

			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>"><?php echo $k->id;?></a></td>
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>"><?php echo $k->username;?></a></td>
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>"><?php echo $k->name;?></a></td>
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>">rampo levkata</a></td>
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>"><?php echo $k->email;?></a></td>
			
		</tr>
	<?php 
	}
 	?>
 </table>

<!-- UCILISTE -->

<?php 


if (isset($_GET['action']) && $_GET['action']=='delete') {
	$stmt = $konektor->prepare('DELETE FROM uciliste WHERE ime = :ime');
	$stmt->bindValue('ime', $_GET['ime']);
	$stmt->execute();
}


$stmt = $konektor->prepare('SELECT * FROM uciliste');
$stmt->execute();

 ?>
<br><br> 
 <table cellpadding="2" cellspacing="2" border="1"> 
 	<tr>
 		<th>Ime</th>
 		<th>BrUcenici</th>
 		<th>Grad</th>
 		<th>Mail</th>
 		<th>Option</th>
 	</tr>
 	<?php while ($account = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
 	 <tr>
 		<td><?php echo $account->ime; ?></td>
 		<td><?php echo $account->brUcenici; ?></td>
 		<td><?php echo $account->mesto; ?></td>
 		<td><?php echo $account->email; ?></td>
 		<td>
 			<a href="index.php?ime=<?php echo $account->ime; ?>
 					&action=delete"onclick="return confirm('Dali si siguren')">Delete</a> |

<!--  			<a href="edit.php?ime=<?php echo $account->ime; ?>">Edit</a> -->
 		</td>
 	</tr>
	<?php } ?>
 </table>

<!-- END UCILISTE -->



<?php
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