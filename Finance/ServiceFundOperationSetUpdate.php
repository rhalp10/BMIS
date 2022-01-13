<?php 
session_start();

    $id = $_GET['id'];


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Services</title>

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
        <font size="5">Personal Services Update</font>
    </div>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0"
        onclick="location.href = 'ServiceFundOperationSetView.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <section id="asd" class="asds">

        <article>

            <center>
                <form method="post" action="ServiceFundOperationSetUpdateExec.php">

                    <?php
				include('dbcon.php');
            $query1 = $db->query("SELECT finance_fundoperation_ps.service_type,
							finance_fundoperation_ps.service_code, finance_fundoperation_psset.service_position,finance_fundoperation_psset.service_amount, finance_fundoperation_psset.service_year FROM finance_fundoperation_ps INNER JOIN finance_fundoperation_psset
							WHERE finance_fundoperation_ps.service_id = finance_fundoperation_psset.service_id AND finance_fundoperation_psset.service_setid='$id'");
			$row1=mysqli_fetch_assoc($query1);

			?>


                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="service_id">Service ID</label>
                            <td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required
                                    name="service_id" size="50"></td>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group col-md-4">
                                <td>
                                    <label for="service_type">Service Particular</label>
                                </td>
                                <td>


                                    <select name="mooe_type" class="form-control" readonly
                                        value="<?php echo $row2["service_type"]; ?>" required>
                                        <option value="<?php echo $id; ?>"><?php echo $row1["service_type"]; ?></option>

                                    </select>
                                </td>
                            </div>
                        </tr>

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="service_position">Position</label>
                            <td><input type="text" class="form-control" value="<?php echo $row1["service_position"]; ?>"
                                    required name="service_position" size="50">
                        </tr>


                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="service_amount">Amount</label>
                            <td><input type="text" maxlength=20 class="form-control input-sm text-left amount"
                                    value="<?php echo number_format($row1["service_amount"],2); ?>" required
                                    name="service_amount" size="50">
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="service_year">Year</label>
                            <td><input type="number" class="form-control" value="<?php echo $row1["service_year"]; ?>"
                                    required name="service_year" size="50">
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