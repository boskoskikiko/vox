<?php 
// lista na korisnici

require_once 'konektor.php';

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
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>">edit</a></td>
			<td> <a href="index.php?opcija=profil&pid=<?php echo $k->id; ?>">delete</a></td>
		</tr>
	<?php 
	}
 	?>
 </table>
 <?php 


  ?>