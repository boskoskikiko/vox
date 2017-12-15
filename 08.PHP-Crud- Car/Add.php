<?php 

require_once 'CarModel.php';
require_once 'CarType.php';

 if (isset($_POST['save'])) {
			$car = new CarModel();
			$carType = new CarType();
			$car->setIme($_POST['ime']);
			$car->setRegistracija($_POST['registracija']);
			$car->setGodina($_POST['godina']);
			$car->setTest($_POST['test']);
			// $car->setid_cartype($_POST['idcartype']);
			// $carType->setName($_POST['name']);
			// var_dump($car);die();
			$car->save();
			header("Location:index.php");
			
 }
 ?>

 <form method="post" action="">
	<fieldset>Add Car Mark</fieldset>
	<table cellpadding="2" cellspacing="2">

		<tr>
			<td>Name Mark</td>
				<td><input type="text" name="ime"></td>
		</tr>
		<tr>
			<td>From</td>
			<td><input type="text" name="registracija"></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="godina"></td>
		</tr>
	<!-- 	<tr>
			<td>test</td>
			<td><input type="text" name="test"></td>
		</tr> -->
		<tr>
			<td>Car Type</td>
			<td>
				<select name="test">
				    <option selected="selected">select</option>
				    <?php $carType = CarType::getAll(); ?>
					<?php foreach ($carType as $key => $type):?>
						<option value="<?php echo $type->getName(); ?>"><?php echo $type->getName();?></option>
					<?php endforeach;?>
	   			</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
		
	</table>
</form>



