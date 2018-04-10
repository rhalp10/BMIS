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

</head>
<body>	
<div class="head"><font size="5">Add Clearance</font></div>
<br><br>
	<br>
<center>
	
	<form action="ClearanceTypeInsert.php" method="POST">
		<td><div class="form-group col-lg-offset-4 col-md-4 ">
			<label for="Clearance">Clearance Type</label>
	<input type="text" class="form-control" name="Clearance" placeholder="Enter Clearance Type" required >
</div>
</tr>

	<td><div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-success"  style="background-color: #14aa6c !important;"></td>
</form>
<br><br>

<form action="ViewClearanceList.php" method="POST">
	<td><input type="submit" value="View List of Clearances" class="btn btn-success"></td>
</form>
</center>

</body>
</html>
