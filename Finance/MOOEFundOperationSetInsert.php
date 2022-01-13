	<?php
session_start();
$id = $_POST['mooe_id'];
$ma = $_POST['mooe_amount'];
$ma = str_replace(',', '', $ma);

$my = $_POST['mooe_year'];



 	include('dbcon.php');
// Check connection
if($ma != 0){

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_mooeset` WHERE `mooe_id` = '$id' AND `mooe_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!")</script>';
			require("MOOEFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_mooeset (mooe_id,mooe_amount,mooe_year) VALUES ('$id','$ma','$my')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "MOOEFundOperationSet.php"</script>';			
				}
		}

}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
	require("IncomeFundOperationSet.php");

}

?>