<?php
  include_once '../connection.php';
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
<?php
  $first = $_POST['first'];
  $middleName = $_POST['middleName'];
  $lastName = $_POST['lastName'];
  $bPlace = $_POST['bPlace'];
  $birthdate = $_POST['birthdate'];
  $civilStatus = $_POST['civilStatus'];
  $educ = $_POST['educ'];
  $height = $_POST['height'];
  $houseNo = $_POST['houseNo'];
  $street = $_POST['street'];
  $emp_name = $_POST['emp_name'];
  $reference_name = $_POST['reference_name'];
  $con_Num = $_POST['con_Num'];
  $weight = $_POST['weight'];
  $work = $_POST['work'];
  $religion = $_POST['religion'];
  $fa_fName = $_POST['fa_fName'];
  $fa_mName = $_POST['fa_mName'];
  $fa_lName = $_POST['fa_lName'];
  $mo_fName = $_POST['mo_fName'];
  $mo_mName = $_POST['mo_mName'];
  $mo_lName = $_POST['mo_lName'];

  include_once '../connection.php';
  if (isset($_POST['submit'])) {
    $picpic = addslashes(file_get_contents($_FILES['picpic']['tmp_name']));
    $picss = "transient";
    $sqlpicpic = "UPDATE `temp_pic_holder` SET pic_holder='$picpic' WHERE pic_Name='$picss';";
    if (mysqli_query($conn, $sqlpicpic)) {
    }
  }

?>
<?php
include_once '../connection.php';
$logoBarangay="Barangay Logo";
$sqllogo = "SELECT * FROM ref_logo WHERE logo_Name='$logoBarangay';";
$sth = mysqli_query($conn, $sqllogo);
$resultlogo=mysqli_fetch_array($sth);
?>
<?php
$trans="transient";
$sqltrans= "SELECT * FROM temp_pic_holder WHERE pic_Name='$trans';";
$transR = mysqli_query($conn, $sqltrans);
$resultTrans=mysqli_fetch_array($transR);
?>
<?php
$logoMunicipal="Municipal Logo";
$sqllogo1 = "SELECT * FROM ref_logo WHERE logo_Name='$logoMunicipal';";
$sth1 = mysqli_query($conn, $sqllogo1);
$resultlogo1=mysqli_fetch_array($sth1);
?>
<?php
  $capitan = "2";
  $sql1 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID
          ='$capitan';";

  $result1 = mysqli_query($conn, $sql1);
  $resultCheck1 = mysqli_num_rows($result1);

  if($resultCheck1 > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
      $capfName = $row1['res_fName'];
      $capmInitial = $row1['res_mName'];
      $caplName = $row1['res_lName'];
    }
  }
?>


<!--end of header and display officials-->
<?php
$sqlgetNow = "SELECT res_ID FROM resident_detail WHERE res_fName LIKE '%$first%' AND res_lName LIKE '%$lastName%' AND res_mName LIKE '%$middleName%';";
$resultgetNow = mysqli_query($conn, $sqlgetNow);
$resultcheckNow = mysqli_num_rows($resultgetNow);

if($resultcheckNow > 0){
  while($row99 = mysqli_fetch_assoc($resultgetNow)){
    $res_IDnow = $row99['res_ID'];
  }
}
?>
<?php
$ap = date_default_timezone_set('Asia/Manila');
date_default_timezone_get($ap);
$datedate = date('Y-m-d H:i:s');


$sqlsli = "INSERT INTO form_release (res_ID, form_ID, purpose_ID, release_date)
         VALUES ('$res_IDnow', 1, 1,'$datedate');";

         mysqli_query($conn, $sqlsli);
?>
<!DOCTYPE>
<html>
  <header>
    <title>Working Permit</title>
    <meta http-equiv="Content-Type" content ="text/html"; charset="utf-8" />
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
    <script type="text/javascript" src="../js/html2canvas.js"></script>
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
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
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
        Republic of the Philippines<br/>
        PROVINCE OF <?php echo $province_disp;?><br/>
        MUNICIPALITY OF <?php echo $citymun_disp;?><br/>
        <span id="name-input">Barangay <?php echo $head_brgy_Name;?></span><br><br>
      </div>
      <div class="header tag">
        OFFICE OF THE BARANGAY HEAD
      </div>
      <div class="header tag1">
        BARANGAY WORKING PERMIT
      </div>
        <div class="c-wrapper borderNow">
          <div class="p-holder">
            <p>
              <div class="labeling1">
                &emsp;&emsp;&emsp;Permit is hereby granted to Mr. / Ms. / Mrs. <span id="name-input"><?php echo $lastName.",".$first." ".$middleName;?></span>
                with postal address at <span id="name-input"><?php echo $houseNo." ".$street.",";?></span>
                <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span> to work within the jurisdiction
                of the Barangay as <span id="name-input"><?php echo $work."."?></span><br><br>

                &emsp;&emsp;His / Her Personal Data sheet are as follows, to wit,<br><br>
                &emsp;&emsp;&emsp;BIRTHDAY: <span id="name-input"><?php echo $birthdate;?></span><br>
                &emsp;&emsp;&emsp;BIRTH PLACE: <span id="name-input"><?php echo $bPlace;?></span><br>
                &emsp;&emsp;&emsp;HEIGHT: <span id="name-input"><?php echo $height;?></span>&emsp;&emsp;WEIGHT: <span id="name-input"><?php echo $weight;?></span><br>
                &emsp;&emsp;&emsp;CIVIL STATUS: <span id="name-input"><?php echo $civilStatus?></span><br>
                &emsp;&emsp;&emsp;EDUCATIONAL ATTAINMENT: <span id="name-input"><?php echo $educ?></span><br>
                &emsp;&emsp;&emsp;RELIGION: <span id="name-input"><?php echo $religion?></span><br><br>
                &emsp;&emsp;&emsp;NAME OF PARENTS:<br>
                  &emsp;&emsp;&emsp;&emsp;&emsp;FATHER: <span id="name-input"><?php echo $fa_lName.","." ".$fa_fName." ".$fa_mName?></span><br>
                  &emsp;&emsp;&emsp;&emsp;&emsp;MOTHER: <span id="name-input"><?php echo $mo_lName.","." ".$mo_fName." ".$mo_mName?></span><br><br>

                &emsp;&emsp;&emsp;REFERENCE:<br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<span id="name-input"><?php echo $reference_name;?></span>&emsp;&emsp;CONTACT #: <span id="name-input"><?php echo $con_Num?></span><br>
                &emsp;&emsp;&emsp;EMPLOYER: <span id="name-input"><?php echo $emp_name?></span><br><br>

                &emsp;&emsp;&emsp;Issued on <span id="name-input"><?php echo $datedate;?></span> at <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span>.

              </div>
              <div class="footer-holder">
                <div class="left250">
                  <div class="pic_holder marginl50">
                    <?php
                      echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultTrans['pic_holder'] ).'"/>';
                    ?>
                  </div>
                  <div class="signature1 signline center">APPLICANT'S SIGNATURE</div>

                </div>
                <div class="dual-thumb">
                  <div class="note1">
                    THUMB MARK
                  </div>
                  <div class="thumb_holder">
                  </div>
                  <div class="thumb_holder">
                  </div>
                  <div class="left_right">
                    LEFT
                  </div>
                  <div class="left_right">
                    RIGHT
                  </div>
                </div>
              </div>
              <div class="ccon">
                <div class="puno1">
                  <span id="name-input"><?php echo $capfName." ".$capmInitial."."." ".$caplName;?></span><br>
                  &emsp;PUNONG BARANGAY
                </div>
              </div>
          </div>
          <div class="seal">
            <i>NOTE: not valid without a seal</i>
          </div>
      </div>
      </p>
      <h3><a href="javascript:genPDF();" data-html2canvas-ignore="true">Download PDF</a><h3>
     </div>


  </body>
</html>
