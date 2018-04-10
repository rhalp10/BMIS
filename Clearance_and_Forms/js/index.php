<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="js/jquery-2.1.3.js">
    </script>
    <script type="text/JavaScript">
      $(window).on('scroll', function(){
        if ($(window).scrollTop()){
          $('nav').addClass('black');
        }
        else{
          $('nav').removeClass('black');
        }
      })
    </script>
  </head>

  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">Forms and Clearances</div>
        <ul>
          <li class="dd">
            <a class="dropbtn" href="#">Create Forms and Clearances</a>
            <div class="ddcontent">
              <a href="Creator\CreateBarangayClearance.html">Barangay Clearance</a>
              <a href="Creator\CreateBuildingPermit.html">Bulding Permit</a>
              <a href="Creator\CreateBusinessPermit.html">Business Permit</a>
              <a href="Creator\CreateCertificateOfIndigency.html">Certifite of Indigency</a>
              <a href="Creator\CreateCuttingTrees.html">Cutting Trees</a>
              <a href="Creator\CreateElectricalPermit.html">Electrical Permit</a>
              <a href="Creator\CreateFencingPermit.html">Fencing Permit</a>
              <a href="Creator\CreateFilmMakingPermit.html">Film Making</a>
              <a href="Creator\CreateTransientInformation.php">Transient Information</a>
              <a href="Creator\CreateWorkingPermit.php">Working Permit</a>
            </div>
          </li>
          <li><a href="logs.php">Logs</a></li>
          <li><a href="#">Back</a></li>
        </ul>
      </nav>
      <section class="sec1">
        <div class="qwe">
          <div class="input-container center">
              <div>
              <table style="width:500px;" border="5">
                <tr><th colspan="2"><center><h1>Form Requests</h1></center></tr></th>
                  <tr>
                    <td><h2>res_ID</h2></td>
                    <td><h2>Purpose</h2></td>
                    <td><h2>Request Date</h2></td>
                  <tr>
                <?php
                  include_once 'connection.php';
                  $sql = "SELECT * FROM form_request;";
                  $result = mysqli_query($conn, $sql);
                  while($row=mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo"<td>".$row['res_ID']."</td>";
                    echo"<td>".$row['purpose_ID']."</td>";
                    echo"<td>".$row['request_Date']."</td>";
                    echo "<tr>";
                  }
                ?>
              </table>
              </div>
              <div class="uploadform">
                <h3>Input Logo</h3>
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="logo">
                  <select name="logo_type">
                    <option name="logo_type" value="Municipal Logo">Municipal Logo</option>
                    <option name="logo_type" value="Barangay Logo">Barangay Logo</option>
                  </select>
                  <input type="submit" name="submit" value="Upload">
                </form>
              </div>
              <?php

              if (isset($_POST['submit'])) {
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $logo_type = $_POST['logo_type'];

                $sql = "UPDATE `ref_logo` SET logo_img='$logo' WHERE logo_Name='$logo_type';";

                if (mysqli_query($conn, $sql)) {
                    echo "upload success";
                }
                else { echo "upload failed";}
              }

              ?>


          </div>
        </div>
      </section>
      <div id="HTMLtoPDF">
        <!--Add content here || fill up templates-->

        <!--Add content here || fill up templates-->
      </div>


      <!-- function that makes PDF -->
      <div id="footer">
        <h3><a href="#" onclick="HTMLtoPDF()">Download PDF</a><h3>
      </div>

      <!-- js files used for making PDF -->
      <script src="js/jspdf.js"></script>
      <script src="js/jquery-2.1.3.js"></script>
      <script src="js/pdfFromHTML.js"></script>

      <section class="content">

      </section>
    </div>
  </body>
</html>
