<?php
include_once('dbcon.php');

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_psset` WHERE `service_id`='".$_GET['del_id']."'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Unable to delete! This particular is being used for allotment")</script>';
			require("ServiceFundOperationView.php");
		}

		else{
$select = "DELETE FROM finance_fundoperation_ps WHERE `service_id`='".$_GET['del_id']."'";
$query = mysqli_query($con, $select);
if($con->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "ServiceFundOperationView.php"</script>';
}
}
?>	