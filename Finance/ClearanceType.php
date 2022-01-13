<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clearance Type</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <link href="Style.css" type="text/css" rel="stylesheet">
    <br>


    <body>
        <div class="head">
            <font size="5">Add Clearance</font>
        </div>
        <br><br>
        <br>
        <center>

            <div class="form-group col-lg-offset-4 col-md-4 "></div>

            <form action="ClearanceTypeInsert.php" method="POST">
                <tr>
                    <td>
                        <div class="form-group col-lg-offset-4 col-md-4 ">
                            <label for="Clearance">Clearance Type</label>
                            <input type="text" class="form-control" name="Clearance" placeholder="Enter Clearance Type"
                                required>
                    <td></td>
                    </div>
                </tr>

                <td>
                    <div class="clearfix"></div><input type="submit" value="Submit" class="btn btn-primary">
                </td>
            </form>
            <br><br>

            <form action="ViewClearanceList.php" method="POST">
                <td><input type="submit" value="View List of Clearances" class="btn btn-primary"></td>
            </form>
        </center>
    </body>

</html>