<?php

require('db.php');
if(isset($_POST['new']) && $_POST['new']==1)
{
$daterec = date("Y-m-d H:i:s");
$name = $_REQUEST['drug_name'];
$quantity = $_REQUEST['quantity'];
$res = $_REQUEST['resident_name'];

$ins_query= "insert into inventory_drugs_release (`drug_ID`,`res_ID`,`drgrelease_Qnty`,`drgrelease_Date_Record`) values ('$name','$res','$quantity','$daterec')";

mysqli_query($con, $ins_query) or die(mysql_error());

$dif= "select * from inventory_drugs where drug_ID = '".$name."' ";
$results = mysqli_query($con, $dif) or die ( mysqli_error());
$r = mysqli_fetch_assoc($results);
$drgQuan= $r['drug_Qnty'];

$res=$drgQuan-$quantity;
$update="update inventory_drugs set drug_Qnty='".$res."' where drug_ID='".$name."' ";
mysqli_query($con, $update) or die(mysqli_error());


}
?>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * From inventory_drugs_release INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID WHERE CONCAT(`drug_Name`,`res_fName`,`res_mName`,`res_lName`,`drgrelease_Qnty`,`drgrelease_Date_Record`) LIKE '%".$valueToSearch."%' order by inventory_drugs_release.drgrelease_ID" ;
    $search_result = filterTable($query);
} else {
    $query = "SELECT * From inventory_drugs_release INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID order by inventory_drugs_release.drgrelease_ID";
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

<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name of Drug: &nbsp&nbsp
	<input type="text" name="drug_name" id="search" list="datalist1" placeholder="Enter here..." required/>
<datalist id=datalist1>
<?php 
$count=1;
$sel_query="Select * from inventory_drugs ORDER BY drug_ID asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option><?php echo $row["drug_ID"]; ?><?php echo " "; ?> <?php echo $row["drug_Name"]; ?></option></optgroup>
<?php $count++; }
?></datalist>

&nbsp&nbsp&nbspQuantity:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="number" name="quantity" placeholder="Enter here..." required/>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDistributed to:&nbsp&nbsp
<input type="text" name="resident_name" id="search" list="datalist" placeholder="Enter here..." required/>
<datalist id=datalist>
<?php 
$count=1;
$sel_query= "SELECT * From resident_detail ORDER BY res_ID asc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option><?php echo $row["res_ID"]; ?><?php echo " ";?>  <?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?></option></optgroup>
<?php $count++; }
?></datalist>
<p>
&nbsp&nbsp&nbsp&nbsp&nbsp<input name="submit" type="submit" value="Submit"/></p>
</form>
  



<div id="header_container">		
		    <div class="container">
				<div id="header" class="row">	
				</div>
			</div>	
        </div>		
        <br>


 <form action="viewdrugrelease.php" method="post">

        	
 			<h2>&nbsp&nbsp&nbsp&nbsp&nbspDrug Distribution Records</h2>
            <p align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="valueToSearch" placeholder="Value To Search">
            &nbsp&nbsp&nbsp<input type="submit" name="search" value="Search" ></p>
      <center>
<table width="90%" border="2" style="border-collapse:collapse;">
<thead>
<tr><th><strong>No.</strong></th><th><strong>Name</strong></th><th><strong>Quantity</strong></th><th><strong>Resident's Name</strong></th><th><strong>Date Given</strong></th><th><strong></strong></th><th><strong></strong></th></tr>
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
<td align="center"><a style="color:BLUE;" href="editdrugrelease.php?id=<?php echo $row["drgrelease_ID"]; ?>">Edit</a></td>
	<td align="center"><a style="color:BLUE;" href="deletedrugrelease.php?id=<?php echo $row["drgrelease_ID"]; ?>">Delete</a></td>
	</tr>
<?php $count++; }

?>
</tbody>
</table>


<br /><br /><br /><br />
</center>
</body>
</html>
