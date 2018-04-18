<?php

require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$Nname = $_REQUEST['resident_name'];
$date = date("Y-m-d H:i:s");
$ins_query="insert into resident_newborn (`res_ID`,`newborn_Date_Record`) values ('$Nname','$date')";

mysqli_query($con, $ins_query) or die(mysql_error());


$status = "New Record Inserted Successfully.</br></br><a href='viewbirth.php'>View Inserted Record</a>";
}
?>

<?php

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT * From resident_detail INNER JOIN resident_newborn ON resident_detail.res_ID= resident_newborn.res_ID INNER JOIN ref_gender on resident_detail.gender_ID = ref_gender.gender_ID where concat(res_fName,res_mName,res_lName,res_Bday,gender_Name) LIKE '%".$valueToSearch."%'";

    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * From resident_detail INNER JOIN resident_newborn ON resident_detail.res_ID= resident_newborn.res_ID INNER JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID ";
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
	<title>view birth</title>
	
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
       
<h2>&nbsp&nbsp&nbsp&nbsp&nbspInsert New Record</h2>
	
<form name="form" method="post" action="" > 
<input type="hidden" name="new" value="1" />

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNewborn Name:
<input type="text" name="resident_name" id="search" list="datalist" placeholder="Enter here..." required/>
<datalist id=datalist>
<?php 
$count=1;
$sel_query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Newborn'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '0' AND '1'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option> <?php echo $row["res_ID"]; ?><?php echo " "; ?> <?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?></option></optgroup>
<?php $count++; }
?></datalist>


<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name="submit" type="submit" value="Submit" /></p>
</form>

	
<div id="header_container">		
		    <div class="container">
				<div id="header" class="row">	
				</div>
			</div>	
        </div>		
        <br>

	<h2>&nbsp&nbsp&nbsp&nbsp&nbspNewborn Records</h2>
<center>
<form action="viewbirth.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="95%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>First Name</strong></th><th><strong>Middle Name</strong></th><th><strong>Last Name</strong></th><th><strong>Date of Birth</strong></th><th><strong>Gender</strong></th><th><strong>Date of Recorded</strong></th><th><strong>Delete</strong></th></tr>
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
	<td align="center"><?php echo $row["res_Bday"]; ?></td>
	<td align="center"><?php echo $row["gender_Name"]; ?></td>
	<td align="center"><?php echo $row["newborn_Date_Record"]; ?></td>
	<td align="center"><a style="color:BLUE;" href="deletebirth.php?id=<?php echo $row["newborn_ID"]; ?>">Delete</a></td>

	</tr>

<?php $count++; }

?>
</table>
</center>
</div>
<br /><br /><br /><br />
</body>
</html>