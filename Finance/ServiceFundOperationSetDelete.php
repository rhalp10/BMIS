<?php
include_once('dbcon.php');

$dy=date('Y');
$d=$dy+1;


$date = mysqli_query($db, "SELECT service_year, service_setid FROM finance_fundoperation_psset WHERE `service_year` = $d AND `service_setid`='".$_GET['del_id']."'");
if(mysqli_num_rows($date) > 0 ){

$select = "DELETE FROM finance_fundoperation_psset WHERE `service_setid`='".$_GET['del_id']."'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "ServiceFundOperationSetView.php"</script>';
}
}
else{
		echo "<script>alert('Record cannot be deleted');</script>";
	echo'<script> window.location = "ServiceFundOperationSetView.php"</script>';
}
?>	