<!DOCTYPE html>
<html lang="en">
   <?php
      include("connection.php");
      session_start();
      
      if (isset($_SESSION['receiver']))
      {
               $receiver  = $_SESSION['receiver'];
               // $position = $_SESSION['position'];
      
      
      }  
      
      ?>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Announcements</title>
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" type="text/css" href=""css/index.css>
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
      <div class="container">
         <div class="jumbotron">
            <div class="address-bar">
               <h1><font color="black">Announcements</font></h1>
               <h3><font color="black">Let you see our important announcements</font></h3>
            </div>
            <?php
               $position = $_SESSION['position'];
               
                        include("button.php");
                       if ($_SESSION['position'] == 'Barangay Secretary' OR $_SESSION['position'] == 'Barangay Captain' OR $_SESSION['position'] == 'Barangay Treasurer') 
                       {
                          
                            $res = mysqli_query($db, "SELECT * FROM announce ORDER BY date DESC");
                           while ($row = mysqli_fetch_assoc($res))
                           {
               ?>
            <div class="row">
               <div class="box col-sm-12">
                  <div class="col-sm-4">
                     <img class="img-responsive img-border img-left thumbnail" style="background: url(<?php echo $row["image"]?>); background-repeat: no-repeat; background-size:cover; height: 150px; width: 150px;" >
                  </div>
                  <div class="col-sm-8" >
                     <hr>
                     <h2 class="intro-text text-center">
                        <strong><?php echo $row['category'];?></strong>
                     </h2>
                     <hr>
                     <b>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date("M jS, Y", strtotime($row['date']));?></p>
                     </b>
                     <p><?php echo $row['announcement']; ?></p>
                     <div class="btn-group" >
                        <a class="btn btn-success btn-lg" href="edit.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-pencil"></span> EDIT</a>
                        <a class="btn btn-danger btn-lg"  href="delete.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-trash"> DELETE</a>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               
               }
               
               else
               {
               
               $result = mysqli_query($db, "SELECT * FROM announce");
               while($row = mysqli_fetch_assoc($result))
               {
               
               ?>
              <div class="row">
               <div class="box col-sm-12">
                  <div class="col-sm-4">
                     <img class="img-responsive img-border img-left thumbnail" style="background: url(<?php echo $row["image"]?>); background-repeat: no-repeat; background-size:cover; height: 150px; width: 150px;" >
                  </div>
                  <div class="col-sm-8" >
                     <hr>
                     <h2 class="intro-text text-center">
                        <strong><?php echo $row['category'];?></strong>
                     </h2>
                     <hr>
                     <b>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo date("M jS, Y", strtotime($row['date']));?></p>
                     </b>
                     <p><?php echo $row['announcement']; ?></p>
                    <!--  <div class="btn-group" >
                        <a class="btn btn-success btn-lg" href="edit.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-pencil"></span> EDIT</a>
                        <a class="btn btn-danger btn-lg"  href="delete.php?id=<?php echo $row['announceId']; ?>"><span class="glyphicon glyphicon-trash"> DELETE</a>
                     </div> -->
                  </div>
               </div>
            </div>
            <?php
               }
               }
               ?>
            <script src="js/jquery.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
            </script>
         </div>
      </div>
   </body>
</html>