?php

 
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
</head>
<body>
<div class="form" align="Center">
<h3> Barangay Special Project Plan</h3>
<a href="dashboard.php">Admin</a> |
<a href="AnnualBarangayYouth.php">Annual Barangay Youth Investment Plan</a> |
<a href="AnnualProcurementPlan.php">Annual Procurement Plan</a>
<a href="viewbdf.php">Barangay Development Funds</a> | <a href="viewsk.php">Sangguniang Kabataan Funds</a>



<div class="form">

<h2 align="center">Annual Procurement Plan</h2>

<table width="100%" border="2" style="border-collapse:collapse;">
<thead><th><strong>Name Of Barangay: </strong></th>
<th><strong>&nbsp</strong>	<th><strong>&nbsp</strong>
<th><strong>&nbsp</strong>	<th><strong>&nbsp</strong>

</tr>

</thead>

<thead><th><strong>Program Control No: </strong></th>
<th><strong>Planned Amount: </strong></th>
<th><strong></strong>
<th><strong></strong>
<th><strong></strong>


<thead>
<th><strong>Department Office: </strong></th>
<th><strong>Regular </strong></th>
<th><strong>Contigency </strong></th>
<th><strong>Total </strong></th>
<th><strong>DATE SUBMITED: </strong></th>

</tr>

<table width="100%" border="2" style="border-collapse:collapse;">
	
<tr><th><strong>Item No.</strong></th>
<th><strong>Description</strong></th>
<th><strong>Unit Cost</strong></th>
<th><strong>QTY</strong></th>
<th><strong>Unit</strong></th>
<th><strong>Total Cost</strong></th>
<th><strong></strong></th>
<th><strong>Distribution</strong>


<th><strong></strong><th><strong>&nbsp</strong>
<th><strong> </strong></th>	<th><strong> </strong></th>
<th><strong> </strong></th>	<th><strong> </strong></th>


<tr><th><strong>&nbsp</strong><th>
<strong></strong><th><strong></strong>
<th><strong></strong><th><strong></strong>
<th><strong></strong>

<th><strong>1st Quarter </strong></th><th><strong> </strong></th>
<th><strong>2nd Quarter </strong></th><th><strong></strong></th>
<th><strong>3rd Quarter </strong></th><th><strong></strong></th>
<th><strong>4th Quarter </strong></th><th><strong></strong></th>


<tr><th><strong>&nbsp</strong><th><strong>&nbsp</strong><th><strong>&nbsp</strong><th><strong>&nbsp</strong><th><strong>&nbsp</strong><th><th><strong>QTY </strong></th><th><strong>Amount</strong></th><th><strong>QTY </strong></th><th><strong>Amount</strong></th><th><strong>QTY </strong></th><th><strong>Amount</strong></th><th><strong>QTY </strong></th><th><strong>Amount</strong></th>
<tbody>
<?php
$count=1;
$sel_query="Select * from annual_procurement ORDER BY id desc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
	<td align="center"><?php echo $row["item"]; ?></td>
	<td align="center"><?php echo $row["des"];?></td>
	<td align="center"><?php echo $row["ucost"]; ?></td>
	<td align="center"><?php echo $row["qty"]; ?></td>
	<td align="center"><?php echo $row["unit"]; ?></td>


<?php
  $add=mysqli_query($con,'SELECT SUM(amount) from `youth_procurement`;');
  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(amount)'];
?>
                                    <tr>
                                        <th width="auto">Total Projects Cost:</th>
                                        <th width="10%">
                                            <?php echo $total ?>
                                        </th>
                                    </tr>
                                    <?php } ?>



</thead>
	</tr>
<?php $count++; } ?>
</tbody>
</table>

<p align="left">Prepared by:

<p align="left">Lorna V. Panganiban</p>
<h5 align="left"> Barangay Treasurer</h6>
</div>
</body>
</html>