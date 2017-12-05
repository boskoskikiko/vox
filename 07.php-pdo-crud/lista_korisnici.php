<?php 
// lista na korisnici

require_once 'konektor.php';

if (isset($_GET['action']) && $_GET['action']=='delete') {
	$qKor = $konektor->prepare('DELETE FROM korisnici WHERE username = :username');
	$qKor->bindValue('username', $_GET['username']);
	$qKor->execute();
}


$qKor = "SELECT * FROM korisnici";

$korisnici = $konektor->query($qKor);
$fKor = $korisnici->fetchAll(PDO::FETCH_OBJ);

//echo"<pre>", print_r($fKor) , "</pre>";
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
 			<td>
 				 <a href="lista_korisnici.php?username=<?php echo $k->username; ?>
 						&action=delete"onclick="return confirm('Dali si siguren')">Delete</a> |

				 <a href="edit.php?username=<?php echo $k->username; ?>">Edit</a>
 			</td>
		</tr>
	<?php 
	}
 	?>
 </table>
 <?php 


  ?>