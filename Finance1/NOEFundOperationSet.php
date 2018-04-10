	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Non-Office Expenditures</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<br>

		<div class="head"><font size="5">Non-Office Expenditure Fund Operation</font></div>
	<br><br>


	<center>
	<tr>
	<br>
		<td>

		<div class="form-group col-lg-offset-4 col-md-4">
			<label for="noe_id">Non-Office Expenditure Type</label>
		
			<?php
				include('dbcon.php');
				$query = $con->query("SELECT * FROM finance_fundoperation_noe");
				$rowCount = $query->num_rows;
			?>
					<form action="NOEFundOperationSetInsert.php" method="POST">
			<select name="noe_id" class="form-control" >
				<option value="">SELECT NON-OFFICE EXPENDITURE</option>
				<?php
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
							session_start();
							echo '<option value="'.$row['noe_id'].'">'.$row['noe_type'].'</option>';
					
						}
					}
					else{
						echo '<option value="">Not Available</option>';

					}
				?>
			</select>
		</td>
	</tr>
</div>

	<tr>
	<td>
		<div class="form-group col-lg-offset-4 col-md-4">
			<label for="noe_amount">Amount</label>
		<td><input type="number" class="form-control" name="noe_amount" placeholder="Enter Non-Office Expenditures Amount" required ></td>
	</div>
	</tr>

	<tr>
	<td>
		<div class="form-group col-lg-offset-4 col-md-4">
			<label for="noe_year">Year</label>
		<td><input type="number" class="form-control" name="noe_year" placeholder="Enter Year" required ></td>
	</div>
	</tr>
	<td><div class="clearfix" ></div>
	<td><input type="submit" value="Submit" class="btn btn-success"></td>
	</td>
</td>
	</form>

	<br><br>
	<form action="NOEFundOperationSetView.php" method="POST">
		<div class="form-group col-mid-3">
		<td><input type="submit" value="View" class="btn btn-success"></td>
	</form>

	</center>



	</body>
	</html>
