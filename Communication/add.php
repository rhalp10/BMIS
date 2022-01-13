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
      <link href="css/bootstrap.min.css" rel="stylesheet">
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
   <?php
      include("connection.php");
      
      ?>
   <head>
   </head>
   <body>
      <?php
         // session_start();
         // if(isset($_SESSION['device_Id']))
         // {
         //     if ($_SESSION['device_Id'] != null)
         //     { 
         
         
             ?>
      <div class="container">
         <div class="jumbotron">
            <?php include("button.php"); ?><br><br><br>
            <center>
               <h2>Add An Announcement</h2>
               <!--   <div class="form-group">  
                  <form class="form-inline" action="add1.php" method="post" enctype="multipart/form-data">  
                      
                  <label>Category</label>
                  <select name="category" required>
                  <option></option>
                  <?php
                     $sql = mysqli_query($db, "SELECT * FROM sms_category");
                     while($row = mysqli_fetch_assoc($sql))
                     {
                     ?>
                  <option><?php echo $row['category']; ?></option>
                                  
                           
                  <?php
                     }
                     ?>                        
                  
                  
                            </select><br><br>
                  
                          <label>Receiver</label>
                          <select name="receiver" required>
                          <option></option>
                          <option>Residents</option>
                          
                  
                  <?php
                     $sql = mysqli_query($db, "SELECT * FROM ref_position WHERE position_ID != 1");
                     while($row = mysqli_fetch_assoc($sql))
                     {
                     ?>
                  <option><?php echo $row['position_Name']; ?></option>
                                  
                           
                  <?php
                     }
                     ?>
                  </select><br><br>  
                  <label>Statement&nbsp;&nbsp;</label><textarea required class="control-label" rows="6" name="statement"></textarea><br><br>
                  <label>Image</label> <input class= "form-control" type="file" name="image" value=""><br><br>
                  <?php echo "This Picture wont appear in the message (for the page only)" ?><br>
                  <input type="submit" value="SUBMIT" <button class="btn btn-success"></button>
                  </form>
                  </div> -->
            </center>
         </div>
      </div>
      </h2>
      </div>
      <div class="col-md-3"></div>
      <form class="form-horizontal col-md-6" action="add1.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <label class="control-label col-sm-2" for="Category">Category</label>
            <div class="col-sm-10">
               <select name="category" class="form-control" required>
                  <option></option>
                  <?php
                     $sql = mysqli_query($db, "SELECT * FROM sms_category");
                     while($row = mysqli_fetch_assoc($sql))
                     {
                     ?>
                  <option><?php echo $row['category']; ?></option>
                  <?php
                     }
                     ?>                        
               </select>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="receiver">Receiver</label>
            <div class="col-sm-10">
               <select name="receiver" class="form-control" required>
                  <option></option>
                  <?php
                     $sql = mysqli_query($db, "SELECT * FROM ref_position");
                     while($row = mysqli_fetch_assoc($sql))
                     {
                     ?>
                  <option><?php echo $row['position_Name']; ?></option>
                  <?php
                     }
                     ?>                       
               </select>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="Statement">Statement</label>
            <div class="col-sm-10"> 
               <textarea required class="form-control" rows="6" id="pwd" name="statement"></textarea>
            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="Statement">Image</label>
            <div class="col-sm-10" title="This Picture wont appear in the message (for the page only)"> 
               <input class= "form-control" type="file" name="image" value="" title="This Picture wont appear in the message (for the page only)">
            </div>
         </div>
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" class="btn btn-default">Submit</button>
            </div>
         </div>
      </form>
      </div>
      </div>
      </div>
      <script src="js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Script to Activate the Carousel -->
      <script>
         $('.carousel').carousel({
             interval: 5000 //changes the speed
         })
      </script>
      <?php
         // }
         // }
             // else
             // {
             //     echo "<script>alert('Your account must be logged in');</script>";
             //      echo "<script>window.location=\"login_sms_account.php\";</script>";
         
             // }
         
         
         ?>
   </body>
</html>