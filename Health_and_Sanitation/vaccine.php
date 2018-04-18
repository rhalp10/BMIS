<?php
session_start();
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>View Records</title>

</head>

<link href="css/design.css" rel="stylesheet" type="text/css"> 
<body>
	<div class="label">
						<div class="nav" style="background-color: #e94b3c">
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

</div>

<br>
<center>
	<?php
        	if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_detail INNER JOIN resident_vaccinated ON resident_detail.res_ID= resident_vaccinated.res_ID WHERE CONCAT(`vac_Name`,`res_fName`,`res_mName`,`res_lName`,`vac_Date`,`vac_Date_Recorded`,`vac_Name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * From resident_detail INNER JOIN resident_vaccinated ON resident_detail.res_ID= resident_vaccinated.res_ID ";
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
<h2>Vaccination Records</h2>

<form action="vaccine.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="85%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Resident's Name</strong></th><th><strong>Height (cm)</strong></th><th><strong>Weight (kg)</strong></th><th><strong>Date of Vaccination </strong></th><th><strong>Name of Vaccine </strong></th><th><strong>Date Recorded </strong></th> </tr>
</thead>
<tbody>
<?php 
$count=1;
while($row = mysqli_fetch_assoc($search_result)) { ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?><?php echo " " ?><?php echo $row["res_mName"]; ?><?php echo " " ?><?php echo $row["res_lName"]; ?></td>
	<td align="center"><?php echo $row["res_Height"]; ?></td>
	<td align="center"><?php echo $row["res_Weight"]; ?></td>
	<td align="center"><?php echo $row["vac_Date"]; ?></td>
	<td align="center"><?php echo $row["vac_Name"]; ?></td>
	<td align="center"><?php echo $row["vac_Date_Recorded"]; ?></td>
	</tr>
<?php $count++; }

?>
</tbody>
</table>


<br /><br /><br /><br />

</div>
</center>
</body>
</html>
