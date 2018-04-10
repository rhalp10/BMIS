<?php
session_start();
 	include("dbcon.php");
$coldate = $_POST['col1'];
$colpart = $_POST['col2'];
$colamt = $_POST['col3'];

$dis = substr($coldate, 0, -3);

if($colamt != 0){

$chk = mysqli_query($con, "SELECT * FROM finance_disbursement WHERE `dis`='$dis' AND `disbursement_particular`='$colpart'");
	if(mysqli_num_rows($chk) > 0){
		echo'<script>alert("DATA HAS ALREADY BEEN ADDED IN THE MONTH")</script>';
		require("Disbursement.php");
	}

	else{
	$sql="INSERT INTO finance_disbursement (`disbursement_date`, `disbursement_particular`, `disbursement_amount`, `dis`) values ('$coldate','$colpart','$colamt', '$dis')";
			if($con->query($sql) === TRUE)
			{
				echo '<script>alert("Saved")</script>';
				echo '<script>window.location = "Disbursement.php"</script>';
			}
	}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("Disbursement.php");
}
?>