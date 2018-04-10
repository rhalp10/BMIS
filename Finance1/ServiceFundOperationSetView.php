 <?php session_start();
include("dbcon.php");
?>
<html>
<head><link href="Style.css" style="text/css" rel="stylesheet">
 <br> 
<div class="head"><font size="5">Fund Operation Services</div>
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
		<td><center>Position</center></td>
		<td><center>Amount</center></td>
		<td><center>Year</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>

	</tr>
	<tr>
	<?php
		
					include('dbcon.php');


						$res = mysqli_query($con, "SELECT finance_fundoperation_ps.service_type, finance_fundoperation_psset.service_position, finance_fundoperation_psset.service_amount, finance_fundoperation_psset.service_year,finance_fundoperation_psset.service_setid,finance_fundoperation_ps.service_id FROM finance_fundoperation_ps INNER JOIN finance_fundoperation_psset
							WHERE finance_fundoperation_ps.service_id=
							finance_fundoperation_psset.service_id");
							
					while($row = mysqli_fetch_array($res)){?>
					<?php
						$id = $row["service_setid"];
                        
							echo "<tr><td>".$row["service_type"]."<td>".$row["service_position"]."<td class='amount'>".number_format($row["service_amount"],2)."<td>".$row["service_year"]."</td>
					<td><center><a href='ServiceFundOperationSetUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='ServiceFundOperationSetDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";			
						}	
						
					?>
				</tr>
			</table>

		</center>
            		

		</article>
        </section>



		
<body>
<html>