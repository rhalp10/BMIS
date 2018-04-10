	<?php
session_start();
$id = $_POST['mooe_id'];
$ma = $_POST['mooe_amount'];
$my = $_POST['mooe_year'];



 	include('dbcon.php');
// Check connection

$chk = mysqli_query($con, "SELECT * FROM `finance_fundoperation_mooeset` WHERE `mooe_id` = '$id' AND `mooe_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!")</script>';
			require("MOOEFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_mooeset (mooe_id,mooe_amount,mooe_year) VALUES ('$id','$ma','$my')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "MOOEFundOperationSet.php"</script>';			
				}
		}



?>