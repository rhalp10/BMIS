<?php 
include("dbcon.php");
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
			if($id==16){
			    $reportdescription = "Statement of Fund Operation";
						}
		   else if($id==17){
			   
				 $reportdescription = "Itemized Monthly Collection and Disbursement";
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
                        <th Style="width:20%;" scope="col">Year</th>
                        <th Style="width:30%;" scope="col">Action</th>

                    </tr>
                </thead>
                <?php
					if($id==16){
			   $query1 = "SELECT distinct income_year as etooh FROM finance_fundoperation_incomeset";
								$res1 = mysqli_query($db,$query1);
								
								while($row1 = mysqli_fetch_array($res1)){
									echo "<tr>
									<td>".$reportdescription."</td>
									 <td>".$row1["etooh"]."</td><td><a  href='printFundOperation.php?year=".$row1["etooh"]."' target='_blank'><button  class='btn btn-primary'> VIEW </button></a></td>
									</tr>";
					}}
		   else if($id==17){
			 
				include('dbcon.php');
				$query = $con->query("SELECT DISTINCT col FROM finance_collection order by col DESC");
				$rowCount = $query->num_rows;
			
					
					if($rowCount > 0){
						while($row = $query->fetch_assoc()){
$row1=$row['col'];
$ci=$row['col'];
$ci=substr($ci, 0, -3);
$cc=$row['col'];
$cc=substr($cc, -2);
	if($cc==1){
		$ccc='January';}
			if($cc==2){
		$ccc='February';}
	elseif($cc==3){
		$ccc='March';}
	elseif($cc==4){
		$ccc='April';}
	elseif($cc==5){
		$ccc='May';}
	elseif($cc==6){
		$ccc='June';}
	elseif($cc==7){
		$ccc='July';}
	elseif($cc==8){
		$ccc='August';}
	elseif($cc==9){
		$ccc='September';}
	elseif($cc==10){
		$ccc='October';}
	elseif($cc==11){
		$ccc='November';}
			if($cc==12){
		$ccc='December';}

							echo "<tr>
									<td>".$reportdescription."</td>
									 <td>".$ccc."-".$ci."</td><td><a  href='printCollectionDisbursement.php?year=".$ci."&month=".$cc."' target='_blank'><button  class='btn btn-primary'> VIEW </button></a></td>
									</tr>";
					}

					}
					else{
						echo 'No Records Available';

					}
		   }
?>






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