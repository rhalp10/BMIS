<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['noe_id'];
	$mc = $_POST['noe_code'];
	$mt = mysqli_real_escape_string($db, $_POST['noe_type']);
$mt = ucwords(strtolower($mt));


        $sql = "UPDATE `finance_fundoperation_noe` SET `noe_code` = '$mc', `noe_type` = '$mt'  WHERE `noe_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "NOEFundOperationView.php"</script>';			
				}

?>