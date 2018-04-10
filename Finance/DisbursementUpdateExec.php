<?php
	include("dbcon.php");
	$id= $_POST['disbursement_id'];
	$dd = $_POST['disbursement_date'];
	$dp = $_POST['disbursement_particular'];
	$da = $_POST['disbursement_amount'];


		$sql = "UPDATE `finance_disbursement` SET `disbursement_id` = '$id',`disbursement_date` = '$dd',`disbursement_particular` = '$dp',`disbursement_amount` = '$da'  WHERE `disbursement_id` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "Disbursement.php"</script>';			
				}
?>
