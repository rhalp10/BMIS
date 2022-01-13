<?php
session_start();
 	include('dbcon.php');

$id = $_POST['clearance_id'];
$p1 = mysqli_real_escape_string($db, $_POST['purpose']);
$p1 = ucwords(strtolower($p1));
$p2 = $_POST['price'];
$p2 = str_replace(',', '', $p2);


	$chk = mysqli_query($db, "SELECT * FROM `finance_clearance_set` WHERE `clearance_id` = '$id' AND `purpose`='$p1'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data Already Exists!");</script>';
			require("ClearanceSetPrice.php");
		}

		else{

				$sql="INSERT INTO finance_clearance_set (clearance_id,purpose,price) VALUES ('$id','$p1','$p2')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "ClearanceSetPrice.php"</script>';			
				}
		}

?>