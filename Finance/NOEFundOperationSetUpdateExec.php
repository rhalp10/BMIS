<?php
session_start();
	include("dbcon.php");
	
    $id= $_POST['noe_id'];
	$mc = $_POST['noe_amount'];
		$mc = str_replace(',', '', $mc);

	$mt = $_POST['noe_year'];


 	if($mc != 0){

$dy=date('Y');
$d=$dy+1;


$date = mysqli_query($db, "SELECT noe_year, noe_setid FROM finance_fundoperation_noeset WHERE `noe_year` = $d AND `noe_setid`='$id'");
if(mysqli_num_rows($date) > 0 ){

        $sql = "UPDATE `finance_fundoperation_noeset` SET `noe_amount` = '$mc', `noe_year` = '$mt'  WHERE `noe_setid` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = " NOEFundOperationSetView.php"</script>';			
				}
				}
				else{
		echo "<script>alert('Record cannot be updated');</script>";
	echo'<script> window.location = "NOEFundOperationSetView.php"</script>';
}
				}
else{
	echo'<script>alert("Please enter a valid amount")</script>';
	echo '<script> window.location = " NOEFundOperationSetView.php"</script>';			

}
?>

