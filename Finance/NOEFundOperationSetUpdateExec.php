<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['noe_id'];
	$mc = $_POST['noe_amount'];
	$mt = $_POST['noe_year'];




        $sql = "UPDATE `finance_fundoperation_noeset` SET `noe_amount` = '$mc', `noe_year` = '$mt'  WHERE `noe_setid` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = " NOEFundOperationSetView.php"</script>';			
				}
?>

