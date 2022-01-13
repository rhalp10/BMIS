

<?php

  include("db.php");  

	$id =$_REQUEST['ID'];
	
	
	// sending query
	mysqli_query($db,"DELETE FROM accounts WHERE ID = '$id'")
	or die(mysqli_error($db));  	
	echo "<script>alert('Account Deleted.');</script>";

echo '<script>window.location = "account.php";</script>';

	
?>