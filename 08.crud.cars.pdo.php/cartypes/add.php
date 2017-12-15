<?php 

require_once '../CarType.php';

 if (isset($_POST['save'])) {
 	
			$car = new CarType();
			$car->setName($_POST['name']);
			$car->setPower($_POST['power']);

			// $target = "images/".basename($_FILES['image']['name']);

			$car->setImage($_FILES['image']['name']);

			// if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){

			// }else{

			// }




			$car->save();
			header("Location:index.php");
 }
 ?>

 <form method="post" action="">
	<fieldset>Dodadi</fieldset>
	<table cellpadding="2" cellspacing="2">

		<tr>
			<td>Name</td>
				<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Power</td>
			<td><input type="text" name="power"></td>
		</tr>
		<tr>
			<td><label for="Image">Image:</label></td>
	 		<td><input type="file" name="image" value="10000"></td>
   		 </tr>
		<tr>
		<tr>
			<td>&nbsp</td>
			<td><input type="submit" name="save" value="Save"></td>
		</tr>
		
	</table>
</form>



