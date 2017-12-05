<?php 
require'konektor.php';
if (isset($_POST['save'])) {

	$stmt = $konektor->prepare('SELECT * FROM korisnici WHERE username = :username');
	$stmt->bindValue('username',$_POST['username']);
	$stmt->execute();
	$account = $stmt->fetch(PDO::FETCH_OBJ);

	$stmt = $konektor->prepare('UPDATE korisnici 
							SET password = :password, name = :name, email = :email
							WHERE username = :username');
	$stmt->bindValue('username',$_POST['username']);
	$stmt->bindValue('password',$_POST['password'] == '' ? $account->password : $_POST['password']);
	$stmt->bindValue('name',$_POST['name']);
	$stmt->bindValue('email',$_POST['email']);
	$stmt->execute();
	header('Location:index.php');
}
	$stmt = $konektor->prepare('SELECT * FROM korisnici WHERE username = :username');
	$stmt->bindValue('username',$_GET['username']);
	$stmt->execute();
	$account = $stmt->fetch(PDO::FETCH_OBJ);
 ?>
<form method="post" action="">
	<fieldset>Acount Information</fieldset>
	<table cellpadding="2" cellspacing="2">
		<tr>
			<td>Username</td>
			<td><?php echo $account->username; ?>
				<input type="hidden" name="username" value="<?php echo $account->username; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text" name="password"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo $account->name; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" value="<?php echo $account->email; ?>"></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
	</table>
</form>
<?php 



 ?>