<?php
	include("dbcon.php");
	$id= $_POST['collection_id'];
	$cd = $_POST['collection_date'];
	$cp = mysqli_real_escape_string($db, $_POST['collection_particular']);
	$cp = ucwords(strtolower($cp));

	$ca = $_POST['collection_amount'];
$ca = str_replace(',', '', $ca);

$col = substr($cd, 0, -3);

if($ca != 0){

		$sql = "UPDATE `finance_collection` SET `collection_id` = '$id',`collection_date` = '$cd',`collection_particular` = '$cp',`collection_amount` = '$ca'  WHERE `collection_id` = '$id'";
		 		if ($db->query($sql) === TRUE) 
		 		{
					echo '<script> alert ("Data Updated")</script>';	
					echo '<script> window.location = "CollectionView.php"</script>';			
				}
}
else{
	echo'<script>alert("Invalid amount")</script>';
	require("CollectionView.php");
}
?>