<?php
include ("connection.php");

$sql = mysqli_query($db, "SELECT * FROM sms_account;");
while($row = mysqli_fetch_assoc($sql))
    	{
    		$id = $row['device_Id'];
    		if ($id != null)
    		{
		$res = mysqli_query($db, "Delete from sms_account");
		echo "<script>alert('The account will be deleted');</script>";
		echo "<script>window.location=\"index.php\";</script>";
		session_start();
		$_SESSION['device_Id'] = "";
		session_destroy();
     	}
   }
     		echo "<script>alert('There is no account to be deleted!!');</script>";
		echo "<script>window.location=\"login_sms_account.php\";</script>";
     	

    	


?>