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
    <title>Income</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
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
        onclick="location.href = 'IncomeFundOperationView.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <section id="asd" class="asds">

        <article>

            <center>
                <form method="post" action="IncomeFundOperationUpdateExec.php">

                    <?php
				include('dbcon.php');
            $query1 = $db->query("SELECT * FROM finance_fundoperation_income WHERE income_id = '$id'");
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

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_code">Account Code</label>
                            <td><input type="number" class="form-control" value="<?php echo $row1["income_code"]; ?>"
                                    required name="income_code" size="50">
                        </tr>
                        <br>

                        <br>
                        <tr>
                            <td>
                                <div class="form-group col-md-4">
                                    <label for="income_type">Income Particular</label>
                            <td><input type="text" class="form-control" value="<?php echo $row1["income_type"]; ?>"
                                    required name="income_type" size="50">
                        </tr>
                        <br>

                    </table>

                    <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" required name="id">
                </form>

            </center>


        </article>
    </section>


    </div>

</body>

</html>