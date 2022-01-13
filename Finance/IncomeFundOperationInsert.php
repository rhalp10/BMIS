	<?php
 	include('dbcon.php');

$mc = $_POST['income_code'];
$mt = mysqli_real_escape_string($db, $_POST['income_type']);
$mt = ucwords(strtolower($mt));



 	include('dbcon.php');
// Check connection

	$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_income` WHERE `income_code` = '$mc' OR `income_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data Already Exists!")</script>';
			require("IncomeFundOperation.php");
		}

		else{

			$sql="INSERT INTO finance_fundoperation_income (income_code,income_type) VALUES ('$mc','$mt')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "IncomeFundOperation.php"</script>';			
				}
		}



?>