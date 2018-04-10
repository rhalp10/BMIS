<?php

session_start(); 
include('db.php');

 	if (isset($_SESSION['id'])) {
 	}
 	else{

 		header('location:index.php');
 	}
?>

<html>
<title>Admin Panel</title>
<link rel="shortcut icon" href="indang logo.png">

<Style>
body {
	background-color: white;
}
</style>
<head>
<frameset rows="80%,5.5%" frameborder="0">
<!-- <frame src="header.php" noresize="noresize"> -->

<frameset cols="20%,80%">
<frame src="modules.php" name="FraLink">
<frame src="Communication/dashboard.php" name="FraDisplay">
</frameset>
<frame src="footer.php" name="FraDisplay">

</frameset>
</head></html>