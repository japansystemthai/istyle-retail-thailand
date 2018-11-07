<?php
	$conn= mysqli_connect("localhost","root","","project_HBA") or die("Error: " . mysqli_error($conn));
	mysqli_query($conn, "SET NAMES 'utf8' "); 
	
?>