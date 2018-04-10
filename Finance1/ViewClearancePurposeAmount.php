 <?php session_start();
include("dbcon.php");
?>
<html>
<head><link href="Style.css" style="text/css" rel="stylesheet">
 <br> 
<div class="head"><font size="5">Clearances Amount</div>
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
		<td><center>Clearance Form</center></td>
		<td><center>Purpose</center></td>
		<td><center>Amount</center></td>
		<td><center>Update</center></td>
		<td><center>Delete</center></td>

	</tr>
	<tr>
	<?php
		
					include('dbcon.php');


						$res = mysqli_query($con, "SELECT clearance_form,
							purpose,price, purpose_id FROM 
							finance_clearance_set, finance_clearance_list 
							WHERE finance_clearance_set.clearance_id=
							finance_clearance_list.clearance_id");
						
					while($row = mysqli_fetch_array($res)){?>
					<?php
						$id = $row["purpose_id"];
                        
							echo "<tr><td>".$row["clearance_form"]."<td>".$row["purpose"]."<td class='amount'>".number_format($row["price"],2)."</td>
					<td><center><a href='ClearanceSetUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
							<td><center><a href='ClearanceSetDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";			
						}	
						
					?>
				</tr>
			</table>

		</center>
            		

		</article>
        </section>



		
<body>
<html>