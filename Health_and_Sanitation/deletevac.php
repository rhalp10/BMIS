<?php

require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM resident_vaccinated WHERE vac_ID=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
header("Location: viewvac.php"); 
?>