	<?php
 	include('dbcon.php');

$mc = $_POST['service_code'];
$mt = mysqli_real_escape_string($db, $_POST['service_type']);
$mt = ucwords(strtolower($mt));



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_ps` WHERE `service_code` = '$mc' OR `service_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!")</script>';
			require("ServiceFundOperation.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_ps (service_code,service_type) VALUES ('$mc','$mt')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "ServiceFundOperation.php"</script>';			
				}
		}


?>