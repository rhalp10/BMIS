<?php
	include("dbcon.php");
	$id= $_POST['disbursement_id'];
	$dd = $_POST['disbursement_date'];
	$dp = mysqli_real_escape_string($db, $_POST['disbursement_particular']);
	$dp = ucwords(strtolower($dp));

	$da = $_POST['disbursement_amount'];
$da = str_replace(',', '', $da);

$dis = substr($dd, 0, -3);

if($da != 0){


		$sql = "UPDATE `finance_disbursement` SET `disbursement_id` = '$id',`disbursement_date` = '$dd',`disbursement_particular` = '$dp',`disbursement_amount` = '$da'  WHERE `disbursement_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "DisbursementView.php"</script>';			
				}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("DisbursementView.php");
}

?>
