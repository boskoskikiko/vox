<?php 
$dbcrud = mysqli_connect("localhost","root","",NULL);
$dbselect = mysqli_select_db($dbcrud,"insertupdatedelete");
if (!$dbcrud)
{
	echo "DB connection error...";
}
if (!$dbselect) 
{
	echo "DB selection error...";
}

 ?>