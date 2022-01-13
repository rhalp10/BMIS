<?php
session_start();
$m = $_POST['m'];
$y = $_POST['y'];
$n = $_POST['n'];
$brgy=$_SESSION['barangay'];
$com=$_SESSION['committee'];
$pos=$_SESSION['position'];
$d = date('Y-m-d H:i:s');

	include('dbcon.php');
$ins_query="INSERT into `report_accomplishsment` (`name_barangay`, `date_save`, `month`, `year`, `narrative`, `committee`, `position`) values ('$brgy','$d','$m','$y','$n','$com','$pos')";
				if ($con->query($ins_query) === TRUE) 
				{
					echo 'Successfully Saved!';
				}
				else{
					echo 'ERROR IN SAVING FILE!';
				}

 	
				
				
				
?>