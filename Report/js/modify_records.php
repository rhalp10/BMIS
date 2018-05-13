<?php
$con = mysqli_connect("localhost","root","","sample");


if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $name=$_POST['name_val'];
 $age=$_POST['age_val'];

 mysql_query("update user_detail set name='$name',age='$age' where id='$row'");
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 $sql = "delete from user_detail where id='$row_no'";


if(mysqli_query($con,$sql)){
echo  "success";
 
}
}

if(isset($_POST['insert_row']))
{
 $name=$_POST['name_val'];
 $age=$_POST['age_val'];
 $ins_query="insert into user_detail values('','$name','$age')";
				if ($con->query($ins_query) === TRUE) 
				{
					$ins_query1="SELECT LAST_VALUE(id) as lastt FROM `user_detail`";
					$result = mysqli_query($con, $ins_query1);  
					while($row = mysqli_fetch_assoc( $result )){
					$num_rows=$row['lastt'];	
					}
 echo $num_rows;
				exit();
				}
}
?>