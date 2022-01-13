<?php 
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection Update</title>

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
        <font size="5">Disbursement Update</font>
    </div>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0" onclick="location.href = 'DisbursementView.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>


    <section id="asd" class="asds">

        <article>



            <center>
                <form method="post" action="DisbursementUpdateExec.php">
                    <table cellpadding="0" cellspacing="0" border="0" class="table">
                        <tbody>


                            <?php
			include('dbcon.php');
			$id = $_GET["id"];
			$query =mysqli_query($db, "SELECT * FROM finance_disbursement WHERE disbursement_id = '$id'");
			$row=mysqli_fetch_assoc($query);
		?>


                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="disbursement_id">Disbursement ID</label>
                                <td><input type="number" class="form-control" readonly value="<?php echo $id; ?>"
                                        required name="disbursement_id"></td>
                                </div>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="disbursement_date">Date</label>
                                <td><input type="date" class="form-control" readonly
                                        value="<?php echo $row["disbursement_date"]; ?>" required
                                        name="disbursement_date">
                                    </div>
                            </tr>

                            <br>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="disbursement_particular">Particular</label>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $row["disbursement_particular"]; ?>" required
                                        name="disbursement_particular"></td>
                                </div>
                            </tr>

                            <br>
                            <tr>
                                <td>
                                    <div class="form-group col-md-4">
                                        <label for="disbursement_amount">Amount</label>
                                <td><input type="text" maxlength=20 class="form-control input-sm text-left amount"
                                        value="<?php echo number_format($row["disbursement_amount"],2); ?>" required
                                        name="disbursement_amount" size="50"></td>
                            </tr>
                            <br>


                            <td></td>

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