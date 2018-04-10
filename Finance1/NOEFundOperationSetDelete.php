<?php
include('dbcon.php');
$query = "DELETE FROM finance_fundoperation_noeset WHERE noe_setid='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: NOEFundOperationSetView.php"); 
?>		