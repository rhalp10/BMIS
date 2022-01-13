	<?php
 	include('dbcon.php');

$mc = $_POST['mooe_code'];
$mt = mysqli_real_escape_string($db, $_POST['mooe_type']);
$mt = ucwords(strtolower($mt));



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_mooe` WHERE `mooe_code` = '$mc' OR `mooe_type`='$mt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!");</script>';
			require("MOOEFundOperation.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_mooe (mooe_code,mooe_type) VALUES ('$mc','$mt')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "MOOEFundOperation.php"</script>';			
				}
		}
	


?>