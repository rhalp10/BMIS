<?php
session_start();
?>
<!--  <pre>
            <?php 
            // if(){

            // }
            print_r($_SERVER) ;
            ?>
            </pre> -->
<html>
<title>Account</title>
<link href="Resident_Profiling/css/bootstrap.min.css" rel="stylesheet">
<link href="Resident_Profiling/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">

<!-- <style>
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

</style> -->


</head>

<body style="padding: 25px;">
 	
  


<?php
if($_SESSION['position']=='Barangay Secretary'){
?>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add account</button>
<?php
}
?>
<?php 
if ($_SESSION['position']=='Barangay Secretary')
{
?>

<h2>LIST OF ACCOUNTS</h2>
<?php
}
 if ($_SESSION['position']!='Barangay Secretary')
{

?>

<h2>ACCOUNTS</h2>
<?php
}?>
<center>
<?php
if (isset($_POST['submit']))
	{	   
	include 'db.php';
	
			 		$fullname=$_POST['fullname'] ;	
			 		$username=$_POST['username'] ;
					$emailaddress=$_POST['emailaddress'];
					$device_Id= $_POST['device_Id'];
					$password= $_POST['password'] ;					
					$position= $_POST['position'] ;
					$committee= $_POST['committee'];
												
		 mysqli_query($db,"INSERT INTO `accounts`(Fullname, Username, Emailaddress, device_Id, Password, Position, Committee) 
		 VALUES ('$fullname','$username','$emailaddress','$device_Id','$password','$position', '$committee')"); 
				
				
	        }
?>
</form>
<br>
<br>
<table id="x" class="table table-bordered" >

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
			include("db.php");
			
				
			$result=mysqli_query($db,"SELECT * FROM accounts WHERE id!=1");
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
				echo"<td> 
				<div class='btn-group'>
				<a href ='accounteditadmin.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'>Edit</a>
				<a href ='accountdelete.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'><center>Delete</center></a>
				</div></td> ";
			} //while
		} //if
		else {
			$result=mysqli_query($db,"SELECT * FROM accounts WHERE username='".$_SESSION['USER']."'");
			
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
				echo"<td> 
				<div class='btn-group'>
				<a href ='accountedit.php?ID=$id' onclick='return myFunction()' class='btn btn-primary'>Edit</a>
				</div></td>";
									
				echo "</tr>";
			} //while
		} //else




			mysqli_close($db);
			?>
</down>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header" style=" padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #b1cbbb;
    color: black;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ">Add Account</h4>
      </div>
      <div class="modal-body">
       
       <form class="form-horizontal" action= "accountinsert.php" method="post">
       	 <div class="form-group">
		    <label class="col-sm-2 control-label">Fullname</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Fullname" name="fullname" required >
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Username" name="username" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Email Address</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Email Address" name="emailaddress" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Device ID</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="text" placeholder="Enter Device ID" name="emailaddress" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="focusedInput" type="password" placeholder="Enter Password" name="password" required >
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Position</label>
		    <div class="col-sm-10">
		    	<select name="position" class="form-control">
					<optgroup>
					<option>Barangay Captain</option>
					<option>Barangay Councilor</option>
					<option>Barangay Health Worker</option>
					<option>Barangay Treasurer</option>
					<option>SK Chairman</option>
					</optgroup>
				</select>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-2 control-label">Committee</label>
		    <div class="col-sm-10">
		    	<select name="committee" class="form-control">
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
		    </div>
		  </div>
		<div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-success btn-lg" name="submit">Add</button>
		    </div>
  		</div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 	<script src="Resident_Profiling/jquery/jquery-3.3.1.min.js"></script>
    <script src="Resident_Profiling/js/bootstrap.min.js"></script>
    <script src="Resident_Profiling/vendor/js/jquery.dataTables.min.js"></script>  
    <script src="Resident_Profiling/vendor/js/dataTables.bootstrap.min.js"></script>
    <script>
	$(document).ready(function() {
    $('#x').DataTable();
	} );
	</script>
</body>
</html>
