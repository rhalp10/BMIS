 <?php session_start();
include("dbcon.php");
?>
<html>
<head><link href="Style.css" style="text/css" rel="stylesheet">
 <br> 
<div class="head"><font size="5">Income</div>
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


td.amount{
	text-align: right;
}
</style>
	

		<section id="asd" class="asds">

	    <article>
				
			<center>
<table border="2">
	<tr>
	</tr>
	<tr><br>
		<td><center>Type</center></td>
		<td><center>Account Code</center></td>
		<td><center>Amount</center></td>
		<td><center>Year</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>
	</tr>
	<tr>
	<?php
		
					include('dbcon.php');


						$res = mysqli_query($con, "SELECT finance_fundoperation_income.income_type,
							finance_fundoperation_income.income_code, finance_fundoperation_incomeset.income_amount, finance_fundoperation_incomeset.income_setid,finance_fundoperation_incomeset.income_year,finance_fundoperation_income.income_id FROM finance_fundoperation_income INNER JOIN finance_fundoperation_incomeset
							WHERE finance_fundoperation_income.income_id=
							finance_fundoperation_incomeset.income_id");
							
					while($row = mysqli_fetch_array($res)){?>
					<?php
						$id = $row["income_setid"];
                        
							echo "<tr><td>".$row["income_type"]."<td>".$row["income_code"]."<td class='amount'>".number_format($row["income_amount"],2)."<td>".$row["income_year"]."</td>
					<td><center><a href='IncomeFundOperationSetUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='IncomeFundOperationSetDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";			
						}	
						
					?>
				</tr>
			</table>

		</center>
            		

		</article>
        </section>



		
<body>
<html>