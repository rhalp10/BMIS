<?php
session_start();
$q = $_POST['q'];
$f = $_POST['f'];
$t = $_POST['t'];
$ca = $_POST['ca'];
$ch = $_POST['ch'];
$a = $_POST['a'];
$aa = $_POST['aa'];
$ta = $_POST['ta'];
$cch = $_POST['cch'];
$cc = $_POST['cc'];
$ccc = $_POST['ccc'];
$c = $_POST['c'];

$k1 = $_POST['k1'];
$k2 = $_POST['k2'];
$k3 = $_POST['k3'];
$k4 = $_POST['k4'];


$l1 = $_POST['l1'];
$l2 = $_POST['l2'];
$l3 = $_POST['l3'];
$l4 = $_POST['l4'];


$r1 = $_POST['r1'];
$r2 = $_POST['r2'];
$r3 = $_POST['r3'];
$r4 = $_POST['r4'];


$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];
$n4 = $_POST['n4'];

$brgy=$_SESSION['barangay'];
$com=$_SESSION['committee'];
$pos=$_SESSION['position'];
$d = date('Y-m-d H:i:s');
$population = $_SESSION['totalpopulation'];
$household = $_SESSION['totalhousehold'];
$cap = $_SESSION['captain'];

	include('dbcon.php');
$ins_query="INSERT into `ref_manilabay` (`quarter`, `year`, `population`, `household`, `tnc`, `ca`, `ch1`, `a1`, `a2`, `total`, `cch1`, `cc1`, `cc3`, `accomby`, `brgycaptain`,`date_save`,`name_barangay`) values ('$q','$f','$population','$household','$t','$ca','$ch','$a','$aa','$ta','$cch','$cc','$ccc','$c','$cap','$d','$brgy')";
				if ($con->query($ins_query) === TRUE) 
				{
					$ins_query1="SELECT LAST_VALUE(mb_ID) as lastt FROM `ref_manilabay`";
					$result = mysqli_query($db, $ins_query1);  
					while($row = mysqli_fetch_assoc( $result )){
					$num_rows=$row['lastt'];	
					}
					
					$ins_query2="INSERT into `manila_step` (`step_id`, `k`, `l`, `r`, `n`) values ('$num_rows','$k1','$l1','$r1','$n1')";
					if ($con->query($ins_query2) === TRUE) {
						/////echo 'Successfully Saved!';
					}
					$ins_query2="INSERT into `manila_step` (`step_id`, `k`, `l`, `r`, `n`) values ('$num_rows','$k2','$l2','$r2','$n2')";
					if ($con->query($ins_query2) === TRUE) {
						//////echo 'Successfully Saved!';
					}
					$ins_query2="INSERT into `manila_step` (`step_id`, `k`, `l`, `r`, `n`) values ('$num_rows','$k3','$l3','$r3','$n3')";
					if ($con->query($ins_query2) === TRUE) {
						///////echo 'Successfully Saved!';
					}
					$ins_query2="INSERT into `manila_step` (`step_id`, `k`, `l`, `r`, `n`) values ('$num_rows','$k4','$l4','$r4','$n4')";
					if ($con->query($ins_query2) === TRUE) {
						echo 'Successfully Saved!';
					}
						
				
					else{
					echo 'ERROR IN SAVING FILE!';
				}

				}
				else{
					echo 'ERROR IN SAVING FILE!';
				}

				
				
				
?>