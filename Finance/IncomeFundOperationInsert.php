	<?php
session_start();
$mc = $_POST['income_code'];
$mt = $_POST['income_type'];



 	include('dbcon.php');
// Check connection

	$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_income` WHERE `income_code` = '$mc' OR `income_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("IncomeFundOperation.php");
		}

		else{

			$sql="INSERT INTO finance_fundoperation_income (income_code,income_type) VALUES ('$mc','$mt')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "IncomeFundOperation.php"</script>';			
				}
		}



?>