<?php
session_start();
require_once('db.php');
$sesID = $_SESSION['id'];
$z = mysqli_query($db,"SELECT * FROM `accounts` WHERE ID = '$sesID'");
$data = mysqli_fetch_array($z);
?><html>
<head>
<link rel="shortcut icon" href="Icon/indang logo.png">
<style type="text/css">
body {

/*background: linear-gradient(to bottom, #666666 0%,#111111 90%,#111111 70%,#111111 60%);*/
background-color: #2E4A62;
	margin-right:0;
	margin-left: 0;	
	margin-top: 0;
	font-family: calibri;
	color: white;
	
	
}
img {
	filter: invert(100%);
	padding-right: 10px;
	padding-left: 15px;
}
h1 {
	color: white;
	font-family: calibri;	
}
a {
	display: block;
    	text-decoration: none;
	padding: 10px 5px;
	font-size:18;
	font-face: calibri;
	color:white;
	
}
a:hover{
    	background: #686868;
	color:white;
	left:0;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}
.banner {
	width: auto;
  	height: auto;
	padding-top: 12px;
	padding-bottom: 15px;
	padding-left: 5px;
    	font-size: 25px;
    	text-align: left;
    	color: WHITE;
	margin-top: 0%;
    	font-weight: bold;
    	background: #E94B3C;
    	font-family: calibri;
    	text-transform: uppercase;
}
.holder {
	background: #212121;
	width:100%;
	margin-top: 0%;
	margin-left: 0%;
	padding-top: 10px;
	padding-bottom:10px;
	text-align:left;
}
/* width */
::-webkit-scrollbar {
    width: 15px;
}

/* Track */
::-webkit-scrollbar-track {
    background: white; 


}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #8c8c8c; 

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #141414; 
}
.avatar {
	border-radius: 30px;
}
</style>
</head>


<div class="banner">

	<img src="Picture/banaba.png" style="float:left; border-radius: 50%; filter: invert(0%)!important;" width="50" height="50">
	<font style="float:center; word-wrap: break-word;">Welcome<b> </br> </font>	</br>
	<p style="word-wrap: break-word; text-align: center;"><?php echo $data[1]; ?></p>
</div>

	
<center><h3><?php echo $_SESSION['position']; 
?></h3></center>







<?php
if($_SESSION['position']=='Barangay Secretary'){
echo 

		
'<b><div class="holder"><b>GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Health_and_Sanitation/index.php" target="FraDisplay"><img src="Icon/health.png" style="float:left" width="28">&nbsp;Health and Sanitation</a>
<a href="Peace_and_Order/incident.php" target="FraDisplay"><img src="Icon/blotter.png" style="float:left" width="28"> &nbsp;Peace and Order</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>


<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>


<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>
<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>
<a href="Report/viewreport.php" target="FraDisplay"><img src="Icon/clearances.png" style="float:left" width="29">&nbsp;Reports</a>

<b><div class="holder"><b></b></div>
<a href = "admin.php" target="FraDisplay"><image src="Icon/settings.png" style = "float:center ;filter: invert(0%)!important;" width="20" >Account Setting</a>
';
// <a href = "accountLogout.php" target="_Parent"><img src="Icon/Logout.png" height= "20" style="filter: invert(0%)!important;">Logout</a>	
}

if($_SESSION['position']=='Barangay Captain'){
echo 
'



<b><div class="holder"><b>GENERAL</b></div>

<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Health_and_Sanitation/index.php" target="FraDisplay"><img src="Icon/health.png" style="float:left" width="28">&nbsp;Health and Sanitation</a>
<a href="Peace_and_Order/incident.php" target="FraDisplay"><img src="Icon/blotter.png" style="float:left" width="28"> &nbsp;Peace and Order</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>

<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>


<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>
<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Peace and Order"){
echo 
'
<h3><center><b>Committee on <u>Peace and Order </u></center></b></h2></center>



<b><div class="holder">GENERAL</b></div>

<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Peace_and_Order/incident.php" target="FraDisplay"><img src="Icon/blotter.png" style="float:left" width="28"> &nbsp;Peace and Order</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>

<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>



';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Agriculture"){
echo 
'
<h3><center><b>Committee on <u>Agriculture </u></center></b></h2></center>

<b><div class="holder">GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health,Education & Sport"){
echo 
'
<h3><center><b>Committee on <u>Health,Education & Sport </u></center></b></h2></center>

<b><div class="holder">GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Health_and_Sanitation/index.php" target="FraDisplay"><img src="Icon/health.png" style="float:left" width="28">&nbsp;Health and Sanitation</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Ways and Means"){
echo 
'
<h3><center><b>Committee on <u>Ways and Means </u></center></b></h2></center>


<b><div class="holder">GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Budget & Appropriation"){
echo 
'
<h3><center><b>Committee on <u>Budget & Appropriation </u></center></b></h2></center>



<b><div class="holder">GENERAL</b></div>
	
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Infrastructure"){
echo 
'
<h3><center><b>Committee on <u>Infrastructure</u></center></b></h2></center>


<b><div class="holder">GENERAL</b></div>
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Clean and Green"){
echo 
'
<h3><center><b>Committee on <u>Clean and Green </u></center></b></h2></center>

<b><div class="holder">GENERAL</b></div>

<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Clearance_and_Forms/index.php" target="FraDisplay"><img src="Icon/certificates.png" style="float:left" width="29">&nbsp;Clearance and Forms</a>
<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>

<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>

<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>

';
}




if($_SESSION['position']=="Barangay Health Worker"){
echo 
'

<b><div class="holder">GENERAL</b>
</div>
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Health_and_Sanitation/index.php" target="FraDisplay"><img src="Icon/health.png" style="float:left" width="28">&nbsp;Health and Sanitation</a>
<a href="Resident_Profiling/resident.php" target="FraDisplay"><img src="Icon/residents.png" style="float:left" width="28">&nbsp;Resident Profiling</a>


<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>




';
}

if($_SESSION['position']=='Barangay Treasurer'){
echo 
'

<b><div class="holder">GENERAL</b></div>
<a href="Resident_Profiling\Dash\index.php" target="FraDisplay"><img src="Icon/home.png" style="float:left" width="28">&nbsp;Dashboard</a>
<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Finance/index.php" target="FraDisplay"><img src="Icon/finance.png" style="float:left" width="28">&nbsp;Finance</a>


<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>
<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>
<a href="Report/viewreport.php" target="FraDisplay"><img src="Icon/clearances.png" style="float:left" width="29">&nbsp;Reports</a>




';
}

if($_SESSION['position']=='SK Chairman'){
echo 
'	

<b><div class="holder">GENERAL</b></div>
	<a href="account.php" target="FraDisplay"><img src="Icon/pen.png" style="float:left" width="27">&nbsp;Account</a>


<a href="Communication/index.php" target="FraDisplay"><img src="Icon/announcement.png" style="float:left" width="30">&nbsp;Announcement</a>
<a href="Barangay_Officials/index.php" target="FraDisplay"><img src="Icon/add.png" style="float:left" width="28">&nbsp;Barangay Officials</a>
<a href="Special_Projects/index.php" target="FraDisplay"><img src="Icon/special.png" style="float:left" width="28">&nbsp;Special Projects</a>




';
}
if($_SESSION['position']=="Barangay Councilor"){
?>
<!-- <div class="holder"></div> -->
<!-- <a href = "accountLogout.php" target="_Parent"><img src="Icon/Logout.png" height= "20" style="filter: none!important;">Logout</a> -->
<?php

}
?>
<div class="holder"></div>
<a href = "accountLogout.php" target="_Parent"><img src="Icon/Logout.png" height= "20" style="filter: none!important;">Logout</a>	

</body>

</html>