<?php
session_start();
$id = $_GET['id'];
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'bmis_db');

$sql = "DELETE FROM report_data WHERE reportdata_id = '$id'";
if(mysqli_query($connect,$sql)){

     header("location: viewreport.php");
}
   
else{
    
     echo "Not deleted";
}
   

?>