<?php


require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM youth_investment WHERE youth_id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: viewsk.php"); 
?>
