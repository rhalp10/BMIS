<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 <br>
<div class="head"><font size="5">Collection</font></div>
<br><br>

<center>
<form action="CollectionDisbursementView.php" method="POST">
	<td><div class="form-group col-lg-offset-3 col-md-3 ">
	<input type="text" class="form-control" id="year" name="year" required placeholder="Enter year"></td>
</div>

<td><div class="form-group col-md-3">
<select name="month" class="form-control">
	<option selected value="">-select month-</option>
						<option value="01">January
						</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
</select>
</div>
	<td><div class="clearfix"></div>
		<input type="submit" value="View Records" class="btn btn-success"></td>
</form>


<br><br><br>
<form action="CollectionInsertion.php" method="POST">
</br>

	<tr>
		<td><div class="clearfix"></div><div class="form-group col-md-4">
			<label for="col1">Date</label>
			<td><input type="date" class="form-control" size="50" id="col1" name="col1" required></td>
		</div>

		<td><div class="form-group col-md-4">
			<label for="col2">Particular</label>
			<td><input type="text" class="form-control" size="50" id="col2" name="col2" required></td>
		</div>

		<td><div class="form-group col-md-4">
			<label for="col3">Amount</label>
			<td><input type="number" class="form-control" size="50" id="col3" name="col3" required></td>
		</div>
	</tr>
	
	<td><input type="submit" value="Submit" class="btn btn-success"></td>


</center>
</form>
</div>
</body>
</html>