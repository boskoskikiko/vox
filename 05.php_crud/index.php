<?php include 'db.php'; 
if (isset($_POST['bt-insert'])) 
{


$dbcrud = mysqli_connect("localhost","root","","insertupdatedelete");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$hobby = implode(",",$_POST['hobby']);//here hobby is array so we need to insert as array
	$country=$_POST['country'];

 $inserQ = "INSERT INTO t1( name, email, gender, address, hobby, country) VALUES ('$name','$email','$gender','$hobby','$country')";
	// $inserQ = "INSERT INTO t1 (name, email, gender, address, hobby, country) 
	// 			VALUES ('$name','$email','$gender','$hobby','$country')";


	$insert = mysqli_query($dbcrud,$inserQ);


// var_dump($insert);
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>php_crud1</title>
</head>
<body>
<center>
	<h2>Insert</h2>
	<form method="post">
		<table>
			<tr><td>Name</td><td><input type="text" name="name"></td></tr>
			<tr><td>Email</td><td><input type="email" name="email"></td></tr>
			<tr><td>Gender</td><td><input type="radio" name="gender" value="male">Male
								   <input type="radio" name="gender" value="female">Female
						   </td></tr>
			<tr><td>Address</td><td><textarea name="address"></textarea></td></tr>
			<tr><td>Hobbi</td><td><input type="checkbox" name="hobby[]" value="music">Music
								 <input type="checkbox" name="hobby[]" value="movies">Movies
								 <input type="checkbox" name="hobby[]" value="games">Games
								 <input type="checkbox" name="hobby[]" value="travel">Travel
						</td></tr>
			<tr><td>Coundry</td><td><select name="country">
										<option value="indtia">India</option>
										<option value="Australia">Australia</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Macedonia">Macedonia</option>
									</select>
							</td></tr>

		</table>
				<input type="submit" name="bt-insert" value="insert">
	</form>
</center>
</body>
</html>