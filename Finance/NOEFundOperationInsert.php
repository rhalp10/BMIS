	<?php
session_start();
$nt = $_POST['noe_type'];
$nc = $_POST['noe_code'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_noe` WHERE `noe_code` = '$nc' OR `noe_type`='$nt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("NOEFundOperation.php");
		}

		else{

			$sql="INSERT INTO finance_fundoperation_noe (noe_type,noe_code) VALUES ('$nt','$nc')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "NOEFundOperation.php"</script>';			
				}
		}



?>