<?php
	include("dbcon.php");
	$id= $_POST['collection_id'];
	$cd = $_POST['collection_date'];
	$cp = $_POST['collection_particular'];
	$ca = $_POST['collection_amount'];



		$sql = "UPDATE `finance_collection` SET `collection_id` = '$id',`collection_date` = '$cd',`collection_particular` = '$cp',`collection_amount` = '$ca'  WHERE `collection_id` = '$id'";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "Collection.php"</script>';			
				}
?>