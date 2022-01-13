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
</head>

<body>
    <link href="Style.css" type="text/css" rel="stylesheet">
    <br>

    </head>

    <body>

        <form action="IncomeFundOperationInsert.php" method="POST">
            <div class="head">
                <font size="5">Add Income Particular</font>
            </div>
            <br><br>
            <br>
            <center>

                <form action="IncomeFundOperationInsert.php" method="POST">
                    <td>
                        <div class="form-group  col-md-6 ">
                            <div class="clearfix"></div>
                            <label for="income_code">Income Code</label>
                            <input type="number" min=1 class="form-control" name="income_code"
                                placeholder="Enter Account Code" required>
                        </div>

                    <td>
                        <div class="form-group col-md-6 ">
                            <div class="clearfix"></div>
                            <label for="income_type">Income Particular</label>
                            <input type="text" class="form-control" name="income_type"
                                placeholder="Enter Income Particular" required>
                        </div>

                    <td>
                        <div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-primary">
                    </td>
                </form>
                <br><br>

                <form action="IncomeFundOperationView.php" method="POST">
                    <td><input type="submit" value="View" class="btn btn-primary"></td>

            </center>

    </body>

</html>