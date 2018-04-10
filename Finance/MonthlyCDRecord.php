<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<body><br>
<br>
<br>
<div class="head"><font size="5">Itemized Monthly Collection and Disbursement:</font></div>
<br><br>
<body>
<center>
<form action="MonthlyCDRecordView.php" method="POST">
	<td><div class="form-group col-lg-offset-4 col-md-4 ">
	<label for="date">Enter Year</label>
	<input type="number" id="yr" class="form-control" name="yr" required placeholder="Enter year">
</div>
<td>
<br>
<div class="clearfix"></div>
<div class="form-group  col-lg-offset-4 col-md-4">
      <label for="month">Month</label>
<select name="month">
	<option selected value="" class="form-control">-select month-</option>
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
						</optgroup>
</select>
<br>
<div class="clearfix"></div>
	<td><input type="submit" value="Submit" class="btn btn-success"></td>

</form>

</htmL>