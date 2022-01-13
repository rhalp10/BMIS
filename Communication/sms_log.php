<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Announcements</title>
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" type="text/css" href="">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
      <link rel="stylesheet" href="css/bootstrap.css"/>
      <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
      <script src="js/jquery2.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Custom CSS -->
      <link href="css/index.css" rel="stylesheet">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div class="container-fluid">
         <div class="jumbotron">
            <?php
               include("button.php");
               ?>
            <h2>SMS LOG</h2>
           
            <center>
               <table class="table table-bordered" border="2px" width="50%">
                  <tr>
                     <th>DATE SENT</th>
                     <th>MESSAGE</th>
                     <th>RECEIVER FULL NAME</th>
                     <th>MOBILE NUMBER</th>
                     <th>POSITION</th>
                     
                     <th></th>
                  </tr>
                  <?php
                     include("connection.php");
                         
                         // $sql = mysqli_query($db, "SELECT rd.res_fName , rd.res_mName , rd.res_lName , resc.contact_telnum FROM `resident_detail` rd INNER JOIN resident_contact resc ON rd.res_ID = resc.res_ID");
                         $sql = mysqli_query($db, "SELECT * FROM sms ORDER by date DESC");
                     
                         while($row = mysqli_fetch_assoc($sql))
                         {
                     ?>
                  <tr>
                     <td><?php echo isset($row['date']) ? $row['date'] : ''; ?></td>
                     <td><?php echo isset($row['message']) ? $row['message'] : ''; ?></td>
                     <td><?php echo isset($row['receiver']) ? $row['receiver'] : ''; ?></td>
                     <td><?php echo isset($row['mobileNo']) ? $row['mobileNo'] : ''; ?></td>
                     <td><?php echo isset($row['position']) ? $row['position'] : ''; ?></td>
                     <td><a href="delete_sms_log.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">DELETE</button></a></td>
                  </tr>
                  <?php
                     }
                     
                     ?>
               </table>
            </center>
         </div>
      </div>
   </body>
</html>