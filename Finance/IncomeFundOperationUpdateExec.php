<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['income_id'];
	$mc = $_POST['income_code'];
	$mt = mysqli_real_escape_string($db, $_POST['income_type']);
$mt = ucwords(strtolower($mt));




        $sql = "UPDATE `finance_fundoperation_income` SET `income_code` = '$mc', `income_type` = '$mt'  WHERE `income_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "IncomeFundOperationView.php"</script>';			
				}
?>
