<?php 

require_once "CarModel.php";

// $car = new CarModel();
// $car->setIme("Opeqweqwel");
// $car->setRegistracija("PP21qweqwe4EW");
// $car->setGodina("201qweqwe4");
// $car->save();


$car = CarModel::getAll();

		// if (isset($_GET['del'])) {
		// 	 CarModel::deleteByID($_GET['del']);
		// }else{

		// }
?>
<table border="1">

<?php	foreach ($car as $kay => $value) { ?>

		<tr>
				<td> <a href=""><?php echo $value->getId();?></a></td>
				<td> <a href="index.php?id=<?=$value->getId()?>"><?php echo $value->getIme();?></a></td>
				<td> <a href=""><?php echo $value->getRegistracija();?></a></td>
				<td> <a href=""><?php echo $value->getGodina();?></a></td>
				<td> <a href="edit.php?id=<?=$value->getId()?>">Edit</a></td>
				<td> <a href="delete.php?id=<?=$value->getId()?>">Delete</a></td>
		</tr>

<?php	} ?>

</table>
 <a href="Add.php">add</a>

<?php

// $car = CarModel::deleteByID(3);

// echo $car;
 ?>