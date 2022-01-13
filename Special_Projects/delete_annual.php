<?php


require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM annual_project WHERE project_id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
header("Location: viewbrgy.php"); 
?>
