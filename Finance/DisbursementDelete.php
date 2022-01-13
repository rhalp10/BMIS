<?php
include_once('dbcon.php');

$select = "DELETE FROM finance_disbursement WHERE `disbursement_id`='".$_GET['del_id']."'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "DisbursementView.php"</script>';
}
?>	