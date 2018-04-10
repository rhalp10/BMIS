 <?php session_start();
include("dbcon.php");
$year = $_POST['year'];
$month = $_POST['month'];
?>
<html>
<head>

	<title>Collection and Disbursement Records</title>

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


td.amount{
	text-align: right;
}
</style>

<body>

    		

		<section id="asd" class="asds">

	    <article>
	
<br><br>
<center>
<div class="head"><font size="5">Itemized Monthly Collection and Disbursement</font></div>
<br><br>
<div class="fontstyle">Collection
</div>
<table border="2">
	<tr>
		<td><center>Date</center></td>
		<td><center>Particulars</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>



	</tr>

	<tr>
	<?php
		
						include('dbcon.php');

						$res = mysqli_query($con, "SELECT * FROM `finance_collection` WHERE `collection_date` LIKE '$year-$month%'");

						$tp = 0;
										
					while($row = mysqli_fetch_assoc($res)){?>
					<?php
					$tp += $row["collection_amount"];
								
						
							$id = $row["collection_id"];
							echo "<tr><td>".$row["collection_date"]."</td>
							<td>".$row["collection_particular"]."</td>
							<td class='amount'>".number_format($row["collection_amount"],2)."</td>

					<td><center><a href='CollectionUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='CollectionDelete.php?id=$id'><button class='btn btn-success'> DELETE </button></a></td></tr><center>";


						}
						echo "<tr><td></td>
							<td>total</td>
							<td class='amount'>".number_format($tp,2)."</td><td></td><td></td><tr>";
						
			?>		
				</tr>
			</table>
<table border="2">	

<br><br>	
<div class="fontstyle">Disbursement
</div>
	<tr>
		
		<td>Date</td>
		<td>Particulars</td>
		<td>Amount</td>
		<td>Update</td>
		<td>Delete</td>
	</tr>
	<tr>
	<?php
						
						include('dbcon.php');
						$res = mysqli_query($con, "SELECT * FROM `finance_disbursement` WHERE `disbursement_date` LIKE '$year-$month%'");
						$tp = 0;				
					while($row = mysqli_fetch_array($res)){?>
					<?php
					$tp += $row["disbursement_amount"];


							$id = $row["disbursement_id"];
							echo "<tr><td>".$row["disbursement_date"]."</td>
							<td>".$row["disbursement_particular"]."</td>
							<td class='amount'>".number_format($row["disbursement_amount"],2)."</td>
				
					<td><center><a href='DisbursementUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td></center>
							<td><center><a href='DisbursementDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr></center>";

						}
						echo "<tr><td></td>
							<td>total</td>
							<td class='amount'>".number_format($tp,2)."</td><td></td><td></td><tr>";

					?>				

				</tr>	

										
	
</table>
					
		
			</center>
            		

		</article>
        </section>
</font>

	
		
<body>
<html>