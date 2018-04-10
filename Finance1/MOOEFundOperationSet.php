	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance and Other Operating Expenses</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<br>

		<div class="head"><font size="5">Maintenance Fund Operation</font></div>
	<br><br>


	<center>
	<tr>
	<br><br><br><br>
		<td><div class="form-group col-md-4">
			<label for="mooe_id">Maintenance Type</label>
		<td>
			<?php
				include('dbcon.php');
				$query = $con->query("SELECT * FROM finance_fundoperation_mooe");
				$rowCount = $query->num_rows;
			?>
					<form action="MOOEFundOperationSetInsert.php" method="POST">
			<select name="mooe_id" class="form-control" >
				<option value="">SELECT EXPENSE</option>
				<?php
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
							session_start();
							echo '<option value="'.$row['mooe_id'].'">'.$row['mooe_type'].'</option>';
					
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
		<div class="form-group col-md-4">
			<label for="mooe_amount">Amount</label>
		<td><input type="number" class="form-control" name="mooe_amount" placeholder="Enter Expense Amount" required ></td>
	</div>
	</tr>

	<tr>
	<td>
		<div class="form-group col-md-4">
			<label for="mooe_year">Year</label>
		<td><input type="text" class="form-control" name="mooe_year" placeholder="Enter Year" required ></td>
	</div>
	</td>	
	</tr>
	
	<td><input type="submit" value="Submit" class="btn btn-success"></td>
	</td>
</td>
	</form>

	<br><br>
	<form action="MOOEFundOperationSetView.php" method="POST">
		<div class="form-group col-mid-3">
		<td><input type="submit" value="View" class="btn btn-success"></div></td>
	</form>

	</center>



	</body>
	</html>
