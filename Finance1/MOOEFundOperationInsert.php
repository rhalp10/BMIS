	<?php
session_start();
$mc = $_POST['mooe_code'];
$mt = $_POST['mooe_type'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_mooe` WHERE `mooe_code` = '$mc' OR `mooe_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!");</script>';
			require("MOOEFundOperation.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_mooe (mooe_code,mooe_type) VALUES ('$mc','$mt')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "MOOEFundOperation.php"</script>';			
				}
		}
	


?>