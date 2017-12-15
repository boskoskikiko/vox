<?php 

require_once "../CarType.php";



$car = CarType::getAll();

?>
	<a href="../index.php">POCETNA</a> |
	<a href="../Add.php">ADD CAR MARK</a> |
	<a href="index.php">VIEW CAR MODEL</a> |
	<a href="add.php">ADD CAR MODEL</a> <hr>

<table border="1">

<?php	foreach ($car as $kay => $value) { ?>

		<tr>
				<td> <a href=""><?php echo $value->getId();?></a></td>
				<td> <a href="profileCarType.php?id=<?=$value->getId()?>"><?php echo $value->getName();?></a></td>
				<td> <a href=""><?php echo $value->getPower();?></a></td>
				
				<td> <a href="edit.php?id=<?=$value->getId()?>">Edit</a></td>
				<td> <a href="delete.php?id=<?=$value->getId()?>">Delete</a></td>
		</tr>

<?php	} ?>

</table>


<?php

 ?>
