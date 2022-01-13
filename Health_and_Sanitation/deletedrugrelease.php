<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM inventory_drugs_release WHERE drgrelease_ID=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
header("Location: viewdrugrelease.php"); 
?>