<?php 
require'konektor.php';
if (isset($_POST['save'])) {
	$stmt = $konektor->prepare('INSERT INTO uciliste(ime, brUcenici, mesto, email) 
							VALUES(:ime, :brUcenici, :mesto, :email)');
	$stmt->bindValue('ime',$_POST['ime']);
	$stmt->bindValue('brUcenici',$_POST['brUcenici']);
	$stmt->bindValue('mesto',$_POST['mesto']);
	$stmt->bindValue('email',$_POST['email']);
	$stmt->execute();
	header('Location:index.php?opcija=uciliste');
}
 ?>
<form method="post" action="">
	<fieldset>VNESI UCILISTE</fieldset>
	<table cellpadding="2" cellspacing="2">
		<tr>
			<td>Ime na uciliste</td>
			<td><input type="text" name="ime"></td>
		</tr>
		<tr>
			<td>Broj na ucenici</td>
			<td><input type="text" name="brUcenici"></td>
		</tr>
		<tr>
			<td>Grad/Naselba</td>
			<td><input type="text" name="mesto"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
	</table>
</form>


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