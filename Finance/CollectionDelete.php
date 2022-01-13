<?php
include_once('dbcon.php');

$select = "DELETE FROM finance_collection WHERE `collection_id`='".$_GET['del_id']."'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "Collectionview.php"</script>';
}
?>	