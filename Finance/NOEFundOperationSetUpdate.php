<?php 
session_start();

    $id = $_GET['id'];
    $year =  $_GET['year'];
$iid = $_GET['iid'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance and Other Operating Expense</title>

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
        <font size="5">Non-Office Expenditure Update</font>
    </div>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0"
        onclick="location.href = 'NOEFundOperationSetView.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <section id="asd" class="asds">

        <article>

            <center>
                <form method="post" action="NOEFundOperationSetUpdateExec.php">

                    <?php
				include('dbcon.php');

			$query1 = $db->query("SELECT finance_fundoperation_noe.noe_type, finance_fundoperation_noe.noe_code, finance_fundoperation_noeset.noe_amount, finance_fundoperation_noeset.noe_year FROM finance_fundoperation_noe INNER JOIN finance_fundoperation_noeset WHERE finance_fundoperation_noeset.noe_id='$iid' AND finance_fundoperation_noe.noe_id='$iid' and finance_fundoperation_noeset.noe_year = '$year'");
			$row1=mysqli_fetch_assoc($query1);

			?>


                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="noe_id">Non-Office Expenditure ID</label>
                            <td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required
                                    name="noe_id" size="50"></td>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group col-md-4">
                                <td>
                                    <label for="noe_type">Non-Office Expenditure Particular</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" readonly
                                        value="<?php echo $row1["noe_type"]; ?>" required name="noe_type" size="50">
                                </td>
                            </div>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="noe_code">Account Code</label>
                            <td><input type="number" class="form-control" readonly
                                    value="<?php echo $row1["noe_code"]; ?>" required name="noe_code" size="50">
                        </tr>

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="noe_amount">Amount</label>
                            <td><input type="text" maxlength=20 class="form-control input-sm text-left amount"
                                    value="<?php echo number_format($row1["noe_amount"],2); ?>" required
                                    name="noe_amount" size="50">
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="noe_year">Year</label>
                            <td><input type="number" class="form-control" readonly
                                    value="<?php echo $row1["noe_year"]; ?>" required name="noe_year" size="50">
                        </tr>


                    </table>

                    <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" required name="id">
                </form>

            </center>





        </article>
    </section>


    </div>

</body>
<script type="text/javascript">
$(function() {
    $('.amount').mask('#,###,###,###,###.##', {
        reverse: true
    });
});
</script>

</html>