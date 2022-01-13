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

    <?php 
			if($id==2){
			    $reportdescription = "Accomplishment";
						}
		   else if($id==7){
			   
				 $reportdescription = "Manila Bay Clean-Up";
				}
		    else if($id==12){
			     $reportdescription = "Attendance Monitoring";
						
		   }
		    else if($id==14){
			    $reportdescription = "Certificate of Validation";
						}
?>




    <div class="container">
        <tr>
            <td>
                <h1><a href="viewreport.php"><button class='btn btn-success'> Back </button></a>
                    &emsp;&emsp;&emsp;Report > <?php echo $reportdescription; ?></h1>
            </td>
        </tr>
        <br>
        <div class="table-responsive">

            <table class="table table-bordered" id="mytable">
                <thead>

                    <tr>

                        <th Style="width:50%;" scope="col-2">List</th>
                        <th Style="width:20%;" scope="col">Date Created</th>
                        <th Style="width:30%;" scope="col">Action</th>

                    </tr>
                </thead>
                <?php
					$_SESSION['reportID'] = $id;
					include("viewingofreports.php");
						
						
						
					?>



        </div>

    </div>


    <script src="nf/jquery/jquery-3.3.1.min.js"></script>
    <script src="nf/js/bootstrap.min.js"></script>
    <script src="nf/vendor/js/jquery.dataTables.min.js"></script>
    <script src="nf/vendor/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#mytable').removeAttr('width').DataTable();
    });
    </script>

    <script language="javascript">
    function deleteme(delid) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = 'delete.php?id=' + delid + '';
            return true;
        }
    }
    </script>
</body>

</html>