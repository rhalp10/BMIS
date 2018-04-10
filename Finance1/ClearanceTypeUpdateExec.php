<?php
	include("dbcon.php");
	$id= $_POST['clearance_id'];
	$cf = $_POST['clearance_form'];




	$chk = mysqli_query($con, "SELECT * FROM `finance_clearance_list` WHERE `clearance_form` = '$cf'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("CLEARANCE ALREADY EXISTS!");</script>';
			require("ClearanceType.php");
		}


				$ins_query="INSERT into `finance_clearance_list` (`clearance_form`) values ('$cf')";
				if ($con->query($ins_query) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "ClearanceType.php"</script>';			
				}
