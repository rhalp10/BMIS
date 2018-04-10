<?php
include 'connection.php';
$s1="";?>
<!DOCTYPE>
<html>

<style>
#wrapper {
  text-align: center;
  margin:0 auto;
  padding:0px;
  width:995;
}
#output_image {
  max-width: 300px;
}

</style>
  <head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </head>
  <body>
    <div ng-app="app" ng-controller="ctrl" class="wrapper">
      <nav>
        <div class="logo">Input Logo</div>
        <ul>

          <li class="dd">

          </li>
        
          <li><a href="index.php">Back</a></li>
        </ul>
      </nav>

      <section class="sec1">
                      <div class="qwe">
                        <div class="input-container1"> 
                          <div class="mb_logo borderNow">
                            <h3>Input Logo</h3>
                            <div class="uploadform">
                              <div class="left1">

                                <form class="" action="inputLogo.php" method="post" enctype="multipart/form-data">
                                  <select name="logo_type">
                                    <option name="logo_type" value="Municipal Logo">Municipal Logo</option>
                                    <option name="logo_type" value="Barangay Logo">Barangay Logo</option>
                                  </select>

                              </div>
                              <!-- <div class="right1"> -->
                            <section class="wrapper">
                               <!--  <input class="file" type="file" name="logo"> -->
                               <input type="file" accept="image/*" onchange="preview_image(event)" name="logo">
                               
                               <img id="output_image"/>
                             
                                                              </section>
                                                              <script type='text/javascript'>
                                function preview_image(event)
                                {
                                  var reader = new FileReader();
                                  reader.onload = function()
                                { 
                                  var output = document.getElementById('output_image');
                                  output.src= reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                              }

                                </script>

                                <input type="submit" name="submit" value="Upload">
                                </form>
                              </div>
                            </div>

                            <br><br><br>
                            <div class="warning">
                            <?php
                                if (isset($_POST['submit'])) {
                                  if ($_FILES["logo"]["size"] == 0) {
                                      echo "Please Choose File first!";}

                                  else{
                                      $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                                      $logo_type = $_POST['logo_type'];
                                      $sql = "UPDATE `ref_logo` SET logo_img='$logo' WHERE logo_Name='$logo_type';";

                                    if (mysqli_query($conn, $sql)) {
                                        echo "upload success";}
                                    else {
                                        echo "upload failed";}
                                  }
                                }
                            ?>
                          </div>
                          </div>

                        </div>
                      </div>
      </section>
    </div>
  </body>
</html>
