<?php
	include("dbcon.php");
	$id= $_POST['collection_id'];
	$cd = $_POST['collection_date'];
	$cp = $_POST['collection_particular'];
	$ca = $_POST['collection_amount'];
	
	$chk = mysqli_query($con,"SELECT * FROM `finance_collection` WHERE `collection_id` = '$id'");
						
	if(mysqli_num_rows($chk) < 0 )
	{
		header("location: Collection.php");
	}
	else
	{
		$sql = "UPDATE `finance_collection` SET `collection_id` = '$id',`collection_date` = '$cd',`collection_particular` = '$cp',`collection_amount` = '$ca'  WHERE `collection_id` = '$id'";
		 mysqli_query($con, $sql) or die(mysql_errno());

		 header("location: Collection.php");

	}
?>