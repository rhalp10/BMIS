<?php

require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$name = $_REQUEST['resident_name'];
$pdate = $_REQUEST['pdate'];
$ldate = $_REQUEST['ldate'];
$trn_date = date("Y-m-d H:i:s");
$ins_query="insert into resident_pregnant (`res_ID`,`preg_Date`,`preg_Labor`,`preg_Date_Record`) values ('$name','$pdate','$ldate','$trn_date')";
mysqli_query($con, $ins_query) or die(mysqli_error());

$status = "New Record Inserted Successfully.</br></br><a href='viewpregnant.php'>View Inserted Record</a>";
}
?>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_detail INNER JOIN resident_pregnant ON resident_detail.res_ID= resident_pregnant.res_ID WHERE CONCAT(`res_fName`,`res_mName`,`res_lName`,`preg_Date`,`preg_Labor`,`preg_Date_Record`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else {
    $query = "SELECT * From resident_detail INNER JOIN resident_pregnant ON resident_detail.res_ID= resident_pregnant.res_ID";
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
	<title>view pregnant</title>

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
	<h2>&nbsp&nbsp&nbsp&nbsp&nbspInsert New Record</h2>

<form name="form" method="post" action="" > 
<input type="hidden" name="new" value="1" />
<p>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspResident's Name:
<input type="text" name="resident_name" id="search" list="datalist1" placeholder="Enter here..." required/>
<datalist id=datalist1>
<?php 
$count=1;
$sel_query="Select * from resident_detail WHERE gender_ID='2' ORDER BY res_ID asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option>  <?php echo $row["res_ID"]; ?> <?php echo " " ?><?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?></option></optgroup>
<?php $count++; }
?></datalist>
Date of Conception:
<input id="pregnantdate" type="date" name="pdate" required>&nbsp
Date of Labor:
<input id="labordate" type="date" name="ldate" required></p>
<p align="left"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="Addnew" type="submit" value="Submit" /></p>
<div id="header_container">		
		    <div class="container">
				<div id="header" class="row">	
				</div>
			</div>	
        </div>		
        <br>
</form>





<h2>&nbsp&nbsp&nbsp&nbsp&nbspPregnant Records</h2>

<form action="viewpregnant.php" method="post"><center>
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="97%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>First Name</strong></th><th><strong>Middle Name</strong></th><th><strong>Last Name</strong></th><th><strong>Date of Conception</strong></th><th><strong>Date of Labor</strong></th><th><strong>Date Recorded</strong></th><th><strong></strong></th><th><strong></strong></th></tr>
</thead>

<tbody>
	<?php 
$count=1;

$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_assoc($result)) { 
  ?>
<tr>
	<td align="center"><?php echo $count ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?></td>
	<td align="center"><?php echo $row["res_mName"]; ?></td>
	<td align="center"><?php echo $row["res_lName"]; ?></td>
	<td align="center"><?php echo $row["preg_Date"]; ?></td>
	<td align="center"><?php echo $row["preg_Labor"]; ?></td>
	<td align="center"><?php echo $row["preg_Date_Record"]; ?></td>
	<td align="center"><a style="color:BLUE;" href="editpregnant.php?id=<?php echo $row["preg_ID"]; ?>">Edit</a></td>
	<td align="center"><a style="color:BLUE;" href="deletepregnant.php?id=<?php echo $row["preg_ID"]; ?>">Delete</a></td>

	</tr>

<?php $count++; }

?>

</table>
</center>
<br /><br /><br /><br />
</body>
</html>