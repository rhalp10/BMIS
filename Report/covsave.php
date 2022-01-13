<?php

$brgy=$_SESSION['barangay'];
$total=$_SESSION['covtotal'];
$period=$_SESSION['covperiod'];
$cap=$_SESSION['captain'];
$d = date('Y-m-d H:i:s');
 	include('dbcon.php');
$ins_query="INSERT into `report_cov` (`num_of_complain`, `name_barangay`, `period`, `date_save`, `barangay_captain`) values ('$total','$brgy','$period','$d','$cap')";
				if ($con->query($ins_query) === TRUE) 
				{
					echo '<script> alert("Saved");</script>';	
					echo '<script> window.location = "view.php?id=14"</script>';			
				}
				
				
				
?>