<?php
session_start();
?>
<html>
<title>Account</title>
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
	width: 95%;
	margin-top: 1%;
	margin-left: 1%;
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



table { 
  margin: 1em 0 3em 0;
}

table tr th, table tr td { 
  background: #323232;
  color: #FFF;
  padding: 0.75em 0.5em;
  text-align: left;
}
  
table tr td { 
  background: #FFF;
  color: #47433F;
  border-top: 1px solid #EEE;
}

</style>


</head>

<body>
 	
  


<?php
if($_SESSION['position']=='Barangay Secretary'){
 
echo'
<section class="left">
			<div class="banner">
				ADD ACCOUNT
			</div>
<form action= "accountinsert.php" method="post">

<center>
<table>



<tr>
		<td>Fullname</td>
		<td><input type="text" name="fullname" placeholder="Enter Fullname" required /></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" placeholder="Enter Username" required /></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input type="text" name="emailaddress" placeholder="Enter Email Address" required /></td>
	</tr>
	<tr>
		<td>Device ID</td>
		<td><input type="text" name="device_Id" placeholder="Enter Device ID" required /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" placeholder="Enter Password" required /></td>
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
		<td><select name="committee">
						<optgroup>
						<option>None</option>
						<option>Peace and Order</option>
						<option>Health,Education & Sport</option>
						<option>Agriculture</option>
						<option>Infrastructure</option>
						<option>Budget & Appropriation</option>
						<option>Ways and Means</option>
						<option>Clean and Green</option>
						</optgroup>
						</select>
						</td>
	
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="add" /></td>
	</tr>
</table></center>';}?>
</section>
<?php 
if ($_SESSION['position']=='Barangay Secretary')
echo'
<section class="down">
	<div class="banner">
				LIST OF ACCOUNTS
			</div>';?>
<?php
 if ($_SESSION['position']!='Barangay Secretary')
{
	echo '
<section class="down">
	<div class="banner">
				ACCOUNT
			</div>';
}?>
<center>
<?php
if (isset($_POST['submit']))
	{	   
	include 'accountdbconnect.php';
	
			 		$fullname=$_POST['fullname'] ;	
			 		$username=$_POST['username'] ;
					$emailaddress=$_POST['emailaddress'];
					$device_Id= $_POST['device_Id'];
					$password= $_POST['password'] ;					
					$position= $_POST['position'] ;
					$committee= $_POST['committee'];
												
		 mysql_query("INSERT INTO `accounts`(Fullname, Username, Emailaddress, device_Id, Password, Position, Committee) 
		 VALUES ('$fullname','$username','$emailaddress','$device_Id','$password','$position', '$committee')"); 
				
				
	        }
?>
</form>
<table width="90%" border="2" style="border-collapse:collapse;">

	<thead> <tr>
			<th> Fullname </th>
			<th> Username </th> 
			<th> Email Address </th>
			<th> Device ID </th>
			<th> Password </th>
			<th> Position </th>
			<th> Committee</th>
			<th colspan="2">Action</th>
	</tr>
</thead>
<script>
				function myFunction() {
					var r = confirm("Are you sure?");
					if (r == true) {
						return true;
					} else {
						return false;
					}
					document.getElementById("demo").innerHTML = txt;
				}
			</script>
			<?php
			include("accountdbconnect.php");
			
				
			$result=mysqli_query($conn,"SELECT * FROM accounts WHERE id!=1");
	if($_SESSION['position']=='Barangay Secretary'){		
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['ID'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['Fullname']."</font></td>";
				echo"<td><font color='black'>" .$test['Username']."</font></td>";
				echo"<td><font color='black'>" .$test['Emailaddress']."</font></td>";
				echo"<td><font color='black'>" .$test['device_Id']."</font></td>";
				echo"<td><font color='black'>". $test['Password']. "</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";
				echo"<td><font color='black'>". $test['Committee']. "</font></td>";	
				echo"<td> <a href ='accounteditadmin.php?ID=$id' onclick='return myFunction()'>Edit</a>";
				echo"<td> <a href ='accountdelete.php?ID=$id' onclick='return myFunction()'><center>Delete</center></a>";
									
				echo "</tr>";
			} //while
		} //if
		else {
			$result=mysqli_query($conn,"SELECT * FROM accounts WHERE username='".$_SESSION['USER']."'");
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['ID'];	
				echo "<tr align='center'>";
				echo"<td><font color='black'>" .$test['Fullname']."</font></td>";					
				echo"<td><font color='black'>" .$test['Username']."</font></td>";
				echo"<td><font color='black'>" .$test['Emailaddress']."</font></td>";
				echo"<td><font color='black'>" .$test['device_Id']."</font></td>";
				echo"<td><font color='black'>". $test['Password']. "</font></td>";
				echo"<td><font color='black'>". $test['Position']. "</font></td>";
				echo"<td><font color='black'>". $test['Committee']. "</font></td>";	
				echo"<td> <a href ='accountedit.php?ID=$id' onclick='return myFunction()'>Edit</a>";
									
				echo "</tr>";
			} //while
		} //else




			mysqli_close($conn);
			?>
</down>
</table>

</body>
</html>
