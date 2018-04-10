<?php
include('dbcon.php');

$query = "DELETE FROM finance_clearance_set WHERE `purpose_id`='".$_GET["id"]."'";
mysqli_query($con,$query)  or die(mysql_errno());
header("Location:  ViewClearancePurposeAmount.php"); 
?>

