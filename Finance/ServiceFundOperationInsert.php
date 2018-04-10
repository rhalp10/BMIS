	<?php
session_start();
$mc = $_POST['service_code'];
$mt = $_POST['service_type'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_ps` WHERE `service_code` = '$mc' OR `service_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("ServiceFundOperation.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_ps (service_code,service_type) VALUES ('$mc','$mt')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "ServiceFundOperation.php"</script>';			
				}
		}


?>