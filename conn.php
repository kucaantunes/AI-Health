<?php
	$conn = mysqli_connect("localhost", "root", "", "vel");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>