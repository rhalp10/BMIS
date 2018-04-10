<?php
session_start();
 	include('dbcon.php');

$id = $_POST['clearance_id'];
$p1 = $_POST['purpose'];
$p2 = $_POST['price'];



	$chk = mysqli_query($con, "SELECT * FROM `finance_clearance_set` WHERE `clearance_id` = '$id' AND `purpose`='$p1'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("DATA ALREADY EXISTS!");</script>';
			require("ClearanceSetPrice.php");
		}

		else{

				$sql="INSERT INTO finance_clearance_set (clearance_id,purpose,price) VALUES ('$id','$p1','$p2')";
				if ($con->query($sql) === TRUE) 
				{
					echo '<script> alert ("Saved")</script>';	
					echo '<script> window.location = "ClearanceSetPrice.php"</script>';			
				}
		}

?>