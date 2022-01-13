<?php
session_start();
?>

<html>

<title>Account Edit</title>
<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
<style>
body {
	font-family: calibri;
	margin: 0; padding: 0;
	background-color: #e6e6e6;
} 
.label {
	background-color: #141414;
	width:100%;
	height:auto;
	padding-left: 3px;
	padding-top:3px;
	padding-bottom: 3px;
	color: white;
	top: 0;

}
.nav {
	background-color: #444444;
	margin-left:1%;
	margin-top:1%;
	margin-right:1%;
	border: none;

	width:98%;
	position: relative;
	overflow: hidden;
	text-transform: uppercase;
	font-family: calibri; 	
}
	.nav a {
    	float: left;
	display: block;
	color: #f2f2f2;
    	text-align: center;
    	padding: 14px 16px;
    	text-decoration: none;
}
.nav a:hover {
    	background: #14aa6c;
    	color: white;
} 
.container {
	background-color: white;
	border: black solid;
	height:auto;
	width: 97%;
	margin-top: 1%;
	margin-left: 1%;
	margin-right: 1%;
	margin-bottom: 1%;
	overflow: hidden;
	
}

.left { 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 50%;
	margin-top: 10%;
	margin-left: 25%;
	float:left;
	font-family: calibri;
	padding:10px;
}
.right{ 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 47%;
	margin-top: 1%;
	margin-right: 1%;
	float:right;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
}
.down{ 
	background-color: white;
	height:auto;
	width: 95%;
	margin-top: 2%;
	margin-left: 2%;
	margin-right: 2%;
	float:right;
	font-family: calibri;
	padding:10px;
}
 .banner {
	width: auto;
  	height: 30px;
	padding-top: 8px;
	padding-bottom: 8px;
    	font-size: 20px;
    	text-align: center;
    	color: WHITE;
    	font-weight: bold;
    	background: #14aa6c;
    	border: #14aa6c solid 1px;
    	font-family: calibri;
	
	
}
input[type=text]{
	text-align:left;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color: #dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=password]{
	text-align:left;
	width: 50%;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color:#dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=text]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;
}
input[type=submit]:hover {
	background-color: #14aa6c;
	border: none;
	color: white;
	-webkit-transition:background 0.5s ease-in-out;
	-moz-transition:background 0.5s ease-in-out;
	transition:background-color 0.5s ease-in-out;
}
input[type=submit] {
	background-color: #444444;
	border: none;
	padding: none;
	color: white;	
	width:98%;
	height: 45px;
	margin-top:5%;
	margin-left:1%;
	margin-right:1%;
	border-radius: 7px;
}
input[type=password]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;

}
.dropdown {
	overflow: hidden;
	float: left;
}
.dropdown .dropbtn {
	float: left;
	display: block;
	color: #f2f2f2;
    	text-align: center;
    	padding: 14px 16px;
    	text-decoration: none;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>


<?php
require("db.php");
$id =$_REQUEST['ID'];

$result = mysqli_query($db,"SELECT * FROM accounts WHERE ID  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$Fullname = $test['Fullname'] ;
				$Username = $test['Username'] ;
				$Emailaddress = $test['Emailaddress'] ;
				$device_Id = $test['device_Id'] ;
				$Password = $test['Password'] ;					
				$Position = $test['Position'] ;
				$Committee = $test['Committee']	;
if(isset($_POST['save']))
{	
	$fullname_save = $_POST['fullname'];
	$username_save = $_POST['username'];
	$emailaddress_save = $_POST['emailaddress'];
	$device_Id_save = $_POST['device_Id'];
	$password_save = $_POST['password'];
	$position_save = $_POST['position'];
	$committee_save = $_POST['committee'];

	mysqli_query($db,"UPDATE accounts SET Fullname ='$fullname_save', Username = '$username_save', Emailaddress='$emailaddress_save',device_Id='$device_Id_save', Password ='$password_save',
		 Position ='$position_save', Committee ='$committee_save'  WHERE ID = '$id'")
				or die(mysqli_error($db)); 
	echo "<script>alert('Account Saved.');</script>";
				echo '<script>window.location = "account.php";</script>';					
}
mysqli_close($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

<section class="left">
			<div class="banner">
				EDIT ACCOUNT
			</div>
<form method="post">

<?php
if($_SESSION['position']=='Barangay Secretary'){
echo 

'<center>
<table class="table table-bordered">

	<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position">
						<optgroup>
						<option>Barangay Captain</option>
						<option>Barangay Councilor</option>
						<option>Barangay Health Worker</option>
						<option>Barangay Treasurer</option>
						<option>SK Chairman</option>
						
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>None</option>
						<option>Peace and Order</option>
						<option>Health,Education & Sport</option>
						<option>Agriculture</option>
						<option>Infrastructure</option>
						<option>Budget and Appropriation</option>
						<option>Ways and Means</option>
						<option>Clean and Green</option>
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Captain'){
echo 
'<table>

<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						<option>Barangay Captain</option>
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>None</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Peace and Order"){
echo 
'<table>
<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>


	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>Peace and Order</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Agriculture"){
echo 
'<table>
	
	<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						<
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						
						<option>Agriculture</option>
						
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health,Education & Sport"){
echo 
'<table>
	
<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						
						<option>Health,Education & Sport</option>
						
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Ways and Means"){
echo 
'<table>
<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>


	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
			
						
						<option>Ways and Means</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Budget & Appropriation"){
echo 
'<table>

<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
				
						
						<option>Budget & Appropriation</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Infrastructure"){
echo 
'<table>

<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						
						<option>Infrastructure</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Clean and Green"){
echo 
'<table>

<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>


	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Councilor</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						
						<option>Clean and Green</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}




if($_SESSION['position']=='Barangay Health Worker'){
echo 
'<table>

<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Health Worker</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>None</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>
';
}

if($_SESSION['position']=='Barangay Treasurer'){
echo 
'<table>

	<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>Barangay Treasurer</option>
						
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>None</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>

';
}

if($_SESSION['position']=='SK Chairman'){
echo 
'<table>
	
	<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" value='.$Fullname.'></td>
	</tr>

	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value='.$Username.'></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" value='.$Emailaddress.'></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" value='.$device_Id.'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value='.$Password.'></td>
	</tr>
	<tr>
		<td>Position</td>
		<td><select name="position" value='.$Position.'>
						<optgroup>
						
						<option>SK Chairman</option>
						
						</optgroup>
						</select>
						</td>


		</tr>
	<tr>
		<td>Committee</td>
		<td><select name="committee" value='.$Committee.'/>
						<optgroup>
						<option>None</option>
						
						</optgroup>
						</select>
						</td>
	
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
	</table>

';
}
?></section>

 <script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>  
     <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
 