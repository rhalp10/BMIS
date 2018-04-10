<?php
session_start();
 	include("dbcon.php");
$coldate = $_POST['col1'];
$colpart = $_POST['col2'];
$colamt = $_POST['col3'];

$col = substr($coldate, 0, -3);

if($colamt != 0){

$chk = mysqli_query($con, "SELECT * FROM finance_collection WHERE `col` = '$col' AND `collection_particular`='$colpart'");
	if(mysqli_num_rows($chk) > 0){
		echo'<script>alert("DATA HAS ALREADY BEEN ADDED IN THE MONTH")</script>';
		require("Collection.php");
	}

	else{
		$sql="INSERT into finance_collection (`collection_date`, `collection_particular`, `collection_amount`, `col`) values ('$coldate','$colpart','$colamt', '$col')";
			if($con->query($sql) === TRUE)
			{
				echo '<script>alert("Saved")</script>';
				echo '<script>window.location = "Collection.php"</script>';
			}
	}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("Collection.php");
}
?>