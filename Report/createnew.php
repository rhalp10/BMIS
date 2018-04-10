<?php
session_start();
$report= $_GET['id'];

if($report == 2){
    
    header("location: accomplishmentUI.php");
    
}

if($report == 12){
    
    header("location: attendancemonitoringUI.php");
}

if($report == 14){
    
    header("location: cvalid.php");
}
if($report == 11){
    
    header("location: avawcui.php");
}

if($report == 7){
    
    header("location: MBCRPUI.php");
}

if($report == 13){
    
    header("location: lupontagapamayapaUI.php");
}

if($report == 3){
    
    header("location: lgucomplianceUI.php");
}

?>
Z