<?php 

require_once "CarModel.php";
require_once "CarType.php";

$car = CarModel::getAll();
// $car = CarType::getAll();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<title>title</title>
</head>
<body>
	<header>
		<div class="nav">
			<a href="index.php">POCETNA</a> |
			<a href="Add.php">ADD CAR MARK</a> |
			<a href="cartypes/index.php">VIEW CAR MODEL</a> <hr>
		</div>
	</header>

	<table border="1">

	<?php	foreach ($car as $kay => $value) { ?>

		<tr>
				<td> <a href=""><?php echo $value->getId();?></a></td>
				<td> <a href="profilCar.php?id=<?=$value->getId()?>"><?php echo $value->getIme();?></a></td>
				<td> <a href=""><?php echo $value->getRegistracija();?></a></td>
				<td> <a href=""><?php echo $value->getGodina();?></a></td>
				<td> <a href=""><?php echo $value->gettest();?></a></td>
				<td> <a href=""><?php echo $value->getid_cartype();?></a></td>
				<td> <a href="edit.php?id=<?=$value->getId()?>">Edit</a></td>
				<td> <a href="delete.php?id=<?=$value->getId()?>">Delete</a></td>
		</tr>

	<?php	} ?>

</table>


</body>
</html>




<?php

 ?>