<?php 
    require_once('db.php');
    $id = $_GET['id'];

    mysqli_query($db, "DELETE FROM `brgy_official_detail` WHERE res_ID = '$id'") OR die(mysqli_error($db));
    header('Location: index.php');
?>