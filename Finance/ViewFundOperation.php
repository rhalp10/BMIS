 <?php session_start();
 include('dbcon.php');
$year=$_GET['year'];
?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Statement of Fund Operation</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/css/mis.css" rel="stylesheet">
     <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
 </head>

 <body>
     <link href="Style.css" type="text/css" rel="stylesheet">
     <br>
     <div class="head">
         <font size="5">Statement of Fund Operation</font>
     </div>
     <br>

     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <button type="button" class="btn btn-primary col-lg-offset-0" onclick="location.href = 'printButton.php';">Back
         <span class="glyphicon glyphicon" aria-hidden="true"></span>
     </button>

     <?php include("dbcon.php"); ?>

     <style>
		table {
			border-collapse: collapse;
			width: 50%;
		}

		th, td {
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


$res = mysqli_query($db, "SELECT * FROM finance_fundoperation_incomeset fs, finance_fundoperation_income fi WHERE fs.income_id=fi.income_id AND fs.income_year LIKE '%$year%'");

$tp = 0;?>

         <div class="container">
             <div class="table-responsive">
                 <table class="table table table-hover" id="mytable">
                     <thead>
                         <tr>
                             <th scope="col">
                                 <center>Particulars</center>
                             </th>
                             <th scope="col">
                                 <center>Account Classification</center>
                             </th>
                             <th scope="col">
                                 <center>Year</center>
                             </th>
                             <th scope="col">
                                 <center>Amount</center>
                             </th>

                     </thead>

                     <?php
					while($row = mysqli_fetch_array($res)){
					$tp += $row["income_amount"];
							$id = $row["income_id"];
							echo "<tr>
							<td><center>".$row["income_type"]."</center></td>
							<td><center>".$row["income_code"]."</center></td>
							<td><center>".$row["income_year"]."</center></td>
							<td class='amount'>".number_format($row["income_amount"],2)."</td>

					</tr>";
						}
						echo "<tr><td><td></td>
							<td><b>Total Income</b></td>
							<td class='amount'><b>".number_format($tp,2)."</td></b></td><tr>";
?>



                     <?php
		
include('dbcon.php');


$ress = mysqli_query($db, "SELECT * FROM finance_fundoperation_psset ps, finance_fundoperation_ps pp WHERE ps.service_id=pp.service_id AND ps.service_year LIKE '%$year%'");

		
$tp = 0;?>

                     <?php
					while($row = mysqli_fetch_array($ress)){
					$tp += $row["service_amount"];
							$id = $row["service_id"];
							echo "<tr>
							<td><center>".$row["service_position"]."</center></td>							
							<td><center>".$row["service_code"]."</center></td>
							<td><center>".$row["service_year"]."</center></td>
							<td class='amount'>".number_format($row["service_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td><td></td>
							<td><b>Total Personal Services</b></td>
							<td class='amount'><b>".number_format($tp,2)."</b></td></td><tr>";
?>

                     <?php
		
include('dbcon.php');


$resss = mysqli_query($db, "SELECT * FROM finance_fundoperation_mooeset ms, finance_fundoperation_mooe mm WHERE ms.mooe_id=mm.mooe_id AND ms.mooe_year LIKE '%$year%'");

		
$tp = 0;?>

                     <?php
			
					while($row = mysqli_fetch_array($resss)){
					$tp += $row["mooe_amount"];
							$id = $row["mooe_id"];
							echo "<tr>
							<td><center>".$row["mooe_type"]."</center></td>
							<td><center>".$row["mooe_code"]."</center></td>
							<td><center>".$row["mooe_year"]."</center></td>
							<td class='amount'>".number_format($row["mooe_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td><td></td>
							<td><b>Total Maintenance and Other Expenses</b></td>
							<td class='amount'><b>".number_format($tp,2)."</b></td></td><tr>";


?>

                     <?php
		
include('dbcon.php');


$ressss = mysqli_query($db, "SELECT * FROM finance_fundoperation_noeset ns, finance_fundoperation_noe nn WHERE ns.noe_id=nn.noe_id AND ns.noe_year LIKE '%$year%'");

$tp = 0;?>

                     <?php
			
					while($row = mysqli_fetch_array($ressss)){
					$tp += $row["noe_amount"];
							$id = $row["noe_id"];
							echo "<tr>
							<td><center>".$row["noe_type"]."</center></td>
							<td><center>".$row["noe_code"]."</center></td>
							<td><center>".$row["noe_year"]."</center></td>
							<td class='amount'>".number_format($row["noe_amount"],2)."</td>
					</tr>";
						}
						echo "<tr><td><td></td>
							<td><b>Total Non-Office Expenditures</b></td>
							<td class='amount'><b>".number_format($tp,2)."<b></td></td><tr>";
?>

     </center>
     </div>
 </body>

 </html>