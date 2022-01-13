<?php
	include("dbcon.php");
	$id= $_POST['clearance_id'];
	$cf = mysqli_real_escape_string($db, $_POST['clearance_form']);
$cf = ucwords(strtolower($cf));


		if($id>10){

		$sql = "UPDATE `finance_clearance_list` SET `clearance_id` = '$id',`clearance_form` = '$cf'  WHERE `clearance_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "ViewClearanceList.php"</script>';			
				}

}
else{
		echo "<script>alert('Default data cannot be updated.');</script>";
	echo'<script> window.location = "ViewClearanceList.php"</script>';

}
?>
