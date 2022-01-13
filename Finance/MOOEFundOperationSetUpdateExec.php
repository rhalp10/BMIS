<?php
session_start();
	include("dbcon.php");
	$id = $_POST['mooe_id'];
	$ma = $_POST['mooe_amount'];
			$ma = str_replace(',', '', $ma);

	$my= $_POST['mooe_year'];


if($ma != 0){



$dy=date('Y');
$d=$dy+1;


$date = mysqli_query($db, "SELECT mooe_year, mooe_setid FROM finance_fundoperation_mooeset WHERE `mooe_year` = $d AND `mooe_setid`='$id'");
if(mysqli_num_rows($date) > 0 ){

        $sql = "UPDATE `finance_fundoperation_mooeset` SET `mooe_amount` = '$ma', `mooe_year` = '$my' WHERE `mooe_setid` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "MOOEFundOperationSetView.php"</script>';			
				}
				}
				else{
		echo "<script>alert('Record cannot be updated');</script>";
	echo'<script> window.location = "MOOEFundOperationSetView.php"</script>';
}

}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
	echo '<script> window.location = "MOOEFundOperationSetView.php"</script>';			

}
?>