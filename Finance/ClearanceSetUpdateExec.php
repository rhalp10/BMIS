<?php
session_start();
	include("dbcon.php");
		
    $ieto= $_POST['iiid'];
	$cp = mysqli_real_escape_string($con, $_POST['purpose']);
	$cp = ucwords(strtolower($cp));

	$p = $_POST['price'];
$p = str_replace(',', '', $p);


        $sql = "UPDATE `finance_clearance_set` SET `purpose` = '$cp', `price` = '$p'  WHERE `purpose_id` = '$ieto'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ViewClearancePurposeAmount.php"</script>';			
				}
?>
