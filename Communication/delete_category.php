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
            <?php
               include("button.php");
               ?>
            <h3>Edit Category</h3>
            <center>
               <table class="table table-collapse" border="2px" width="20%">
                  <tr>
                     <th>
                        <center>CATEGORY NAME</center>
                     </th>
                     <th>
                        <center>ACTION</center>
                     </th>
                  </tr>
                  <?php
                     include("connection.php");
                     
                        $res = mysqli_query($db, "SELECT * FROM sms_category");
                        while($row = mysqli_fetch_assoc($res))
                        {
                            if ($row['category'] != null)
                            {
                     ?>
                  <tr>
                     <td><?php echo $row['category'] ?></td>
                     <div class="cold-md-2">
                        <td class="col-md-2"><a href="edit_category.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">EDIT</button></a>&nbsp;&nbsp;<a href="delete_category1.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning">DELETE</button></a></td>
                     </div>
                  </tr>
                  <?php
                     // echo "<script>alert('There is no existing category');</script>";
                     // echo "<script>window.location=\"category_option.php\";</script>";
                     }
                     
                     }
                     
                     
                     
                     ?>
               </table>
            </center>
         </div>
      </div>
   </body>
</html>