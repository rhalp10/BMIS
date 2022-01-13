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
	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
	</head>

	<body>

	    <link href="Style.css" type="text/css" rel="stylesheet">

	    <br>

	    <div class="head">
	        <font size="5">Income Fund Operation</font>
	    </div>
	    <br><br>

	    <br><br>
	    <center>
	        <br>
	        <tr>
	            <td>
	                <div class="form-group col-md-4">
	                    <label for="income_id">Income Particular</label>
	            <td>
	                <?php
				include('dbcon.php');
				$query = $db->query("SELECT * FROM finance_fundoperation_income");
				$rowCount = $query->num_rows;
			?>
	                <center>
	                    <form action="IncomeFundOperationSetInsert.php" method="POST">
	                        <select name="income_id" class="form-control">
	                            <option value="">Select Income</option>
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
	            </div>
	        </tr>


	        <td>
	            <div class="form-group col-md-4">
	                <label for="income_amount">Amount</label>
	        <td><input type="text" maxlength=20 class="form-control input-sm text-right amount" name="income_amount"
	                placeholder="Enter Income" required></td>
	        </div>
	        </td>

	        <tr>
	            <td>

	                <div class="form-group col-md-4">
	                    <label for="income_year">Year</label>
	                    <input class="form-control" type="text" readonly name="income_year"
	                        value="<?php $d=date('Y'); echo $d+1; ?>">

	                </div>
	            </td>
	        </tr>

	        <td>
	            <div class="clearfix"></div>
	        <td><input type="submit" value="Submit" class="btn btn-primary	"></td>
	        </td>
	        </td>
	        </form>

	        <br><br>
	        <form action="IncomeFundOperationSetView.php" method="POST">
	            <div class="form-group col-mid-3">
	                <td><input type="submit" value="View" class="btn btn-primary"></td>
	        </form>

	    </center>

	</body>

	<script type="text/javascript">
$(function() {
    $('.amount').mask('#,###,###,###,###.##', {
        reverse: true
    });
});
	</script>

	</html>