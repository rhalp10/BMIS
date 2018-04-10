<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['noe_id'];
	$mc = $_POST['noe_code'];
	$mt = $_POST['noe_type'];



        $sql = "UPDATE `finance_fundoperation_noe` SET `noe_code` = '$mc', `noe_type` = '$mt'  WHERE `noe_id` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = NOEFundOperationView.php"</script>';			
				}
?>