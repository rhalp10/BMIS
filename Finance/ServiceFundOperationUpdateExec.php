<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['service_id'];
	$mc = $_POST['service_code'];
	$mt = mysqli_real_escape_string($db, $_POST['service_type']);
$mt = ucwords(strtolower($mt));



        $sql = "UPDATE `finance_fundoperation_ps` SET `service_code` = '$mc', `service_type` = '$mt'  WHERE `service_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ServiceFundOperationView.php"</script>';			
				}
?>
