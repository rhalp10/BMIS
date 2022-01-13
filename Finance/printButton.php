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
	    <link href="Style.css" type="text/css" rel="stylesheet">

	    </head>

	    <body><br>

	        </div>
	        <br>
	        <div class="head">
	            <font size="5">Print Records</font>
	        </div>
	        <br><br>
	        <center>

	            <h3>
	                <div class="fontstyle">Fund Operation</div>
	            </h3>
	            <form action="printFundOperation.php" target="Fradisplay" method="GET">
	                <tr>
	                    <td>
	                        <div class="form-group col-lg-offset-4 col-md-4"></div>
	                        <div class="form-group col-lg-offset-4 col-md-4">
	                            <label for="year"></label>
	                    <td><?php
				include('dbcon.php');
				$query = $db->query("SELECT DISTINCT income_year FROM finance_fundoperation_incomeset ORDER BY income_year DESC");
				$rowCount = $query->num_rows;
			?>
	                        <form action="ViewFundOperation.php" method="POST">
	                            <select name="year" class="form-control">
	                                <option value="">Select Year with Available Records</option>
	                                <?php
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
							echo '<option value="'.$row['income_year'].'">'.$row['income_year'].'</option>';
					
						}
					}
					else{
						echo '<option value="">No Records Available</option>';

					}
				?>
	                            </select>
	                    </td>
	                    </div>
	                </tr>
	                <div class="clearfix"></div>
	                <td><input type="submit" name="submit" value="Print" class="btn btn-success" target="Fradisplay"></td>

	            </form>

	            <h3>
	                <div class="fontstyle">Itemized Monthly Collection and Disbursement</div>
	            </h3>

	            <form action="printCollectionDisbursement.php" target="Fradisplay" method="GET">
	                <tr>
	                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	                        rel="stylesheet">
	                    <link
	                        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
	                        rel="stylesheet">
	                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	                    <script
	                        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
	                    </script>

	                    <td>

	                        <div class="form-group col-lg-offset-4 col-md-15">
	                            <label for="year">Year</label>
	                            <input class="date-own form-control" style="width: 300px;" type="text" name="year">

	                            <script type="text/javascript">
	                            $('.date-own').datepicker({
	                                minViewMode: 2,
	                                format: 'yyyy'
	                            });
	                            </script>


	                            <br><br>

	                    <td>
	                        <select name="month">
	                            <option selected value="" class="form-control" required>Select Month</option>
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
	                    </td>
	                    <br><br>
	                    <td>
	                        <div class="clearfix"><input type="submit" name="submit" value="Print" class="btn btn-success"
	                                target="Fradisplay">
	                    </td>
	                </tr>
	                </div>
	                </div>
	            </form>
	        </center>


	    </body>

	</html>