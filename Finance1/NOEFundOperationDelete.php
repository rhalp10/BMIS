<?php
include('dbcon.php');
$query = "DELETE FROM finance_fundoperation_noe WHERE noe_id='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: NOEFundOperationView.php"); 
?>		