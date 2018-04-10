<?php
session_start();
   
     
$_SESSION['positionID'] = $_POST['name'];
 header("location: viewreport.php");
?>
