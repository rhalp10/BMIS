<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM inventory_drugs WHERE drug_ID=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>