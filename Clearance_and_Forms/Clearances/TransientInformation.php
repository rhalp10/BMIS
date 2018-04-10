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
  $gender = $_POST['gender'];
  $bPlace = $_POST['bPlace'];
  $birthdate = $_POST['birthdate'];
  $civilStatus = $_POST['civilStatus'];
  $educ = $_POST['educ'];
  $citi = $_POST['citi'];
  $houseNo = $_POST['houseNo'];
  $street = $_POST['street'];
  $barangay = $_POST['barangay'];
  $municipality = $_POST['municipality'];
  $province = $_POST['province'];
  $temp_houseNo = $_POST['temp_houseNo'];
  $temp_street = $_POST['temp_street'];
  $temp_barangay = $_POST['temp_barangay'];
  $spouse_first = $_POST['spouse_first'];
  $spouse_middleName = $_POST['spouse_middleName'];
  $spouse_lName = $_POST['spouse_lName'];
  $spouse_bPlace = $_POST['spouse_bPlace'];
  $spouse_bDate = $_POST['spouse_bDate'];
  $emp_name = $_POST['emp_name'];
  $work = $_POST['work'];
  $reference_name = $_POST['reference_name'];
  $con_Num = $_POST['con_Num'];
  $date_trans = $_POST['date_trans'];
  $ctcNo = $_POST['ctcNo'];
  $orNo = $_POST['orNo'];
  $reason = $_POST['reason'];


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
$logoMunicipal="Municipal Logo";
$sqllogo1 = "SELECT * FROM ref_logo WHERE logo_Name='$logoMunicipal';";
$sth1 = mysqli_query($conn, $sqllogo1);
$resultlogo1=mysqli_fetch_array($sth1);
?>
<?php
$trans="transient";
$sqltrans= "SELECT * FROM temp_pic_holder WHERE pic_Name='$trans';";
$transR = mysqli_query($conn, $sqltrans);
$resultTrans=mysqli_fetch_array($transR);
?>
<?php
  $cptposi = "2";
    $sql13 = "SELECT brgy_ID, citymun_ID, province_ID  FROM resident_detail
              LEFT JOIN resident_address ON resident_detail.res_ID =
              resident_address.res_ID where position_ID='$cptposi';";

    $result13 = mysqli_query($conn, $sql13);
    $resultCheck13 = mysqli_num_rows($result13);
    if($resultCheck13 > 0){
      while($row13 = mysqli_fetch_assoc($result13)){
         $ssr= $row13['brgy_ID'];
        $head_citymun_Name = $row13['citymun_ID'];
        $head_province_Name = $row13['province_ID'];

?>

<?php
    $bbr = $ssr;
    $sqldet = "SELECT brgy_Name FROM ref_brgy WHERE brgy_ID='$bbr';";

    $resultdet= mysqli_query($conn, $sqldet);
    $resultCheckdet = mysqli_num_rows($resultdet);
    if($resultCheckdet > 0){
      while($rowdet = mysqli_fetch_assoc($resultdet)){
      $head_brgy_Name = $rowdet['brgy_Name'];
      }
    }
?>
<?php
    $bbsd = $head_citymun_Name;
    $sqlmun = "SELECT citymun_Name FROM ref_citymun WHERE  citymun_ID='$bbsd';";

    $resultmun= mysqli_query($conn, $sqlmun);
    $resultCheckmun = mysqli_num_rows($resultmun);
    if($resultCheckmun > 0){
      while($rowmun = mysqli_fetch_assoc($resultmun)){
      $citymun_disp = $rowmun['citymun_Name'];
      }
    }
?>
<?php
    $bbc3 = $head_province_Name;
    $sqlc3 = "SELECT province_Name FROM ref_province WHERE  province_ID='$bbc3';";

    $resultc3= mysqli_query($conn, $sqlc3);
    $resultCheckc3 = mysqli_num_rows($resultc3);
    if($resultCheckc3 > 0){
      while($rowc3 = mysqli_fetch_assoc($resultc3)){
      $province_disp = $rowc3['province_Name'];
      }
    }
  }
}
?>

<!--end of header and display officials-->
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
    <title>Transient Information</title>
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
        <span id="name-input">Barangay <?php echo $head_brgy_Name;?></span><br>
      </div>
      <div class="header tag">
        OFFICE OF THE BARANGAY HEAD
      </div>
      <div class="header tag1">
        BARANGAY TRANSIENT INFORMATOIN
      </div>
        <div class="c-wrapper borderNow">
          <div class="p-holder">
            <p>
              <div class="labeling">
                NAME: &emsp;&emsp;&emsp;(Last Name: &emsp;&emsp;&emsp;First Name: &emsp;&emsp;&emsp;Middle Name:)<br>
              </div>
              <div class="input-holder">
                <span id="name-input"><?php echo $lastName.",".$first." ".$middleName;?></span><br>
              </div>
              <div class="labeling">
                PREVIOUS ADDRESS (COMPLETE)&emsp;(House No. / Street / Barangay / Mucipality / Province)<br>
              </div>
              <div class="input-holder">
                <span id="name-input"><?php echo $houseNo." ".$street.",".$barangay." ".$municipality." ".$province;?></span>
              </div>
              <div class="labeling">
                TEMPORARY ADDRESS IN THE BARANGAY (COMPLETE) &emsp;(House No. / Street / Barangay)<br>
              </div>
              <div class="input-holder">
                <span id="name-input"><?php echo $temp_houseNo." ".$temp_street.",".$temp_barangay;?></span>
              </div>
              <div class="labeling">
                    Transferred on: <span id="name-input"><?php echo $date_trans;?></span>
              </div>
              <div class="labeling">
                    Reason for Transfer:
              </div>
              <div class="input-holder">
                  <span id="name-input"><?php echo $reason?></span><br><br>
              </div>
                    &nbsp;BIRTHDAY: <span id="name-input"><?php echo $birthdate;?></span>&emsp;&emsp;
                    GENDER: <span id="name-input"><?php echo $gender;?></span><br>
                    &nbsp;BIRTH PLACE: <span id="name-input"><?php echo $bPlace;?></span>
                    &emsp;&emsp;CIVIL STATUS: <span id="name-input"><?php echo $civilStatus?></span><br>
                    &nbsp;EDUCATIONAL ATTAINMENT: <span id="name-input"><?php echo $educ?></span>
                    &emsp;&emsp;
                    &emsp;&emsp;CITIZENSHIP: <span id="name-input"><?php echo $citi?></span>
              <div class="labeling">
                  NAME OF SPOUSE (if married): &emsp;(Last Name: &emsp;&emsp;&emsp;First Name: &emsp;&emsp;&emsp;Maiden Name:<br>
              </div>
              <div class="input-holder">
                <span id="name-input"><?php echo $spouse_lName.","." ".$spouse_first." ".$spouse_middleName;?></span><br>
              </div>
                  &nbsp;BIRTH PLACE: <span id="name-input"><?php echo $spouse_bPlace?></span>&emsp;&emsp;BIRTHDAY: <span id="name-input"><?php echo $spouse_bDate;?></span><br><br>
              <div class="labeling">
                  EMPLOYER (if employed): <span id="name-input"><?php echo $emp_name;?></span><br>
                  WORK / OCCUPATION: <span id="name-input"><?php echo $work?></span><br>
              </div>
              <div class="labeling">
                  REFERENCE: <span id="name-input"><?php echo $reference_name?></span>&emsp;&emsp;CONTACT #: <span id="name-input"><?php echo $con_Num?></span>
              </div>
              <div class="footer-holder">
                <div class="left250">
                  <div class="pic_holder">
                    <?php
                      echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultTrans['pic_holder'] ).'"/>';
                    ?>
                  </div>
                  <div class="ctc1">
                    CTC NO. <span id="name-input"><?php echo $ctcNo;?></span><br>
                    ISSUED ON: <span id="name-input"><?php echo $datedate;?></span><br>
                    ISSUED AT: <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span><br>
                    O.R. NO. <span id="name-input"><?php echo $orNo;?></span><br>
                  </div>
                </div>
                <div class="dual-thumb">
                  <div class="note">
                    &emsp;&emsp;&emsp;I do solemnly swear that the above information regarding my personality is true and correct to the best of my knowledge
                    and the fingerprints appearing here are mine.
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
            </p>
        <div class="seal">
          <i>NOTE: not valid without a seal</i>
        </div>
     </div>
    </div>
    <h3><a href="javascript:genPDF();" data-html2canvas-ignore="true">Download PDF</a><h3>
  </body>
</html>
