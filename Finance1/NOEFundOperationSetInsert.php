	<?php
session_start();
$id = $_POST['noe_id'];
$ma = $_POST['noe_amount'];
$my = $_POST['noe_year'];



 	include('dbcon.php');
// Check connection
$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_noeset` WHERE `noe_id` = '$id' AND `noe_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("NOEFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_noeset (noe_id,noe_amount,noe_year) VALUES ('$id','$ma','$my')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "NOEFundOperationSet.php"</script>';			
				}
		}



?>
