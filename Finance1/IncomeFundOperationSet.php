	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Income</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<br>

		<div class="head"><font size="5">Income</font></div>
	<br><br>


	<center>
	<tr>
	<br><tr>
	<td>
		<div class="form-group col-lg-offset-4 col-md-5">
			<label for="income_id">Income Type</label>
	
	</div>
	</td>	
	</tr>
		<td>
			<?php
				include('dbcon.php');
				$query = $con->query("SELECT * FROM finance_fundoperation_income");
				$rowCount = $query->num_rows;
			?>
			<center>
			<div class="form-group col-lg-offset-4 col-md-5">
					<form action="IncomeFundOperationSetInsert.php" method="POST">
			<select name="income_id" class="form-control" >
				<option value="">SELECT INCOME</option>
				<?php
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
							session_start();
							echo '<option value="'.$row['income_id'].'">'.$row['income_type'].'</option>';
					
						}
					}
					else{
						echo '<option value="">Not Available</option>';

					}
					
				?>
			</select>
			</center>
		</td>
	</tr>

	
	<td>
		<div class="form-group col-lg-offset-4 col-md-5">
			<label for="income_amount">Amount</label>
		<td><input type="number" class="form-control" name="income_amount" placeholder="Enter Income" required ></td>
	</div>
	</td>

	<tr>
	<td>
		<div class="form-group col-lg-offset-4 col-md-5">
			<label for="income_year">Year</label>
		<td><input type="number" class="form-control" name="income_year" placeholder="Enter Year" required ></td>
	</div>
	</td>	
	</tr>
	<td><div class="clearfix"></div>
	<td><input type="submit" value="Submit" class="btn btn-success"></td>
	</td>
</td>
	</form>

	<br><br>
	<form action="IncomeFundOperationSetView.php" method="POST">
		<div class="form-group col-mid-3">
		<td><input type="submit" value="View" class="btn btn-success"></td>
	</form>

	</center>



	</body>
	</html>
