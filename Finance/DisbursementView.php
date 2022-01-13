<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection and Disbursement Records</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0" onclick="location.href = 'Disbursement.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>

    <?php session_start();
include("dbcon.php");
?>

    <link href="Style.css" type="text/css" rel="stylesheet">


    </head>

    <style>
    table {
        border-collapse: collapse;
        width: 50%;
    }

    th,
    td {
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }


    td.amount {
        text-align: right;
    }
    </style>
    <center>
        <?php
		
include('dbcon.php');

$res = mysqli_query($db, "SELECT * FROM `finance_disbursement`");
$tp = 0;?>

        <div class="container">
            <div class="table-responsive">
                <table class="table table table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Particulars</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php										
while($row = mysqli_fetch_assoc($res)){
$tp += $row["disbursement_amount"];
$id = $row["disbursement_id"];?>
                    <tr>
                        <td><?php echo $row["disbursement_date"]?></td>
                        <td><?php echo $row["disbursement_particular"]?></td>
                        <td class='amount'><?php echo number_format($row["disbursement_amount"],2)?></td>

                        <td><a href="DisbursementUpdate.php?id=<?php echo $row['disbursement_id']?>"
                                class="btn btn-primary">Update</a></td>
                        <td><input type="button" onClick="deleteme(<?php echo $row['disbursement_id']?>)" name="Delete"
                                value="Delete" class="btn btn-primary"></td>
                    </tr>

                    <script language="javascript">
                    function deleteme(delid) {
                        if (confirm("Are you sure you want to delete?")) {
                            window.location.href = 'DisbursementDelete.php?del_id=' + delid + '';
                            return true;
                        }
                    }
                    </script>
                    <?php
}
?>

            </div>
        </div>
        </table>
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendor/js/jquery.dataTables.min.js"></script>
        <script src="vendor/js/dataTables.bootstrap.min.js"></script>
        <script>
        $(document).ready(function() {
            var table = $('#mytable').removeAttr('width').DataTable({
                scrollY: "500px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                columnDefs: [{
                        width: 120,
                        targets: 0
                    }

                ],
                fixedColumns: true
            });
        });
        </script>

    </center>

</body>

</html>