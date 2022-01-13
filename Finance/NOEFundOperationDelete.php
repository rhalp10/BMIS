<?php
include_once('dbcon.php');

$delid=$_GET['del_id'];

if($delid>5){

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_noeset` WHERE `noe_id`='$delid'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Unable to delete! This particular is being used for allotment")</script>';
			require("NOEFundOperationView.php");
		}

		else{
$select = "DELETE FROM finance_fundoperation_noe WHERE `noe_id`='".$_GET['del_id']."'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "NOEFundOperationView.php"</script>';
}
}
}
else{
		echo "<script>alert('Default data cannot be deleted.');</script>";
	echo'<script> window.location = "NOEFundOperationView.php"</script>';

}

?>	