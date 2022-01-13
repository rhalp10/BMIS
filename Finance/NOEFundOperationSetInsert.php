	<?php
session_start();
$id = $_POST['noe_id'];
$ma = $_POST['noe_amount'];
$my = $_POST['noe_year'];
	$ma = str_replace(',', '', $ma);



 	include('dbcon.php');
// Check connection
 	if($ma != 0){

$chk = mysqli_query($db, "SELECT * FROM `finance_fundoperation_noeset` WHERE `noe_id` = '$id' AND `noe_year`='$my'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>alert("Data already exists!")</script>';
			require("NOEFundOperationSet.php");
		}

		else{

	$sql="INSERT INTO finance_fundoperation_noeset (noe_id,noe_amount,noe_year) VALUES ('$id','$ma','$my')";
				if ($db->query($sql) === TRUE) 
				{
					echo '<script> alert ("Data Saved")</script>';	
					echo '<script> window.location = "NOEFundOperationSet.php"</script>';			
				}
		}

}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
	require("NOEFundOperationSet.php");

}

?>
