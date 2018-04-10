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

</head>
<body>	
  <form action="IncomeFundOperationInsert.php" method="POST">
<div class="head"><font size="5">Add Income Type</font></div>
<br><br>
	<br>
<center>
	
	<form action="IncomeFundOperationInsert.php" method="POST">
		<td><div class="form-group col-lg-offset-4 col-md-4 ">
			<label for="income_code">Income Code</label>
	<input type="number" class="form-control" name="income_code" placeholder="Enter Account Code" required >
</div>

    <td><div class="form-group col-lg-offset-4 col-md-4 ">
      <label for="income_type">Income Type</label>
  <input type="text" class="form-control" name="income_type" placeholder="Enter Income Type" required >
</div>

	<td><div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-success"></td>
</form>
<br><br>

<form action="IncomeFundOperationView.php" method="POST">
	<td><input type="submit" value="View Sources of Income" class="btn btn-success"></td>

</center>

</body>
</html>
