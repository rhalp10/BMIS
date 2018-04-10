	<?php
session_start();
$id = $_POST['income_id'];
$ma = $_POST['income_amount'];
$my = $_POST['income_year'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_incomeset` WHERE `income_id` = '$id' AND `income_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("IncomeFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_incomeset (income_id,income_amount,income_year) VALUES ('$id','$ma','$my')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "IncomeFundOperationSet.php"</script>';			
				}
		}



?>