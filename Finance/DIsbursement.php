<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Disbursement</title>

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
        <font size="5">Disbursement</font>
    </div>
    <br><br>

    <center>

        <br><br><br>
        <form action="DisbursementInsertion.php" method="POST">
            </br>
            <center>

                <tr>
                    <td>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-4">
                            <label for="col1">Date</label>
                    <td><input type="date" class="form-control" size="50" id="col1" name="col1" required></td>
                    </div>

                    <td>
                        <div class="form-group col-md-4">
                            <label for="col2">Particular</label>
                    <td><input type="text" class="form-control" size="50" id="col2" name="col2"
                            placeholder="Enter Disbursement Type" required></td>
                    </div>

                    <td>
                        <div class="form-group col-md-4">
                            <label for="col3">Amount</label>
                    <td><input type="text" maxlength=20 class="form-control input-sm text-left amount" size="50"
                            id="col3" name="col3" placeholder="Enter Disbursement Amount" required></td>
                    </div>
                </tr>

                <td>
                    <div class="form-group col-md-12"><input type="submit" value="Submit" class="btn btn-primary"></div>
                </td>



        </form>
        <br><br>
        <form action="DisbursementView.php" method="POST">
            <td>
                <div class="clearfix"></div>
                <input type="submit" value="View Records" class="btn btn-primary">
            </td>
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