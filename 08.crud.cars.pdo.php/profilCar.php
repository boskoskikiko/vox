<?php 

require_once 'CarModel.php';
require_once 'CarType.php';

		if (isset($_POST["id"])) {

			// $car = CarModel::getById($_GET['id']);
			// $car->setIme($_POST['ime']);
			// $car->setRegistracija($_POST['registracija']);
			// $car->setGodina($_POST['godina']);
			// $car->save();
		}else{
			$car = CarModel::getById($_GET['id']);
		}
 ?>

 <form method="post" action="">
	<fieldset>ProfilCar</fieldset>
	<table cellpadding="2" cellspacing="2">
		<?php	//foreach ($car as $kay => $value) { ?>
		<tr>
			<td>Ime</td>
			<td> <a href=""><?php echo $car->getIme();?></a></td>
		</tr>
		<tr>
			<td>Od</td>
			<td> <a href=""><?php echo $car->getRegistracija();?></a></td>
		</tr>
		<tr>
			<td>Grad</td>
			<td> <a href=""><?php echo $car->getGodina();?></a></td>
		</tr>
		<tr>
			<td>Tip</td>
			<td> <a href=""><?php echo $car->gettest();?></a></td>
		</tr>
		
	</table>
</form>
