<?php
session_start();
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>

</head>
<link href="css/design.css" rel="stylesheet" type="text/css"> 
<body>
	<div class="label">
						<div class="nav"  style="background-color: #e94b3c;" >
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
        <center>
        	<?php
        	if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From inventory_drugs_release 
    INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID 
    INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID 
    WHERE CONCAT(`drug_Name`,`res_fName`,`res_mName`,`res_lName`,`drgrelease_Qnty`,`drgrelease_Date_Record`) 
    LIKE '%".$valueToSearch."%' order by inventory_drugs_release.drgrelease_Date_Record";
    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * From inventory_drugs_release 
    INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID 
    INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID order by inventory_drugs_release.drgrelease_Date_Record ";
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
<br>
        <h2>Drug Distribution Records</h2>

 			<form action="distribute.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>

<table width="85%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Name</strong></th><th><strong>Quantity</strong></th><th><strong>Resident's Name</strong></th><th><strong>Date Given</strong></th></tr>
</thead>

<tbody>
<?php 

$count=1;

while($row = mysqli_fetch_assoc($search_result)) { ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["drug_Name"]; ?></td>
	<td align="center"><?php echo $row["drgrelease_Qnty"]; ?></td>
<td align="center"><?php echo $row["res_fName"]; ?><?php echo" "; ?><?php echo $row["res_mName"]; ?><?php echo " " ?><?php echo $row["res_lName"]; ?></td>
<td align="center"><?php echo $row["drgrelease_Date_Record"]; ?></td>
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