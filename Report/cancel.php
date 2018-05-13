<?php 
$con = mysqli_connect("localhost","root","","bmis_db");
$sql = "delete from report_attendance where attendance_id=0";
if(mysqli_query($con,$sql)){
echo  "<script>alert('Cancelled!');</script>";
 echo  "<script>window.location = 'viewreport.php';</script>";
}

?>