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

</head>
<body>	
<div class="head"><font size="5">Add Maintenance and Other Operating Expenses Type</font></div>
<br><br>
	<br>
<center>
	
	<form action="MOOEFundOperationInsert.php" method="POST">
		<td><div class="form-group col-lg-offset-4 col-md-4 ">
			<label for="mooe_code">MOOE Code</label>
	<input type="number" class="form-control" name="mooe_code" placeholder="Enter Account Code" required >
</div>

    <td><div class="form-group col-lg-offset-4 col-md-4 ">
      <label for="mooe_type">MOOE Type</label>
  <input type="text" class="form-control" name="mooe_type" placeholder="Enter Maintenance Type" required >
</div>

	<td><div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-success"></td>
</form>
<br><br>

<form action="MOOEFundOperationView.php" method="POST">
	<td><input type="submit" value="View List of Maintenance" class="btn btn-success"></td>
</form>
</center>

</body>
</html>
