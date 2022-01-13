<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clearance Amount</title>

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
        <font size="5">Clearance Amount</font>
    </div>
    <br><br>

    <center>
        <tr>
            <br>
            <td>
                <div class="form-group col-md-4">
                    <label for="clearance_id">Clearance</label>
            <td>
                <?php
				include('dbcon.php');
				$query = $db->query("SELECT * FROM finance_clearance_list");
				$rowCount = $query->num_rows;
			?>
                <form action="ClearanceSetPriceInsert.php" method="POST">
                    <select name="clearance_id" class="form-control">
                        <option value="">Select Form or Clearance</option>
                        <?php
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
							session_start();
							echo '<option value="'.$row['clearance_id'].'">'.$row['clearance_form'].'</option>';
					
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
                    <label for="purpose">Purpose</label>
            <td><input type="text" class="form-control" name="purpose" placeholder="Enter Clearance Purpose" required>
            </td>
            </div>
        </tr>

        <tr>
            <td>
                <div class="form-group col-md-4">
                    <label for="price">Amount</label>
            <td><input type="text" maxlength=20 class="form-control input-sm text-right amount" name="price"
                    placeholder="Enter Clearance Amount" required></td>
            </div>
            </td>
        </tr>

        <td>
            <div class="clearfix"></div>
        <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
        </td>
        </td>
        </form>

        <br><br>
        <form action="ViewClearancePurposeAmount.php" method="POST">
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