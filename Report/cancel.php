<?php 
include('dbcon.php');
$sql = "delete from report_attendance where attendance_id=0";
if(mysqli_query($db,$sql)){
    echo  "<script>alert('Cancelled!');</script>";
    echo  "<script>window.location = 'viewreport.php';</script>";
}

?>