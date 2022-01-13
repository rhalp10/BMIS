<?php
   include("connection.php");
   	 $id = $_GET['id'];
   	$res = mysqli_query($db, "Delete from sms where id = $id");
   	echo "<script>alert('You successfully delete a sms log');</script>";
   	echo "<script>window.location=\"sms_log.php\";</script>";
   ?>