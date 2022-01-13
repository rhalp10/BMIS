<?php


require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM youth_investment WHERE youth_id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
header("Location: viewsk.php"); 
?>
