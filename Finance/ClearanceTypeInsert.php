<?php
session_start();
 	include("dbcon.php");
$clearance = $_POST['Clearance'];

	$chk = mysqli_query($con, "SELECT * FROM `finance_clearance_list` WHERE `clearance_form` = '$clearance'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("CLEARANCE ALREADY EXISTS!");</script>';
			require("ClearanceType.php");
		}


				$ins_query="INSERT into `finance_clearance_list` (`clearance_form`) values ('$clearance')";
				if ($con->query($ins_query) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "ClearanceType.php"</script>';			
				}

?>