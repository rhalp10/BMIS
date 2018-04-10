<?php
session_start();
	include("dbcon.php");
		
    $ieto= $_POST['iiid'];
	$cp = $_POST['purpose'];
	$p = $_POST['price'];


        $sql = "UPDATE `finance_clearance_set` SET `purpose` = '$cp', `price` = '$p'  WHERE `purpose_id` = '$ieto'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ViewClearancePurposeAmount.php"</script>';			
				}
?>
