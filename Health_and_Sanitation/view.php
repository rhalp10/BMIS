<?php

require('db.php');
if(isset($_POST['new']) && $_POST['new']==1)
{
$name = $_REQUEST['name'];
$quantity = $_REQUEST['quantity'];
$description = $_REQUEST['description'];
$date = $_REQUEST['exp'];
$ins_query= "INSERT into inventory_drugs (drug_Name,drug_Qnty,drug_Description,drug_Expiration_Date) values ('$name','$quantity','$description','$date')";
mysqli_query($con, $ins_query) or die("ERROR");
}
?>



<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `inventory_drugs` WHERE CONCAT(`drug_Name`,`drug_Qnty`,`drug_Description`,`drug_Expiration_Date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
} else {
    $query         = "SELECT * FROM `inventory_drugs` ORDER by drug_ID desc;";
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
        <h2> &nbsp&nbsp&nbsp&nbsp&nbspInsert New Record </h2>
<form name="form" method="post" action=""  > 
<input type="hidden" name="new" value="1" />

<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspName of Drug: &nbsp<input type="text" name="name" placeholder="Enter here..." required />
Description:&nbsp
<input type="text" name="description" placeholder="Enter here..." required />
&nbsp&nbspQuantity: &nbsp&nbsp&nbsp
<input type="number" name="quantity" placeholder="Enter here..." required/>
</p>
<p>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspExpiration Date: &nbsp&nbsp&nbsp
<input type="date" name="exp" placeholder="Enter here..." required/>
</p>

&nbsp&nbsp&nbsp<input name="submit" type="submit" value="Submit"/>
</form>
       



<div id="header_container">		
		    <div class="container">
				<div id="header" class="row">	
				</div>
			</div>	
        </div>		
        <br>


 <form action="view.php" method="post">

        	
 			<h2>&nbsp&nbsp&nbsp&nbsp&nbspDrug Inventory Records</h2>
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
        
 <center>
<table width="90%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Name</strong></th><th><strong>Quantity</strong></th><th><strong>Description</strong></th><th><strong>Expiration Date</strong></th><th><strong></strong></th><th><strong></strong></th></tr>
</thead>

<tbody>
<?php 
$count=1;
while($row = mysqli_fetch_assoc($search_result)) { ?>
<tr>
	<td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["drug_Name"]; ?></td>
	<td align="center"><?php echo $row["drug_Qnty"]; ?></td>
	<td align="center"><?php echo $row["drug_Description"]; ?></td>
	<td align="center"><?php echo $row["drug_Expiration_Date"]; ?></td>
	<td align="center"><a style="color:BLUE;" href="edit.php?id=<?php echo $row["drug_ID"]; ?>">Edit</a></td>
	<td align="center"><a style="color:BLUE;" href="delete.php?id=<?php echo $row["drug_ID"]; ?>">Delete</a></td>
	</tr>
<?php $count++; }

?>
</tbody>
</table>


<br /><br /><br /><br />
</center>
</body>
</html>
