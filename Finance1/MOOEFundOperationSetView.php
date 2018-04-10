 <?php session_start();
include("dbcon.php");
?>
<html>
<head><link href="Style.css" style="text/css" rel="stylesheet">
 <br> 
<div class="head"><font size="5">Maintenance and Other Operating Expenses</div>
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


						$res = mysqli_query($con, "SELECT finance_fundoperation_mooe.mooe_type,
							finance_fundoperation_mooe.mooe_code, finance_fundoperation_mooeset.mooe_amount, finance_fundoperation_mooeset.mooe_year,finance_fundoperation_mooe.mooe_id, finance_fundoperation_mooeset.mooe_setid FROM finance_fundoperation_mooe INNER JOIN finance_fundoperation_mooeset
							WHERE finance_fundoperation_mooe.mooe_id=
							finance_fundoperation_mooeset.mooe_id");
							
					while($row = mysqli_fetch_array($res)){?>
					<?php
						$id = $row["mooe_setid"];
                        
							echo "<tr><td>".$row["mooe_type"]."<td>".$row["mooe_code"]."<td class='amount'>".number_format($row["mooe_amount"],2)."<td>".$row["mooe_year"]."</td>
					<td><center><a href='MOOEFundOperationSetUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='MOOEFundOperationSetDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";			
						}	
						
					?>
				</tr>
			</table>

		</center>
            		

		</article>
        </section>



		
<body>
<html>