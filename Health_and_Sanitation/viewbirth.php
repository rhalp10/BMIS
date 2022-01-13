<?php

require('db.php');

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query         = "SELECT res_ID,
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
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '0' AND '1' and concat(res_fName,res_mName,res_lName,res_Bday,gender_Name) LIKE '%".$valueToSearch."%'";

    $search_result = filterTable($query,$db);
    
} else {
    $query         = "SELECT res_ID,
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
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '0' AND '1'";
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
	<title>view birth</title>
	
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
  

	

	<h2>&nbsp&nbsp&nbsp&nbsp&nbspNewborn Records</h2>
<center>
<form action="viewbirth.php" method="post">
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
<table width="95%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>First Name</strong></th><th><strong>Middle Name</strong></th><th><strong>Last Name</strong></th><th><strong>Date of Birth</strong></th><th><strong>Gender</strong></th><th><strong>Date of Recorded</strong></th></tr>
</thead>
<tbody>
	<?php 

$count=1;
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_assoc($result)) { 
  ?>
<tr>
	<td align="center"><?php echo $count ?></td>
	<td align="center"><?php echo $row["res_fName"]; ?></td>
	<td align="center"><?php echo $row["res_mName"]; ?></td>
	<td align="center"><?php echo $row["res_lName"]; ?></td>
	<td align="center"><?php echo $row["res_Bday"]; ?></td>
	<td align="center"><?php echo $row["gender_Name"]; ?></td>
	<td align="center"><?php echo $row["res_Date_Record"]; ?></td>
	

	</tr>

<?php $count++; }

?>
</table>
</center>
</div>
<br /><br /><br /><br />
</body>
</html>