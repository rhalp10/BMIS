<?php

 
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
<a href="viewbdf.php">barangay Development Funds</a> | <a href="viewbdf.php">barangay Development Funds</a> | <a href="viewsk.php">Sangguniang Kabataan Funds</a>


<div class="form">
<h2 align="center">Annual Barangay Youth Investment Plan</h2>
<p align="left">Total Barangay Budget&nbsp&nbsp&nbsp&nbsp_______________________________</p>
<p align="left">Beginning SK FUND&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp_______________________________</p>
<p align="left">10% SK FUND
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp													_______________________________</p>


<table width="100%" border="2" style="border-collapse:collapse;">

<thead>
                    <tr width="100%">
                        <th width="10%">GAPS/ISSUES</th>
                        <th width="10%">PROGRAMS/PROJECTS/ACTIVITIES</th>
                        <th width="10%">RESULT TARGET/BENEFICIARIES</th>           
                        <th width="10%">TOTAL PROJECT COST</th>
                        <th width="10%"></th> 
                        <th width="10%">PERIOD OF IMPLEMENTATION</th>

</thead>
<tbody>
<th width="10%"></th>
<th width="10%"></th>
<th width="10%"></th>           
<th width="10%">Amount</th>                     
<th width="10%">Source</th>                      
<th width="10%"></th>

</tbody>
<?php
$count=1;
$sel_query="Select * from youth_investment where year = (SELECT MAX(year) from annual_project) ORDER BY youth_id desc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result))
	{?>
<tr>
	<td align="center"><?php echo $row["issues"]; ?></td>
	<td align="center"><?php echo $row["programs"];?></td>
	<td align="center"><?php echo $row["result"];?></td>
	<td align="right"><?php echo $row["amount"]; ?></td>
	<td align="center"><?php echo $row["source"]; ?></td>
	<td align="center"><?php echo $row["start"]; ?> - <?php echo $row["end"] ; ?></td>
	
	</tr>
<?php $count++; }

  $add=mysqli_query($con,'SELECT SUM(amount) from `youth_investment` Where year = (SELECT MAX(year) from youth_investment);');
  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(amount)'];
?>
                                    <tr> <th width="auto"></th>
                                         <th width="10%">     
                                         </th>
                                         <th width="auto">Total Projects Cost:</th>
                                         <th width="10%">
                                         <?php echo $total ?>
                                       	 </th>
                                         <th width="auto"></th>
                                         <th width="10%">
                                    </tr>
</tbody>
</table>
    <?php } ?>
</div>
</body>
</html>