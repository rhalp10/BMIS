<?php
 if (!isset($_SESSION['position_id']))
 {	

	echo '<script>alert("YOU MUST BE LOGGED IN");</script>';
	echo '<script>window.location = "../index.php";</script>';
	die(); 	
 }

 else
 {

 }

	
 	
?>