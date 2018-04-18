<?php

require('db.php');

$id=$_REQUEST['id'];
$query = "SELECT * from inventory_drugs where drug_ID='".$id."'"; 
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
$name =$_REQUEST['name'];
$quantity =$_REQUEST['quantity'];
$description =$_REQUEST['description'];
$update="update inventory_drugs set drug_Name='".$name."', drug_Description='".$description."', drug_Qnty='".$quantity."' where drug_ID='".$id."' ";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:blue;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['drug_ID'];?>" />
Drug name
<p><input type="text" name="name" placeholder="Enter here..." required value="<?php echo $row['drug_Name'];?>" /></p>
Quantity
<p><input type="text" name="quantity" placeholder="Enter here..." required value="<?php echo $row['drug_Qnty'];?>" /></p>
Description
<p><input type="text" name="description" placeholder="Enter here.." required value="<?php echo $row['drug_Description'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />

</div>
</div>
</body>
</html>
