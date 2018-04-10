<?php
   $connection = mysqli_connect("localhost", "root", "") or die ("Couldn't Connect");
    	mysqli_select_db($connection, "bmis_db") or die ("Couldn't find Database");
   
   
   ?>