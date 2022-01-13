<?php
session_start();
 	include("dbcon.php");
$coldate = $_POST['col1'];
$colpart = mysqli_real_escape_string($db, $_POST['col2']);
$colpart = ucwords(strtolower($colpart));

$colamt = $_POST['col3'];
$colamt = str_replace(',', '', $colamt);

$col = substr($coldate, 0, -3);

if($colamt != 0){

$chk = mysqli_query($db, "SELECT * FROM finance_collection WHERE `col` = '$col' AND `collection_particular`='$colpart'");
	if(mysqli_num_rows($chk) > 0){
		echo'<script>alert("Data has already been added in the month")</script>';
		require("Collection.php");
	}

	else{
		$sql="INSERT into finance_collection (`collection_date`, `collection_particular`, `collection_amount`, `col`) values ('$coldate','$colpart','$colamt', '$col')";
			if($db->query($sql) === TRUE)
			{
				echo '<script>alert("Data Saved")</script>';
				echo '<script>window.location = "Collection.php"</script>';
			}
	}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("Collection.php");
}
?>