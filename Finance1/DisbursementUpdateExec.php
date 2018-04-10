<?php
	include("dbcon.php");
	$id= $_POST['disbursement_id'];
	$dd = $_POST['disbursement_date'];
	$dp = $_POST['disbursement_particular'];
	$da = $_POST['disbursement_amount'];
	
	$chk = mysqli_query($con,"SELECT * FROM `finance_disbursement` WHERE disbursement_id` = '$id'");
						
	if(mysqli_num_rows($chk) < 0 )
	{
		header("location: Disbursement.php");
	}
	else
	{
		$sql = "UPDATE `finance_disbursement` SET `disbursement_id` = '$id',`disbursement_date` = '$dd',`disbursement_particular` = '$dp',`disbursement_amount` = '$da'  WHERE `disbursement_id` = '$id'";
		 mysqli_query($con, $sql) or die(mysql_errno());

		 header("location: Disbursement.php");

	}
?>