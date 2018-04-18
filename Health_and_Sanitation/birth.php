<?php
session_start();
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>newborn</title>
	
</head>
<body>
<link href="css/design.css" rel="stylesheet" type="text/css"> 
<body>
	<div class="label">
						<div class="nav" style="
    background-color: #e94b3c">
<?php
if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Health Worker' OR ($_SESSION['position']=='Barangay Councilor' && $_SESSION['committee']=="Health and Sanitation"))
    echo'
							<a href="dashboard.php">Insert Record</a>';?>
							<a href="distribute.php">Drug Distribution</a>
							<a href="vaccine.php">Vaccination</a>
							<a href="birth.php">Newborn</a>
							<a href="pregnant.php">Pregnant</a>
							<a href="death.php">Death</a>
						</div>		

</div><br>
        <center>
        	<?php

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_detail INNER JOIN resident_newborn ON resident_detail.res_ID= resident_newborn.res_ID INNER JOIN ref_gender on resident_detail.gender_ID = ref_gender.gender_ID where concat(res_fName,res_mName,res_lName,res_Bday,gender_Name) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * From resident_detail INNER JOIN resident_newborn ON resident_detail.res_ID= resident_newborn.res_ID INNER JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect       = mysqli_connect("localhost", "root", "", "bmis_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<h2>Newborn Records</h2>

<form action="birth.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="95%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>First Name</strong></th><th><strong>Middle Name</strong></th><th><strong>Last Name</strong></th><th><strong>Date of Birth</strong></th><th><strong>Gender</strong></th><th><strong>Date Recorded</strong></th></tr>
</thead>
<tbody>
	<?php 

$count=1;
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_assoc($result)) { 
  ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?></td>
	<td align="center"><?php echo $row["res_mName"]; ?></td>
	<td align="center"><?php echo $row["res_lName"]; ?></td>
		<td align="center"><?php echo $row["res_Bday"]; ?></td>
			<td align="center"><?php echo $row["gender_Name"]; ?></td>
			<td align="center"><?php echo $row["newborn_Date_Record"]; ?></td>
	</tr>
<?php $count++; }

?>
</tbody>
</table>
</center>
</body>
</html>