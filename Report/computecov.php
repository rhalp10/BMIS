<?php
session_start();
$fy = $_POST['fyear'];
 $fm = $_POST['fmonth'];
 $d= cal_days_in_month(CAL_GREGORIAN, $fm, $fy);
 
  $first = $fy.'-'.$fm.'-01';
 $second = $fy.'-'.$fm.'-'.$d;

include('dbcon.php');
						$query = "SELECT COUNT(incident_id) as total FROM `ms_incident` WHERE `date_reported` BETWEEN '$first' AND '$second'";
						$res = mysqli_query($db,$query);
						$row=mysqli_fetch_assoc($res);
$total = $row['total'];


						if($total==0){
                            
                            $total = "no";
                        }

$_SESSION['covtotal']=$total;
$_SESSION['covperiod']=$second;

echo '<script>window.location = "accom.php";</script>';


?>