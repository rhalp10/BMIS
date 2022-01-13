<?php
include_once('dbcon.php');


$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_incomeset` WHERE `income_id`='".$_GET['del_id']."'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Unable to delete! This particular is being used for allotment")</script>';
			require("IncomeFundOperationView.php");
		}

		else{

$select = "DELETE FROM finance_fundoperation_income WHERE `income_id`='".$_GET['del_id']."'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "IncomeFundOperationView.php"</script>';
}
}
?>	