<?php
session_start();
$period = $_SESSION['covperiod'];
$trial=0;
 	include('dbcon.php');


	$chk = mysqli_query($db, "SELECT * FROM `report_cov` WHERE `period` = '$period'");
		if(mysqli_num_rows($chk) > 0 ){
			echo'<script>
				var a = confirm("Record for '.$period.' already exist. Continue?")
				if(a==true){
					'.$trial = "1".'
				}
			
				</script>';
if($trial==1){
	require("covsave.php");
}
else{
	require("accom.php");
}
		}
		else{
			require("covsave.php");
			
		}


				

?>