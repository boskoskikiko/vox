<?php 

require_once 'CarModel.php';

 if (isset($_POST['save'])) {
			$car = new CarModel();
			$car->setIme($_POST['ime']);
			$car->setRegistracija($_POST['registracija']);
			$car->setGodina($_POST['godina']);
			$car->save();
			header("Location:index.php");
 }
 ?>

 <form method="post" action="">
	<fieldset>Dodadi</fieldset>
	<table cellpadding="2" cellspacing="2">

		<tr>
			<td>Ime</td>
				<td><input type="text" name="ime"></td>
		</tr>
		<tr>
			<td>Registracija</td>
			<td><input type="text" name="registracija"></td>
		</tr>
		<tr>
			<td>Godini</td>
			<td><input type="text" name="godina"></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
		
	</table>
</form>



