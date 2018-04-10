	<?php
session_start();
$id = $_POST['service_id'];
$sp = $_POST['service_position'];
$ma = $_POST['service_amount'];
$my = $_POST['service_year'];



 	include('dbcon.php');
// Check connection

 	$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_psset` WHERE `service_id` = '$id' AND `service_position` = '$sp' AND `service_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("ServiceFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_psset (service_id,service_position,service_amount,service_year) VALUES ('$id','$sp','$ma','$my')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "ServiceFundOperationSet.php"</script>';			
				}
		}



?>