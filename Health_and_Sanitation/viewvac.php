<?php

require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$rname = $_REQUEST['resident_name'];
$date = $_REQUEST['date'];
$vac = $_REQUEST['vacName'];
$daterec= date("Y-m-d H:i:s");
$ins_query="insert into resident_vaccinated (`res_ID`,`vac_Date`,`vac_Date_Recorded`,`vac_Name`) values ('$rname','$date','$daterec','$vac')";
mysqli_query($con, $ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='viewvac.php'>View Inserted Record</a>";
}
?>

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

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
</head>
<link href="css/design.css" rel="stylesheet" type="text/css"> 
<body>
	<div class="label">
						<div class="nav" style="background-color: #e94b3c">
							<a href="index.php">Home</a>
							<a href="view.php">Drug Inventory</a>
							<a href="viewdrugrelease.php">Drug Distribution</a>
							<a href="viewvac.php">Vaccination</a>
							<a href="viewbirth.php">Newborn</a>
							<a href="viewpregnant.php">Pregnant</a>
							<a href="viewdeath.php">Death</a>
						</div>		

</div>
        <br>
      
        	<meta charset="utf-8">
<div>
<h2>&nbsp&nbsp&nbsp&nbsp&nbspInsert New Record</h2>
<form name="form" method="post" action="" > 
<input type="hidden" name="new" value="1" />

<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResident's Name:
<input type="text" name="resident_name" id="search" list="datalist" placeholder="Enter here..." required/>
<datalist id=datalist>
<?php 
$count=1;
$sel_query= "SELECT * From resident_detail ORDER BY res_ID asc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option> <?php echo $row["res_ID"]; ?> <?php echo " "; ?> <?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?></option></optgroup>
<?php $count++; }
?></datalist>


&nbsp&nbspDate of Vaccination:&nbsp&nbsp<input id="date" type="date" name="date" required>
&nbsp&nbsp&nbsp&nbspName of Vaccine:
<input type="text" name="vacName" placeholder="Enter here..." required>

<p>&nbsp&nbsp&nbsp&nbsp&nbsp<input name="submit" type="submit" value="Submit" /></p>
</form>


<div id="header_container">		
		    <div class="container">
				<div id="header" class="row">	
				</div>
			</div>	
        </div>		
        <br>
        
<h2>&nbsp&nbsp&nbsp&nbsp&nbspVaccination Records</h2>

<form action="viewvac.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
             <center>
<table width="95%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Resident's Name</strong></th><th><strong>Height (cm)</strong></th><th><strong>Weight (kg)</strong></th><th><strong>Date of Vaccination </strong></th><th><strong>Name of Vaccine </strong></th><th><strong>Date Recorded </strong></th><th><strong></strong></th><th><strong></strong></th></tr>
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
	<td align="center"><a style="color:BLUE;" href="editvac.php?id=<?php echo $row["vac_ID"]; ?>">Edit</a></td>
	<td align="center"><a style="color:BLUE;" href="deletevac.php?id=<?php echo $row["vac_ID"]; ?>">Delete</a></td>
	</tr>
<?php $count++; }

?>
</tbody>
</table>



</center>
</div>
<br /><br /><br /><br />
</body>
</html>
