	<?php
session_start();
 	include('dbcon.php');

$id = $_POST['service_id'];
$sp = mysqli_real_escape_string($db, $_POST['service_position']);
$sp = ucwords(strtolower($sp));

$ma = $_POST['service_amount'];
		$ma = str_replace(',', '', $ma);

$my = $_POST['service_year'];



 	include('dbcon.php');
// Check connection
 	if($ma != 0){

 	$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_psset` WHERE `service_id` = '$id' AND `service_position` = '$sp' AND `service_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!")</script>';
			require("ServiceFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_psset (service_id,service_position,service_amount,service_year) VALUES ('$id','$sp','$ma','$my')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "ServiceFundOperationSet.php"</script>';			
				}
		}

}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
					echo '<script> window.location = "ServiceFundOperationSet.php"</script>';			

}


?>