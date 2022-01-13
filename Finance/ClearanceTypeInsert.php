<?php
 	include("dbcon.php");
$clearance = mysqli_real_escape_string($db, $_POST['Clearance']);
$clearance = ucwords(strtolower($clearance));


	$chk = mysqli_query($db, "SELECT * FROM `finance_clearance_list` WHERE `clearance_form` = '$clearance'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Clearance Already Exists!");</script>';
			require("ClearanceType.php");
		}


				$ins_query="INSERT into `finance_clearance_list` (`clearance_form`) values ('$clearance')";
				if ($db->query($ins_query) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "ClearanceType.php"</script>';			
				}

?>