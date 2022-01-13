<?php
session_start();
 	include("dbcon.php");
$coldate = $_POST['col1'];
$colpart = mysqli_real_escape_string($db, $_POST['col2']);
$colpart = ucwords(strtolower($colpart));

$colamt = $_POST['col3'];
$colamt = str_replace(',', '', $colamt);

$dis = substr($coldate, 0, -3);

if($colamt != 0){

$chk = mysqli_query($db, "SELECT * FROM finance_disbursement WHERE `dis`='$dis' AND `disbursement_particular`='$colpart'");
	if(mysqli_num_rows($chk) > 0){
		echo'<script>alert("Data has already been added in the month")</script>';
		require("Disbursement.php");
	}

	else{
	$sql="INSERT INTO finance_disbursement (`disbursement_date`, `disbursement_particular`, `disbursement_amount`, `dis`) values ('$coldate','$colpart','$colamt', '$dis')";
			if($db->query($sql) === TRUE)
			{
				echo '<script>alert("Data Saved")</script>';
				echo '<script>window.location = "Disbursement.php"</script>';
			}
	}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("Disbursement.php");
}
?>