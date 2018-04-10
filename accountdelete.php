

<?php

  include("accountdbconnect.php");  

	$id =$_REQUEST['ID'];
	
	
	// sending query
	mysql_query("DELETE FROM accounts WHERE ID = '$id'")
	or die(mysql_error());  	
	echo "<script>alert('Account Deleted.');</script>";

echo '<script>window.location = "account.php";</script>';

	
?>