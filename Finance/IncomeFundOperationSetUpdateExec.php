<?php
session_start();
	include("dbcon.php");
	$id = $_POST['id'];
	$ma = $_POST['income_amount'];
	$my= $_POST['income_year'];


        $sql = "UPDATE `finance_fundoperation_incomeset` SET `income_amount` = '$ma', `income_year` = '$my' WHERE `income_setid` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "IncomeFundOperationSetView.php"</script>';			
				}
?>
