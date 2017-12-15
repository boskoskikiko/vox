<?php 

require_once '../CarType.php';

		if (isset($_POST["id"])) {

			$car = CarType::getById($_GET['id']);
			$car->setName($_POST['name']);
			$car->setPower($_POST['power']);
			$car->setImage($_POST['image']);
			$car->save();
		}else{
			$car = CarType::getById($_GET['id']);
		}
 ?>

 <form method="post" action="">
	<fieldset>ProfilCar</fieldset>
	<table cellpadding="2" cellspacing="2">
		<?php	//foreach ($car as $kay => $value) { ?>
		<tr>
			<td>Name</td>
			<td> <a href=""><?php echo $car->getName();?></a></td>
		</tr>
		<tr>
			<td>Power</td>
			<td> <a href=""><?php echo $car->getPower();?></a></td>
		</tr>
		<tr>
			<td>Image</td>
			<?php 
			$link = "http://$_SERVER[HTTP_HOST]";
			echo '<img class="center-block img-thumbnail" src="'.$link.'/'.$car->getImage().'">'; 
			?>
		</tr>
		
	</table>
</form>
