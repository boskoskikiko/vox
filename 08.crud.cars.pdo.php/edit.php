<?php 

require_once 'CarModel.php';

		if (isset($_POST['save'])) {

			$car = CarModel::getById($_GET['id']);
			$car->setIme($_POST['ime']);
			$car->setRegistracija($_POST['registracija']);
			$car->setGodina($_POST['godina']);
			$car->save();

			header('Location:index.php');
		}else{
			$car = CarModel::getById($_GET['id']);
		}
 ?>

 <form method="post" action="">
	<fieldset>Editiraj</fieldset>
	<table cellpadding="2" cellspacing="2">
		<?php	//foreach ($car as $kay => $value) { ?>
		<tr>
			<td>Ime</td>
			<td>
				<input type="text" name="ime" value="<?php echo $car->getIme();?>">
			</td>
		</tr>
		<tr>
			<td>Registracija</td>
			<td><input type="text" name="registracija" value="<?php echo $car->getRegistracija();?>"></td>
		</tr>
		<tr>
			<td>Godini</td>
			<td><input type="text" name="godina" value="<?php echo $car->getGodina();?>"></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
		
	</table>
</form>
