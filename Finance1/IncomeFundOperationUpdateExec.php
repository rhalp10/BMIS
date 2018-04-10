<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['income_id'];
	$mc = $_POST['income_code'];
	$mt = $_POST['income_type'];




        $sql = "UPDATE `finance_fundoperation_income` SET `income_code` = '$mc', `income_type` = '$mt'  WHERE `income_id` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "IncomeFundOperationView.php"</script>';			
				}
?>
