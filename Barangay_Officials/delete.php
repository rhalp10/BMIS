<?php 
    require_once('db.php');
    $id = $_GET['id'];

    mysqli_query($con, "DELETE FROM `brgy_official_detail` WHERE res_ID = '$id'") OR die(mysqli_error($con));
    header('Location: index.php');
?>