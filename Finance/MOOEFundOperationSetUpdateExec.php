<?php
session_start();
	include("dbcon.php");
	$id = $_POST['id'];
	$ma = $_POST['mooe_amount'];
	$my= $_POST['mooe_year'];



        $sql = "UPDATE `finance_fundoperation_mooeset` SET `mooe_amount` = '$ma', `mooe_year` = '$my' WHERE `mooe_setid` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "MOOEFundOperationSetView.php"</script>';			
				}
?>