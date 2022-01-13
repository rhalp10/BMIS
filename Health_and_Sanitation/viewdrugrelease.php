<?php

require('db.php');
if(isset($_POST['new']) && $_POST['new']==1)
{
$daterec = date("Y-m-d H:i:s");
$name = $_REQUEST['drug_name'];
$quantity = $_REQUEST['quantity'];
$res = $_REQUEST['resident_name'];

$qq="SELECT * from inventory_drugs where drug_ID='".$name."'";
$resu = mysqli_query($db, $qq) or die ( mysqli_error($db));
$r = mysqli_fetch_assoc($resu);
$numQ=$r['drug_Qnty'];

if ($numQ>=$quantity)
{
$ins_query= "insert into inventory_drugs_release (`drug_ID`,`res_ID`,`drgrelease_Qnty`,`drgrelease_Date_Record`) values ('$name','$res','$quantity','$daterec')";
mysqli_query($db, $ins_query) or die(mysqli_error($db));

$dif= "select * from inventory_drugs where drug_ID = '".$name."' ";
$results = mysqli_query($db, $dif) or die ( mysqli_error($db));
$r = mysqli_fetch_assoc($results);
$drgQuan= $r['drug_Qnty'];

$res=$drgQuan-$quantity;
$update="update inventory_drugs set drug_Qnty='".$res."' where drug_ID='".$name."' ";
mysqli_query($db, $update) or die(mysqli_error($db));
}
else
{
	echo "<script>alert('Not enough drugs');document.location='viewdrugrelease.php'</script>";

}
}

?>

<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * From inventory_drugs_release INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID WHERE CONCAT(`drug_Name`,`res_fName`,`res_mName`,`res_lName`,`drgrelease_Qnty`,`drgrelease_Date_Record`) LIKE '%".$valueToSearch."%' order by inventory_drugs_release.drgrelease_ID" ;
    $search_result = filterTable($query,$db);
} else {
    $query = "SELECT * From inventory_drugs_release INNER JOIN resident_detail ON inventory_drugs_release.res_ID= resident_detail.res_ID INNER JOIN inventory_drugs ON inventory_drugs_release.drug_ID= inventory_drugs.drug_ID order by inventory_drugs_release.drgrelease_ID";
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
<title>View Records</title>

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
$result = mysqli_query($db,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option><?php echo"<td align='center'><font color=white>".$row['drug_ID']."</font></td>"; ?><?php echo " "; ?> <?php echo $row["drug_Name"]; ?></option></optgroup>
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
$result = mysqli_query($db,$sel_query);
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


<script>
function deleletconfig(){

var del=confirm("Are you sure you want to delete this record?");
if (del==true){
   alert ("record deleted")
}
return del;
}
</script>
<?php 

$count=1;

while($row = mysqli_fetch_assoc($search_result)) { 
echo "<tr>
	<td align='center'>" .$count. "</td>";
	echo"<td align='center'>"  .$row['drug_Name']. "</td>";
	echo"<td align='center'>" .$row["drgrelease_Qnty"]. "</td>";
	echo"<td align='center'>" .$row["res_fName"].  " "   .$row["res_mName"]. " " .$row["res_lName"]. "</td>";
	echo"<td align='center'>" .$row["drgrelease_Date_Record"]. "</td>";
	echo "<td><a style='text-decoration:none;color: blue' href='edit.php?id=".$row['drug_ID']."'>Edit</a></td>";
	echo "<td><a style='text-decoration:none;color: blue' onclick='return deleletconfig()' href='deletedrugrelease.php?id=".$row['drug_ID']."'>Delete</a></td> </tr>";
	
	?>
<?php $count++; }

?> 

</tbody>
</table>
 <h2 align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="print2.php" style="text-decoration:none;color: blue">Print in PDF</a></h2>

<br /><br /><br /><br />
</center>
</body>
</html>
