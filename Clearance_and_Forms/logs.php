<?php
  include_once 'connection.php';
  $sql_Problema = "SELECT brgy_Name, citymun_Name, province_Name
                  FROM brgy_address_info";
  $result_Problema = mysqli_query($conn, $sql_Problema);
  $resultCheck_Problema = mysqli_num_rows($result_Problema);

    if($resultCheck_Problema >0){
      while($row = mysqli_fetch_assoc($result_Problema)){
        $head_brgy_Name = $row['brgy_Name'];
        $citymun_disp = $row['citymun_Name'];
        $province_disp =$row ['province_Name'];
      }
    }
?>
<!--logo-->
<?php

$startd = $_GET['startd'];
$endd = $_GET['endd'];
$logoBarangay="Barangay Logo";
$sqllogo = "SELECT * FROM ref_logo WHERE logo_Name='$logoBarangay';";
$sth = mysqli_query($conn, $sqllogo);
$resultlogo=mysqli_fetch_array($sth);
?>
<?php
$logoMunicipal="Municipal Logo";
$sqllogo1 = "SELECT * FROM ref_logo WHERE logo_Name='$logoMunicipal';";
$sth1 = mysqli_query($conn, $sqllogo1);
$resultlogo1=mysqli_fetch_array($sth1);

$ncsql = "SELECT res_fName, res_mName, res_lName, fcl.clearance_form, fcs.purpose, fcs.price, release_Date
          FROM form_release
          LEFT JOIN  resident_detail rd ON form_release.res_ID = rd.res_ID
          LEFT JOIN finance_clearance_set fcs ON form_release.form_ID = fcs.clearance_id
          LEFT JOIN finance_clearance_list fcl ON fCL.clearance_id = fcs.clearance_id
          WHERE release_Date BETWEEN '$startd' AND '$endd'";

$resultnc = mysqli_query($conn, $ncsql);

?>
<!--end of logo-->


<?php
  $cptposi = "2";
    $sql13 = "SELECT res_fName, res_mName, res_lName,brgy_ID, citymun_ID, province_ID  FROM resident_detail
              LEFT JOIN resident_address ON resident_detail.res_ID =
              resident_address.res_ID where position_ID='$cptposi';";

    $result13 = mysqli_query($conn, $sql13);
    $resultCheck13 = mysqli_num_rows($result13);
    if($resultCheck13 > 0){
      while($row13 = mysqli_fetch_assoc($result13)){

        $capfName = $row13['res_fName'];
        $capmInitial = $row13['res_mName'];
        $caplName = $row13['res_lName'];

      }
    }
?>
<?php
  $cptposi = "3";
    $sql13 = "SELECT res_fName, res_mName, res_lName,brgy_ID, citymun_ID, province_ID  FROM resident_detail
              LEFT JOIN resident_address ON resident_detail.res_ID =
              resident_address.res_ID where position_ID='$cptposi';";

    $result13 = mysqli_query($conn, $sql13);
    $resultCheck13 = mysqli_num_rows($result13);
    if($resultCheck13 > 0){
      while($row13 = mysqli_fetch_assoc($result13)){

        $sfName = $row13['res_fName'];
        $smInitial = $row13['res_mName'];
        $slName = $row13['res_lName'];

      }
    }
?>





<!--end of header and display officials-->

<!DOCTYPE>
<html>
  <header>
    <title>Barangay Clearance</title>
    <meta http-equiv="Content-Type" content ="text/html"; charset="utf-8" />
    <script type="text/javascript" src="js/jspdf.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.js"></script>

    <script type="text/javascript">
      function genPDF() {
        html2canvas(document.getElementById('main-container')).then(function(canvas) {
                        scale: 1;

                        var img = canvas.toDataURL('image/png', 1.0);
                        if(canvas.width > canvas.height){
                          doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
                          }
                          else{
                          doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
                          }

                        doc.addImage(img, 'JPEG',-4, 20, canvas.width, canvas.height);
                        doc.save('BarangayClearance.pdf');
                    });﻿
      }
    </script>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </header>
  <body>


    <div id="main-container">

      <div class="logo-holder">
        <?php
          echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo['logo_img'] ).'"/>';
        ?>
      </div>
      <div class="logo-holder1">
        <?php
          echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo1['logo_img'] ).'"/>';
        ?>
      </div>

      <div class="header">
        REPUBLIC OF THE PHILIPPINES<br/>
        PROVINCE OF <?php echo $province_disp;?><br/>
        MUNICIPALITY OF <?php echo $citymun_disp;?><br/>
        <span id="name-input">Barangay <?php echo $head_brgy_Name;?></span><br>
      </div>


      <div class="header tag">
        OFFICE OF THE BARANGAY HEAD
      </div>
      <div class="header tag1">
        FORMS RELEASED
      </div>
        <div class="c-wrapper">
          <div class="emem toCenterDiv">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Clearance</th>
                  <th>Purpose</th>
                  <th>Price</th>
                  <th>Date</th>
                </tr>
              <?php
                while($row = mysqli_fetch_array($resultnc)){
              ?>
                <tr>
                  <td><?php echo $row['res_fName']." ".$row['res_mName']." ".$row['res_lName']?></td>
                  <td><?php echo $row['clearance_form'];?></td>
                  <td><?php echo $row['purpose'];?></td>
                  <td><?php echo $row['price'];?></td>
                  <td><?php echo $row['release_Date'];?></td>

                </tr>
              <?php
                }
              ?>
            </table>
          </div>
              <div class="nenene">
              Prepared By:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Approved by:
              </div>
              <div class="ccon1">
              <div class="secreta">
              <span id="name-input"><?php echo $sfName." ".$smInitial."."." ".$slName;?></span><br>
              &emsp;SECRETARY
              </div>
              </div>
              <div class="ccon">

                <div class="puno2">
                  <span id="name-input"><?php echo $capfName." ".$capmInitial."."." ".$caplName;?></span><br>
                  &emsp;PUNONG BARANGAY
                </div>
              </div>

        </div>
        
  </body>

</html>
