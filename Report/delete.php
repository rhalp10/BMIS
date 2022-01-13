<?php
session_start();
$id = $_GET['id'];
$iid=$_SESSION['reportID'];
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'bmis_db');
if($_SESSION['reportID']==2){
	$sql = "DELETE FROM report_accomplishsment WHERE accom_ID = '$id'";
}

if($_SESSION['reportID']==14){
	$sql = "DELETE FROM report_cov WHERE cov_ID = '$id'";
}
if($_SESSION['reportID']==12){
	$sql = "DELETE FROM report_attendancemonitoring WHERE attendancemonitoring_id = '$id'";
}
if($_SESSION['reportID']==7){
	$sql = "DELETE FROM ref_manilabay  WHERE mb_ID = '$id'";
}

if(mysqli_query($db,$sql)){
echo '<script>alert("Successfully deleted!");</script>';
    echo '<script>window.location = "view.php?id='.$iid.'";</script>';
}
   
else{
    
     echo "Not deleted";
}
   

?>