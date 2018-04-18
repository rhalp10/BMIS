<?php

require('db.php');

$id=$_GET['id'];

$query = "SELECT * From resident_detail INNER JOIN resident_pregnant ON resident_detail.res_ID= resident_pregnant.res_ID where preg_ID='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
</head>
<body>
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
<center><div class="borderMethod">

<h1>Update Record</h1>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) 	
{
$id=$_REQUEST['id'];
$name =$_REQUEST['resident_name'];
$pdate =$_REQUEST['pdate'];
$ldate =$_REQUEST['ldate'];
$update="update resident_pregnant set res_ID='".$name."',preg_Date='".$pdate."', preg_Labor='".$ldate."' where preg_ID='".$id."' ";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='viewpregnant.php'>View Updated Record</a>";
echo '<p style="color:blue;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['preg_ID'];?>" />
Resident's Name:
<p> <input type="text" name="resident_name" id="search" list="datalist1" value="<?php echo $row["res_ID"]; ?><?php echo " "; ?><?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?>" required/>
<datalist id=datalist1>
<?php 
$count=1;
$sel_query="Select * from resident_detail WHERE gender_ID='2' ORDER BY res_ID asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<optgroup>
<option><?php echo $row["res_ID"]; ?><?php echo " "; ?><?php echo $row["res_fName"]; ?><?php echo " "; ?><?php echo $row["res_mName"]; ?><?php echo " "; ?><?php echo $row["res_lName"]; ?></option></optgroup>
<?php $count++; }
?></datalist></p>

<?php
$id=$_GET['id'];
$query = "SELECT * from resident_pregnant where preg_ID='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
Date of Pregnant:
<p><input id="pdate" type="date" name="pdate" required value="<?php echo $row['preg_Date'];?>" /></p>
Date of Labor:
<p><input id="ldate" type="date" name="ldate" required value="<?php echo $row['preg_Labor'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />

</div>
</div>
</body>
</html>
