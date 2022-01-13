 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Management Information System</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/css/mis.css" rel="stylesheet">
     <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
 </head>

 <body>
     <br><br>

     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <button type="button" class="btn btn-primary col-lg-offset-0"
         onclick="location.href = 'ClearanceSetPrice.php';">Back
         <span class="glyphicon glyphicon" aria-hidden="true"></span>
     </button>


     <?php session_start();
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


$res = mysqli_query($db, "SELECT clearance_form,purpose,price, purpose_id FROM finance_clearance_set, finance_clearance_list 
WHERE finance_clearance_set.clearance_id=finance_clearance_list.clearance_id");?>

         <div class="container">
             <div class="table-responsive">
                 <table class="table table table-hover" id="mytable">
                     <thead>
                         <tr>
                             <th scope="col">Clearance Form</th>
                             <th scope="col">Purpose</th>
                             <th scope="col">Amount</th>
                             <th scope="col">Update</th>
                             <th scope="col">Delete</th>
                         </tr>
                     </thead>


                     <?php
while($row = mysqli_fetch_array($res)){
	$id = $row["purpose_id"];
?>
                     <tr>
                         <td><?php echo $row["clearance_form"]?></td>
                         <td><?php echo $row["purpose"]?></td>
                         <td class='amount'><?php echo number_format($row["price"],2)?></td>


                         <td><a href="ClearanceSetUpdate.php?id=<?php echo $row['purpose_id']?>"
                                 class="btn btn-primary">Update</a></td>
                         <td><input type="button" onClick="deleteme(<?php echo $row['purpose_id']?>)" name="Delete"
                                 value="Delete" class="btn btn-primary"></td>

                     </tr>


                     <script language="javascript">
                     function deleteme(delid) {
                         if (confirm("Are you sure you want to delete?")) {
                             window.location.href = 'ClearanceSetDelete.php?del_id=' + delid + '';
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