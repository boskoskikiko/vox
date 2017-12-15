<?php 

require_once '../CarType.php';

		if (isset($_POST['save'])) {

			$car = CarType::getById($_GET['id']);
			$car->setName($_POST['name']);
			$car->setPower($_POST['power']);
			$car->save();

			header('Location:index.php');
		}else{
			$car = CarType::getById($_GET['id']);
		}
 ?>

 <form method="post" action="">
	<fieldset>Editiraj</fieldset>
	<table cellpadding="2" cellspacing="2">
		<?php	//foreach ($car as $kay => $value) { ?>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" name="name" value="<?php echo $car->getName();?>">
			</td>
		</tr>
		<tr>
			<td>Power</td>
			<td><input type="text" name="power" value="<?php echo $car->getPower();?>"></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
		
	</table>
</form>
