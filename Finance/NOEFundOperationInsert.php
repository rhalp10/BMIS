	<?php
 	include('dbcon.php');

$nt = mysqli_real_escape_string($db, $_POST['noe_type']);
$nt = ucwords(strtolower($nt));

$nc = $_POST['noe_code'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_noe` WHERE `noe_code` = '$nc' OR `noe_type`='$nt'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!")</script>';
			require("NOEFundOperation.php");
		}

		else{

			$sql="INSERT INTO finance_fundoperation_noe (noe_type,noe_code) VALUES ('$nt','$nc')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "NOEFundOperation.php"</script>';			
				}
		}



?>