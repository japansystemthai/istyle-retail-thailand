<?php
	$conn= mysqli_connect("localhost","root","MySQL@JP75b","project_HBA") or die("Error: " . mysqli_error($conn));
	mysqli_query($conn, "SET NAMES 'utf8' "); 
	
?>