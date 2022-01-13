<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['mooe_id'];
	$mc = $_POST['mooe_code'];
	$mt = mysqli_real_escape_string($db, $_POST['mooe_type']);
$mt = ucwords(strtolower($mt));



        $sql = "UPDATE `finance_fundoperation_mooe` SET `mooe_code` = '$mc', `mooe_type` = '$mt'  WHERE `mooe_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "MOOEFundOperationView.php"</script>';			
				}
?>
