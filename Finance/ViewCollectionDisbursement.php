<?php 
session_start();
  include("dbcon.php");
  $col=$_GET['coll'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection and Disbursement</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <link href="Style.css" type="text/css" rel="stylesheet">
    <br>
    <div class="head">
        <font size="5">Collection and Disbursement</font>
    </div>
    <br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary col-lg-offset-0" onclick="location.href = 'printButton.php';">Back
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
    </button>


    <?php
include("dbcon.php");
?>

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


$tp = 0;?>

        <div class="container">
            <div class="table-responsive">
                <table class="table table table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th scope="col">
                                <center>Date</center>
                            </th>
                            <th scope="col">
                                <center>Particular</center>
                            </th>
                            <th scope="col">
                                <center>Amount</center>
                            </th>

                    </thead>

                    <?php
 $res = mysqli_query($db, "SELECT * FROM finance_collection WHERE col LIKE '%$col%'");
 $c = 0;


      while($row = mysqli_fetch_array($res)) 
      {
      	$c += $row["collection_amount"];
     echo"<tr>   
                          <td><center>".$row["collection_date"]."</center></td>  
                          <td><center>".$row["collection_particular"]."</center></td>  
                          <td class='amount'>".number_format($row["collection_amount"],2)."</td>  
        </tr>";}

    echo "<tr><td>
							<td><b>Total Collection</b></td>
							<td class='amount'>".number_format($c,2)."</td></td><tr>";
?>



                    <?php
	$ress = mysqli_query($db, "SELECT * FROM finance_disbursement WHERE dis LIKE '%$col%'");
 $d = 0;


      while($row = mysqli_fetch_array($ress)) 
      {
      	$d += $row["disbursement_amount"];
     echo"<tr>   
                          <td><center>".$row["disbursement_date"]."</center></td>  
                          <td><center>".$row["disbursement_particular"]."</center></td>  
                          <td class='amount'>".number_format($row["disbursement_amount"],2)."</td>  
        </tr>";}

    echo "<tr><td>
							<td><b>Total Disbursement</b></td>
							<td class='amount'>".number_format($d,2)."</td></td><tr>";
?>

    </center>
    </div>
</body>

</html>