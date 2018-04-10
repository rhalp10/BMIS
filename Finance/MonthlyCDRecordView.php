 <?php session_start();
include("dbcon.php");
$year = $_POST['yr'];
$month = $_POST['month'];
?>
<html>
<head>
<link href="Style.css" style="text/css" rel="stylesheet">

</head>
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

<body>

    		

		<section id="asd" class="asds">

	    <article>
<br>
<div class="head"><font size="5">Itemized Monthly Collection and Disbursement</font></div>
<br><br>
		
		
		
			<center>

<div class="fontstyle">Collection
</div>
<table border="2">
	

		<td><center>Date</center></td>
		<td><center>Particulars</center></td>
		<td><center>Amount</center></td>

	</tr>
	<tr>
	<?php
		
						include('dbcon.php');

						$res = mysqli_query($con, "SELECT * FROM `finance_collection` WHERE `collection_date` LIKE '$month%' AND `collection_date` LIKE '%$year'");

						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
					$tp += $row["collection_amount"];
								
							echo "<tr><td>".$row["collection_date"]."</td>
							<td>".$row["collection_particular"]."</td>
							<td>".$row["collection_amount"]."</td>
					</tr>";
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><tr>";
						
					?>
				</tr>
			</table>

			<br><br>
<div class="fontstyle">Disbursement
</div>
<table border="2">		
<tr>
		<td><center>Date</center></td>
		<td><center>Particulars</center></td>
		<td><center>Amount</center></td>
	</tr>
	<tr>
	<?php
						
						include('dbcon.php');
						$res = mysqli_query($con, "SELECT * FROM `finance_disbursement` WHERE `disbursement_date` LIKE '$month%' AND `disbursement_date` LIKE '%$year'");
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){
					$tp += $row["disbursement_amount"];
							echo "<tr><td>".$row["disbursement_date"]."</td>
							<td>".$row["disbursement_particular"]."</td>
							<td>".$row["disbursement_amount"]."</td>
					</tr>";
						}
						echo "<tr><td></td>
							<td>total</td>
							<td>".$tp."</td><tr>";
							

					?>				

				</tr>	

										
	
</table>
					
		
			</center>
            		

		</article>
        </section>


	
		
<body>
<html>