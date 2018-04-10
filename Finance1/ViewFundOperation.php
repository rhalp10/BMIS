<?php session_start();
$year = $_POST['year'];
?>
<html>
<head>
<link href="Style.css" style="text/css" rel="stylesheet">

</head>
<body>
 
<style>
table{
	border-collapse: collapse;
	width:50%;
}
th,td{
	text-align:left;
	padding:5px;
}

tr:nth-child(even){ background-color:#f2f2f2;}
</style>

		<section id="finance" class="module">

	    <article>
			
		
			<center>

<br>
<div class="head"><font size="5">STATEMENT OF FUND OPERATION</font></div>
<br><br>


<?php
echo "CY ";
echo $year
?>
<br><br>
<div class="fontstyle">Income
</div>
<form><table border="2">
	<tr>
		<td><center>Particulars</center></td>
		<td><center>Account</center><br><center>Classification</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>
	</tr>
	<tr>
	<?php
						
				include('dbcon.php');

						$query = "SELECT * FROM `finance_income` WHERE `income_year`LIKE '%$year%'";
						$res = mysqli_query($con,$query);
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
							$tp += $row["income_amount"];

							$id = $row["income_id"];
							echo "<tr>
							<td>".$row["income_particular"]."</td>
							<td>".$row["income_code"]."</td>
							<td>".$row["income_amount"]."</td>
							
							<td><center><a href='FinanceIncomeUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td></center>
							<td><center><a href='FinanceIncomeDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr></center>";
									
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><td></td><td></td><tr>";
					?>
				</tr>

				<br>
</table>
<br>
<br>
<div class="fontstyle">Personal Services
</div>
<table border="2">
	<tr>
		<td><center>Particulars</center></td>
		<td><center>Account</center><br><center>Classification</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>
	</tr>
	<tr>
	<?php
						
				include('dbcon.php');

						$query = "SELECT * FROM `finance_personalservices` WHERE `ps_year`LIKE '%$year%'";
						$res = mysqli_query($con,$query);
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
							$tp += $row["ps_amount"];
								
							$id = $row["ps_id"];
							echo "<tr>
							<td>".$row["ps_particular"]."</td>
							<td>".$row["ps_code"]."</td>
							<td>".$row["ps_amount"]."</td>
							<td><center><a href='FinancePersonalServicesUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td></center>
							<td><center><a href='FinancePersonalServicesDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr></center>";
									
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><td></td><td></td><tr>";
					?>
				</tr>

				<br>
</table>
<br>
<br><div class="fontstyle">Maintenance and Other Operating Expenses
</div>

<table border="2">
	<tr>
		<td><center>Particulars</center></td>
		<td><center>Account</center><br><center>Classification</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>
	</tr>
	</tr>
	<tr>
	<?php
						
						include('dbcon.php');

						$query = "SELECT * FROM `finance_mooe` WHERE `mooe_year` LIKE '%$year%'";
						$res = mysqli_query($con,$query);
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
							$tp += $row["mooe_amount"];
								
							$id = $row["mooe_id"];
							echo "<tr>
							<td>".$row["mooe_particular"]."</td>
							<td>".$row["mooe_code"]."</td>
							<td>".$row["mooe_amount"]."</td>
							<td><center><a href='FinanceMOOEUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td></center>
							<td><center><a href='FinanceMOOEDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr></center>";
									
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><td></td><td></td><tr>";
					?>
				</tr>

				<br>
</table>
<br>
<br><div class="fontstyle">Non-Office Expenditures
</div>

<table border="2">
	<tr>
		<td><center>Particulars</center></td>
		<td><center>Account</center><br><center>Classification</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>
	</tr>
	<tr>
	<?php
						
						include('dbcon.php');

						$query = "SELECT * FROM `finance_noe` WHERE `noe_year` LIKE '%$year%'";
						$res = mysqli_query($con,$query);
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
							$tp += $row["noe_amount"];
								
							$id = $row["noe_id"];
							echo "<tr>
							<td>".$row["noe_particular"]."</td>
							<td>".$row["noe_code"]."</td>
							<td>".$row["noe_amount"]."</td>
							<td><center><a href='FinanceNOEUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='FinanceNOEDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";
									
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><td></td><td></td><tr>";
									
					?>
				</tr>

				<br>
</table>
					
					
			</center>
            		

		</article>
        </section>
		
<body>
<html>