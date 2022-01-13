	<?php
session_start();
$id = $_POST['income_id'];
$ma = $_POST['income_amount'];
$ma = str_replace(',', '', $ma);

$my = $_POST['income_year'];



 	include('dbcon.php');
// Check connection
if($ma != 0){
$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_incomeset` WHERE `income_id` = '$id' AND `income_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data Already Exists!")</script>';
			require("IncomeFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_incomeset (income_id,income_amount,income_year) VALUES ('$id','$ma','$my')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "IncomeFundOperationSet.php"</script>';			
				}
		}

}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
	require("IncomeFundOperationSet.php");

}

?>