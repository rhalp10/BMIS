<?php
include 'connection.php';
$s1="";?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
  </head>
  <body>

    <div ng-app="app" ng-controller="ctrl" class="wrapper">
      <nav style="background: #14aa6c">
        <div class="logo">Input Logo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
        <ul>

          <li class="dd">

          </li>

          <li><a style="text-decoration: none"href="index.php">Back</a></li>
        </ul>
      </nav>
      <br><br><br><br><br><br><br><br>

      <section class="sec1">
                          <div class="container">
                        <div class="jumbotron">
                         
                          <div class="mb_logo borderNow">
                           
                            <h3>INPUT LOGO</h3>

                            
                                <form class="" action="inputLogo.php" method="post" enctype="multipart/form-data" class="form-group">
                                  <select name="logo_type" class="form-control">
                                    <option name="logo_type" value="Municipal Logo" >Municipal Logo</option>
                                    <option name="logo_type" value="Barangay Logo">Barangay Logo</option>
                                  </select><br>
                                <input class="file form-control" type="file" name="logo"><br>
                                <input type="submit" name="submit" value="UPLOAD" <button class="btn btn-success"></button>
                                </form>
                           
                            <div class="warning">
                            <?php
                                if (isset($_POST['submit'])) {
                                  if ($_FILES["logo"]["size"] == 0) {
                                      echo "Please Choose File first!";}

                                  else{
                                      $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                                      $logo_type = $_POST['logo_type'];
                                      $sql = "UPDATE `ref_logo` SET logo_img='$logo' WHERE logo_Name='$logo_type';";

                                    if (mysqli_query($db, $sql)) {
                                        echo "upload success";}
                                    else {
                                        echo "upload failed";}
                                  }
                                }
                            ?>
                          </div>
                          </tr>
                          </table>
                          </div>

                        </div>
                      </div>
      </section>

  </body>
</html>
