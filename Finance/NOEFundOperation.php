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
</head>

<body>
    <link href="Style.css" type="text/css" rel="stylesheet">
    <br>

    </head>

    <body>

        <form action="NOEFundOperationInsert.php" method="POST">
            <div class="head">
                <font size="5">Add Non-Office Expenditures Particular</font>
            </div>
            <br><br>
            <br>
            <center>

                <form action="IncomeFundOperationInsert.php" method="POST">
                    <td>
                        <div class="form-group col-md-6 ">
                            <div class="clearfix"></div>
                            <label for="noe_code">Non-Office Expenditure Code</label>
                            <input type="number" min=1 class="form-control" name="noe_code"
                                placeholder="Enter Account Code" required>
                        </div>

                    <td>
                        <div class="form-group col-md-6 ">
                            <div class="clearfix"></div>
                            <label for="noe_type">Non-Office Expenditure Particular</label>
                            <input type="text" class="form-control" name="noe_type"
                                placeholder="Enter Non-Office Expenditure Type" required>
                        </div>

                    <td>
                        <div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-primary">
                    </td>
                </form>
                <br><br>

                <form action="NOEFundOperationView.php" method="POST">
                    <td><input type="submit" value="View Non-Office Expenditures" class="btn btn-primary"></td>

            </center>


    </body>

</html>