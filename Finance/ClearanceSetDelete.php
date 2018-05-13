<?php
include_once('dbcon.php');

$select = "DELETE FROM finance_clearance_set WHERE `purpose_id`='".$_GET['del_id']."'";
$query = mysqli_query($con, $select);
if($con->query($select) === TRUE){
	echo "<script>alert('Data Deleted Successfully.');</script>";
	echo'<script> window.location = "ViewClearancePurposeAmount.php"</script>';
}
?>	