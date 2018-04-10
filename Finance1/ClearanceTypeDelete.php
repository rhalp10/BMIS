<?php
include('dbcon.php');

$query = "DELETE FROM finance_clearance_list WHERE `clearance_id`='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: ViewClearanceList.php"); 
?>	