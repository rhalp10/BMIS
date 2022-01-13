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
	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

	</head>

	<body>
	    <link href="Style.css" type="text/css" rel="stylesheet">

	    <br>

	    <div class="head">
	        <font size="5">Non-Office Expenditure Fund Operation</font>
	    </div>
	    <br><br>


	    <center>
	        <tr>
	            <br><br><br><br>
	            <td>

	                <div class="form-group col-md-4">
	                    <label for="noe_id">Non-Office Expenditure Type</label>
	            <td>
	                <?php
				include('dbcon.php');
				$query = $db->query("SELECT * FROM finance_fundoperation_noe");
				$rowCount = $query->num_rows;
			?>
	                <form action="NOEFundOperationSetInsert.php" method="POST">
	                    <select name="noe_id" class="form-control">
	                        <option value="">Select Non-Office Expenditure</option>
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
	                <div class="form-group col-md-4">
	                    <label for="noe_amount">Amount</label>
	            <td><input type="text" maxlength=20 class="form-control input-sm text-right amount" name="noe_amount"
	                    placeholder="Enter NOE Amount" required></td>
	            </div>
	        </tr>

	        <tr>
	            <td>


	                <div class="form-group col-md-4">
	                    <label for="noe_year">Year</label>
	                    <input class="form-control" type="text" readonly name="noe_year"
	                        value="<?php $d=date('Y'); echo $d+1; ?>">

	                </div>
	            </td>
	        </tr>

	        <td>
	            <div class="clearfix"></div>
	        <td><input type="submit" value="Submit" class="btn btn-primary"></td>
	        </td>
	        </td>
	        </form>

	        <br><br>
	        <form action="NOEFundOperationSetView.php" method="POST">
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