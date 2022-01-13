<?php
session_start();
	include("dbcon.php");
	$id = $_POST['service_id'];
	$sp = mysqli_real_escape_string($db, $_POST['service_position']);
	$sp = ucwords(strtolower($sp));

	$ma = $_POST['service_amount'];
		$ma = str_replace(',', '', $ma);

	$my= $_POST['service_year'];

 	if($ma != 0){
$dy=date('Y');
$d=$dy+1;


$date = mysqli_query($db, "SELECT service_year, service_setid FROM finance_fundoperation_psset WHERE `service_year` = $d AND `service_setid`='$id'");
if(mysqli_num_rows($date) > 0 ){

        $sql = "UPDATE `finance_fundoperation_psset` SET `service_position` = '$sp', `service_amount` = '$ma', `service_year` = '$my'  WHERE `service_setid` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ServiceFundOperationSetView.php"</script>';			
				}
				}
				else{
		echo "<script>alert('Record cannot be updated');</script>";
	echo'<script> window.location = "ServiceFundOperationSetView.php"</script>';
}
}
else{
	echo'<script>alert("Pkease enter a valid amount")</script>';
					echo '<script> window.location = "ServiceFundOperationSetView.php"</script>';			

}

?>

