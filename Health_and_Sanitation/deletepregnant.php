<?php


require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM resident_pregnant WHERE preg_ID=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: viewpregnant.php"); 
?>