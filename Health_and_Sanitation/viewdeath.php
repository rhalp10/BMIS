<?php

require('db.php');
if(isset($_POST['new']) && $_POST['new']==1)
{
$death = $_REQUEST['resident_name'];
$cost = $_REQUEST['cost'];
$date = $_REQUEST['date'];
$daterec= date("Y-m-d H:i:s");
$ins_query="insert into resident_death (`res_ID`,`death_Cost`,`death_Date`,`death_Date_Record`) values ('$death','$cost','$date','$daterec')";
mysqli_query($db, $ins_query) or die(mysqli_error($db));
}
?>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_death INNER JOIN resident_detail ON resident_death.res_ID= resident_detail.res_ID WHERE CONCAT(`res_fName`,`death_Cost`,`death_Date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query,$db);
    
} else {
    $query         ="SELECT * From resident_detail INNER JOIN resident_death ON resident_detail.res_ID= resident_death.res_ID";
    $search_result = filterTable($query,$db);
}

// function to connect and execute the query
function filterTable($query,$db)
{
    
    $filter_Result = mysqli_query($db, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>view death</title>
		
</head>
<link href="css/design.css" rel="stylesheet" type="text/css"> 

<body>
	<div class="label"> Health and Sanitation /Admin Panel
						<div class="nav">
							<a href="index.php">Home</a>
							<a href="view.php">Drug Inventory</a>
							<a href="viewdrugrelease.php">Drug Distribution</a>
							<a href="viewvac.php">Vaccination</a>
							<a href="viewbirth.php">Newborn</a>
							<a href="viewpregnant.php">Pregnant</a>
							<a href="viewdeath.php">Death</a>
						</div>		

</div>

 
<h2>&nbsp&nbsp&nbsp&nbsp&nbspDeath Records</h2>
<center>
<form action="viewdeath.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="90%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Resident's Name</strong></th><th><strong>Death Cause</strong></th><th><strong>Date of Death</strong></th><th><strong>Date Recorded</strong></th></tr>
</thead>
<tbody>
<?php 

$count=1;

while($row = mysqli_fetch_assoc($search_result)) { ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?><?php echo " " ?><?php echo $row["res_mName"]; ?><?php echo " " ?><?php echo $row["res_lName"]; ?></td>
	<td align="center"><?php echo $row["death_Cost"]; ?></td>
		<td align="center"><?php echo $row["death_Date"]; ?></td>
		<td align="center"><?php echo $row["death_Date_Record"]; ?></td>
	</tr>
<?php $count++; }

?>

</tbody>
</table>
</center>
<br /><br /><br /><br />
</body>
</html>