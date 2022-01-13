<?php
session_start();
	include("dbcon.php");
	$id = $_POST['income_id'];
	$ma = $_POST['income_amount'];
	$ma = str_replace(',', '', $ma);

	$my= $_POST['income_year'];

if($ma != 0){


$dy=date('Y');
$d=$dy+1;


$date = mysqli_query($db, "SELECT income_year, income_setid FROM finance_fundoperation_incomeset WHERE `income_year` = $d AND `income_setid`='$id'");
if(mysqli_num_rows($date) > 0 ){


        $sql = "UPDATE `finance_fundoperation_incomeset` SET `income_amount` = '$ma', `income_year` = '$my' WHERE `income_setid` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "IncomeFundOperationSetView.php"</script>';			
				}
				}
				else{
		echo "<script>alert('Record cannot be updated');</script>";
	echo'<script> window.location = "IncomeFundOperationSetView.php"</script>';
}
				}

else{
	echo'<script>alert("Please enter a valid amount")</script>';
					echo '<script> window.location = "IncomeFundOperationSetView.php"</script>';			

}

?>
