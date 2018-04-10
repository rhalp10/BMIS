<?php
include('dbcon.php');
$query = "DELETE FROM finance_fundoperation_ps WHERE service_id='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: ServiceFundOperationView.php"); 
?>		