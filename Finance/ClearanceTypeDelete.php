<?php
include_once('dbcon.php');

$delid=$_GET['del_id'];

if($delid>10){

$select = "DELETE FROM finance_clearance_list WHERE `clearance_id`='$delid'";
$query = mysqli_query($db, $select);
if($db->query($select) === TRUE){
	echo "<script>alert('Data Deleted.');</script>";
	echo'<script> window.location = "ViewClearanceList.php"</script>';
}
}
else{
		echo "<script>alert('Default data cannot be deleted.');</script>";
	echo'<script> window.location = "ViewClearanceList.php"</script>';

}

?>	