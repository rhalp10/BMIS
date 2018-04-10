<?php 
session_start();
 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection Update</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
		<section id="asd" class="asds">

	    <article>
				
			
			
			<center>
			<form method="post" action="DisbursementUpdateExec.php">
				<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tbody>
							
							
		<?php
			include('dbcon.php');
			$id = $_GET["id"];
			$query =mysqli_query($con, "SELECT * FROM finance_disbursement WHERE disbursement_id = '$id'");
			$row=mysqli_fetch_assoc($query);
		?>


			<tr>
				<td><div class="form-group col-md-4">
					<label for="disbursement_id">Disbursement ID</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required name="disbursement_id"></td>
			</div>
			</tr>
			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="disbursement_date">Date</label>
				<td><input type="date" class="form-control" readonly value="<?php echo $row["disbursement_date"]; ?>" required name="disbursement_date">
			</div>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="disbursement_particular">Particular</label>
				<td><input type="text" class="form-control" value="<?php echo $row["disbursement_particular"]; ?>" required name="disbursement_particular"></td>
			</div>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="disbursement_amount">Amount</label>
				<td><input type="number" class="form-control" value="<?php echo $row["disbursement_amount"]; ?>" required name="disbursement_amount"></td>
			</tr>
			<br>


				<td></td>
				<td><input type="submit" value="Update"class="btn btn-success"></td>
			</tr>
		</table>	
	</form>	
					
			</center>
		

            		

		</article>
        </section>
		
		
	</div>

</body>
</html>
		
							
							
							
		
