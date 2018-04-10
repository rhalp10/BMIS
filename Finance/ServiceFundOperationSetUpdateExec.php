<?php
session_start();
	include("dbcon.php");
	$id = $_POST['service_id'];
	$sp = $_POST['service_position'];
	$ma = $_POST['service_amount'];
	$my= $_POST['service_year'];


        $sql = "UPDATE `finance_fundoperation_psset` SET `service_position` = '$sp', `service_amount` = '$ma', `service_year` = '$my'  WHERE `service_setid` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ServiceFundOperationSetView.php"</script>';			
				}
?>

