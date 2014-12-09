<?php
	$db_username = 'root';
	$db_password = 'password';
	$db_name = 'shoemart';
	$db_host = 'localhost';
	$conn = new mysqli($db_host, $db_username, $db_password,$db_name) or die("Error in connecting to the database" . mysqli_error($db));
?>
