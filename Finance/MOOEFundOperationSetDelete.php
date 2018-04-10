<?php
include('dbcon.php');
$query = "DELETE FROM finance_fundoperation_mooeset WHERE mooe_setid='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: MOOEFundOperationSetView.php"); 
?>		