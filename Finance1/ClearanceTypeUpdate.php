<?php 
session_start();
 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clearance Update</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<br><br>
<div class="head"><font size="5">Clearance Update</font></div>
<br><br>


		<section id="asd" class="asds">

	    <article>
				
			
			
			<center>
			<form method="post" action="ClearanceTypeUpdateExec.php">
				<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tbody>
							
							
		<?php
			include('dbcon.php');
			$id = $_GET["id"];
			$query =mysqli_query($con, "SELECT * FROM `finance_clearance_list` WHERE `clearance_id` = '$id'");
			$row=mysqli_fetch_assoc($query);
		?>



			<tr>
				<td><div class="form-group col-md-4">
					<label for="clearance_id">Clearance ID</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required name="clearance_id" size="50"></td>
			</div>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="clearance_form">Clearance Form</label>
				<td><input type="text" class="form-control" value="<?php echo $row["clearance_form"]; ?>" required name="clearance_form" size="50">
			</tr>
			<br>


				<td></td>
				<td><input type="submit" value="Update" class="btn btn-success"></td>
			</tr>
		</table>	
	</form>	
</font>		
			</center>
		

            		

		</article>
        </section>
		
		
	</div>

</body>
</html>
		
							
							
							
		
