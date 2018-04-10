<?php # Script 11.4 - mysql_connect.php

// // This file contains the database access information. This file also establishes a connection to MySQL and selects the database.

// // Set the database access information as constants.
// define ('DB_USER', 'root');
// define ('DB_PASSWORD', '');
// define ('DB_HOST', 'localhost');
// define ('DB_NAME', 'bmis_db');

// // Make the connnection and then select the database.
// $dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );
// mysql_select_db (DB_NAME) OR die ('Could not select the database: ' . mysql_error() );

	$dbc = mysqli_connect("localhost", "root", "", "bmis_db");
?>