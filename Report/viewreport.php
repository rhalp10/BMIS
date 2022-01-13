<?php 
session_start();
include('official.php');
include('checkposition.php');
 $pID= $_SESSION['position_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="nf/css/bootstrap.min.css" rel="stylesheet">
    <link href="nf/css/css/mis.css" rel="stylesheet">
    <link href="nf/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <link href="Style.css" type="text/css" rel="stylesheet">

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
    </style>






    <div class="container">
        <?php if($pID==3){ echo "<tr ><td><h1>REPORTS &emsp;&emsp;&emsp; <a  href='logosettings.php'><button  class='btn btn-success'> SETTINGS </button></a></td></h1></tr>";} else{
					echo "<tr ><td><h1>REPORTS</h1></td></tr>";
				}?>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="mytable">
                <thead>

                    <tr>

                        <th Style="width:75%;" scope="col-2">Kinds of Report</th>
                        <th Style="width:25%;" scope="col">Action</th>

                    </tr>


                </thead>

                <?php include('checkreport.php'); ?>





        </div>
    </div>
    </table>

    <script src="nf/jquery/jquery-3.3.1.min.js"></script>
    <script src="nf/js/bootstrap.min.js"></script>
    <script src="nf/vendor/js/jquery.dataTables.min.js"></script>
    <script src="nf/vendor/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#mytable').removeAttr('width').DataTable();
    });
    </script>


</body>

</html>