

<?php

  include("accountdbconnect.php");  

	$id =$_REQUEST['ID'];
	
	
	// sending query
	mysqli_query($conn,"DELETE FROM accounts WHERE ID = '$id'")
	or die(mysqli_error());  	
	echo "<script>alert('Account Deleted.');</script>";

echo '<script>window.location = "account.php";</script>';

	
?>