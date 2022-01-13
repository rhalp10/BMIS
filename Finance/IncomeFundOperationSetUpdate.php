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
        <font size="5">Income Update</font>
    </div>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0"
        onclick="location.href = 'IncomeFundOperationSetView.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <section id="asd" class="asds">

        <article>

            <center>
                <form method="post" action="IncomeFundOperationSetUpdateExec.php">

                    <?php
				include('dbcon.php');
            $query1 = $db->query("SELECT finance_fundoperation_income.income_type, finance_fundoperation_income.income_code, finance_fundoperation_incomeset.income_amount, finance_fundoperation_incomeset.income_year FROM finance_fundoperation_income INNER JOIN finance_fundoperation_incomeset WHERE finance_fundoperation_incomeset.income_id='$iid' AND finance_fundoperation_income.income_id='$iid' and finance_fundoperation_incomeset.income_year = '$year'");
			$row1=mysqli_fetch_assoc($query1);

			?>


                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_id">Income ID</label>
                            <td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required
                                    name="income_id" size="50"></td>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group col-md-4">
                                <td>
                                    <label for="income_type">Income Particular</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" readonly
                                        value="<?php echo $row1["income_type"]; ?>" required name="income_type"
                                        size="50">
                                </td>
                            </div>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_code">Account Code</label>
                            </td>
                            <td><input type="number" class="form-control" readonly
                                    value="<?php echo $row1["income_code"]; ?>" required name="income_code" size="50">
                                </div>
                            </td>
                        </tr>

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_amount">Amount</label>
                            <td><input type="text" maxlength=20 class="form-control input-sm text-left amount"
                                    value="<?php echo number_format($row1["income_amount"],2); ?>" required
                                    name="income_amount" size="50">
                                </div>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_year">Year</label>
                            <td><input type="number" class="form-control" readonly
                                    value="<?php echo $row1["income_year"]; ?>" required name="income_year" size="50">
                                </div>
                                </div>
                        </tr>

                </form>


                </table>

                <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                <input type="hidden" class="form-control" value="<?php echo $id; ?>" required name="id">
                </form>

            </center>


        </article>
    </section>




</body>
<script type="text/javascript">
$(function() {
    $('.amount').mask('#,###,###,###,###.##', {
        reverse: true
    });
});
</script>

</html>