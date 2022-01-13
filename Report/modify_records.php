<?php
session_start();
include('dbcon.php');


if(isset($_POST['insert_go']))
{
	$date = date('Y-m-d H:i:s');
 $n=$_POST['n'];
 $q=$_POST['q'];
 $brgy=$_SESSION['barangay'];
 $cap=$_SESSION['captain'];
 $sec=$_SESSION['secretary'];
 $ins_query="insert into report_attendancemonitoring(prepby, subby, notedby, quater, brgy, date) values('$sec','$cap','$n','$q','$brgy','$date')";
				if ($con->query($ins_query) === TRUE) 
				{
					$ins_query1="SELECT LAST_VALUE(attendancemonitoring_id) as lastt FROM `report_attendancemonitoring`";
					$result = mysqli_query($db, $ins_query1);  
					while($row = mysqli_fetch_assoc( $result )){
					$num_rows=$row['lastt'];
					}
  $sql = "UPDATE `report_attendance` SET `attendance_id` = '$num_rows' WHERE `attendance_id` = 0";
		 		if ($con->query($sql) === TRUE) 
		 		{
					echo 'Successfully saved to database!';			
				}
				exit();					
				}

				
}





if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 $sql = "delete from user_detail where id='$row_no'";


if(mysqli_query($db,$sql)){
echo  "success";
 
}
}

if(isset($_POST['insert_row']))
{
 $b1=$_POST['b1'];
 $b2=$_POST['b2'];
 $b3=$_POST['b3'];
 $b4=$_POST['b4'];
 $b5=$_POST['b5'];
 $ins_query="insert into report_attendance(attendance_id, name_personnel, nature_absent, nature_tard, station, position) values('','$b1','$b2','$b3','$b4','$b5')";
				if ($con->query($ins_query) === TRUE) 
				{
 echo '0';
				exit();
				}
}





?>
?>