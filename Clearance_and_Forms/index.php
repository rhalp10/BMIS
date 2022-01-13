<?php
session_start();
include("session.php");
include 'connection.php';
$s1="";
$s2="";
$s3="";

if (isset($_POST['verify_Res'])){
  $var_id = $_POST['a1'];
  if(empty($var_id)){
    $s2 = "Please Select Resident First!";
  }
  else{
    $sql_blot =  "SELECT * FROM ms_incident msi
                  LEFT JOIN ms_incident_offender mso ON msi.incident_id = mso.incident_id
                  WHERE msi.status!=5 AND mso.res_ID='$var_id'";

    $result1 = mysqli_query($db, $sql_blot);
    $resultCheck1 = mysqli_num_rows($result1);

        if($resultCheck1 > 0){
              $s1 = "Denied!! Unsettled Case detected!";
        }
        else{
              $s1 = "Resident is clear!";
        }

  }
}
if (isset($_POST['labuleh'])) {
$var_id = $_POST['a1'];
$var_or = $_POST['or'];
$var_crc = $_POST['crc'];
if(empty($var_or) || empty($var_crc)){
  $s2 = "Please input CTC or OR no.";
}
else{
  if(empty($var_id)){
    $var_id = $_POST['a1'];
    $var_forms = $_POST['forms'];
    $s2 = "Please Search & Select resident!";
    if(empty($var_or) && $var_forms=="Film Making Permit" || $var_forms=="Film Making" || $var_forms=="Barangay Film Making" || $var_forms=="Barangay Film Making Permit"){
      $var_or = $_POST['or'];
      $var_crc = $_POST['crc'];
      header("Location:Creator/CreateFilmMakingPermit.php?or=$var_or&crc=$var_crc");
    }
    $var_or = $_POST['or'];
    $var_crc = $_POST['crc'];
    if(empty($var_id) && $var_forms=="Barangay Transient Information" || $var_forms=="Transient Information" || $var_forms=="Barangay Transient"){
      header("Location:Creator/CreateTransientInformation.php?or=$var_or&ctc=$var_crc");
    }
    if(empty($var_id) && $var_forms=="Working Permit" || $var_forms=="Barangay Working Permit"){
      header("Location:Creator/CreateWorkingPermit.php?res_ID=$var_id&or=$var_or&crc=$var_crc");

  }
  }
  else{

    $var_forms = $_POST['forms'];
    $var_or = $_POST['or'];
    $var_crc = $_POST['crc'];

    $sql_blot =  "SELECT * FROM ms_incident msi
                  LEFT JOIN ms_incident_offender mso ON msi.incident_id = mso.incident_id
                  WHERE msi.status!=5 AND mso.res_ID='$var_id'";

    $result1 = mysqli_query($db, $sql_blot);
    $resultCheck1 = mysqli_num_rows($result1);

        if($resultCheck1 > 0){
              $s1 = "Can't Issue Clearance!! Please Check the Blotter Records";
        }
        else{

                  if($var_forms=="Barangay Clearance"){
                    header("Location:Clearances/BarangayClearance.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Building Permit" || $var_forms=="Barangay Building Permit" ){
                    header("Location:Creator/CreateBuildingPermit.php?res_ID=$var_id&or=$var_or&ctc=$var_crc");
                  }
                  else if($var_forms=="Barangay Business Permit" || $var_forms=="Business Permit"){

                    header("Location:Creator/CreateBusinessPermit.php?res_ID=$var_id&or=$var_or&ctc=$var_crc");
                  }
                  else if($var_forms=="Certificate of Indigency" || $var_forms=="Indigency"){
                    header("Location:Clearances/CertificateOfIndigency.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Barangay Logging" || $var_forms=="Logging Permit" ||$var_forms=="Logging" || $var_forms=="Tree Cutting" || $var_forms=="Cutting Trees"){
                    header("Location:Clearances/CuttingTrees.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Electrical Permit" || $var_forms=="Barangay Electrical Permit"){
                    header("Location:Clearances/ElectricalPermit.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Barangay Fencing" || $var_forms=="Fencing" || $var_forms=="Fencing Permit" || $var_forms=="Barangay Fencing Permit"){
                    header("Location:Creator/CreateFencingPermit.php?res_ID=$var_id&or=$var_or&ctc=$var_crc");
                  }
                  else if($var_forms=="Working Permit" || $var_forms=="Barangay Working Permit"){
                    header("Location:Creator/CreateWorkingPermit.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Film Making" || $var_forms=="Film Making Permit" || $var_forms=="Shooting Permit"){
                    header("Location:Creator/CreateFilmMakingPermit.php?res_ID=$var_id&or=$var_or&crc=$var_crc");
                  }
                  else if($var_forms=="Barangay Transient Information" || $var_forms=="Transient Information" || $var_forms=="Barangay Transient"){
                    header("Location:Creator/CreateTransientInformation.php?or=$var_or&ctc=$var_crc");
                  }


                  else{$s3 = "template not available!! ";}
              }


  }
}

}?>
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
        <div class="logo">Forms and Clearances&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
        <ul>
          <strong><li><a style="text-decoration: none" href="inputLogo.php">Input Logo</a></li>
          <li><a style="text-decoration: none" href="filter.php">Logs</a></li>
          <li><a style="text-decoration: none" href="setter.php">Set-up Barangay Address</a></li>
          <li class="dd">
            </strong>
        </ul>
      </nav>

      <section class="sec1">
                      <div class="qwe col-md-14">

                        <div class="input-container1">
                          <div class="mb_names borderNow toCenterDiv">
                            <center><h2>PERMIT | CLEARANCE</h2></center>
                            <div class="mb_names_holder">
                                <div class="intro-text text-right">
                                  <form action="index.php" method="post">
                                    <input type="text" name="search" placeholder="Search Resident">
                                    <input type="submit"name="searchbtn" id="searchbtn" value="Search" <button class="btn btn-success"></button>
                                  </form>
                             </div>
                             <div class="super_holder">
                                  <table id="table" border="1px" text-align="center" width="100%" class="table table-striped" overflow-y = "auto">
                                    <tr>
                                      <th colspan="10"><h3>Results</h3></th>
                                    </tr>
                                    <tr>
                                      <!-- <th>ID</th> -->
                                      <th>First Name</th>
                                      <th>Middle Name</th>
                                      <th>Last Name</th>
                                      <th>Civil Status</th>
                                      <th>Phase</th>
                                      <th>Lot</th>
                                      <th>Block</th>
                                      <th>House No.</th>
                                      <th>Street</th>
                                    </tr>
                                    <?php
                                    if(isset($_POST['searchbtn'])){
                                       $searchq = $_POST['search'];
                                        $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
                                        $squery = "SELECT resident_detail.res_ID, res_fName, res_mName, res_lName, marital_Name,
                                                  address_Lot_No, address_Block_No, address_Phase_No, address_House_No, address_Street_Name
                                                  FROM resident_detail
                                                	LEFT JOIN resident_address ON resident_detail.res_ID = resident_address.res_ID
                                                  LEFT JOIN ref_marital_status ON resident_detail.marital_ID = ref_marital_status.marital_ID
                                                  LEFT JOIN ref_country ON resident_detail.country_ID = ref_country.country_ID
                                                  LEFT JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID
                                                  LEFT JOIN ref_religion ON resident_detail.religion_ID = ref_religion.religion_ID
                                                  LEFT JOIN ref_brgy ON resident_address.brgy_ID = ref_brgy.brgy_ID
                                                  LEFT JOIN ref_citymun ON resident_address.citymun_ID = ref_citymun.citymun_ID
                                                  LEFT JOIN ref_province ON resident_address.province_ID = ref_province.province_ID
                                                  WHERE resident_detail.res_fName LIKE '%$searchq%' OR resident_detail.res_lName LIKE '%$searchq%'
                                                  ORDER BY res_lName ASC";

                                                  $res_conf = mysqli_query($db, $squery);
                                                  $conf_check = mysqli_num_rows($res_conf);


                                        if($conf_check > 0){
                                          while($row6 = mysqli_fetch_assoc($res_conf)){
                                        ?>
                                        <tr>
                                          <td class="hidden"><?php echo $row6['res_ID'];?></td>
                                          <td><?php echo $row6['res_fName'];?></td>
                                          <td><?php echo $row6['res_mName'];;?></td>
                                          <td><?php echo $row6['res_lName'];?></td>
                                          <td><?php echo $row6['marital_Name'];?></td>
                                          <td><?php echo $row6['address_Phase_No'];?></td>
                                          <td><?php echo $row6['address_Lot_No'];?></td>
                                          <td><?php echo $row6['address_Block_No'];;?></td>
                                          <td><?php echo $row6['address_House_No'];?></td>
                                          <td><?php echo $row6['address_Street_Name'];?></td>
                                        </tr>
                                        <?php
                                          }
                                        }
                                        else{$s2 = "Person is not a resident in the Barangay";}
                                    }
                                    ?>
    </table>
  </div>

                              <div class="resu">
                                <form action="index.php" method="post">
                                <input type="hidden" id="a1" readonly="readonly" name="a1">
                                First Name  <input class="form-control" id="a2" readonly="readonly" name="a2"><br><br>
                                Middle Name  <input class="form-control" id="a3" readonly="readonly" name="a3"><br><br>
                                Last Name  <input class="form-control" id="a4" readonly="readonly" name="a4"><br><br>
                                  <label>Select&nbsp;Clearance/Forms</label><select class="form-control" id="sel1" name="forms">
                                    <option><li></li></option>
                                          <?php

                                          $sql_ret = "SELECT clearance_form, purpose FROM finance_clearance_list
                                                       LEFT JOIN finance_clearance_set ON finance_clearance_list.clearance_id = finance_clearance_set.clearance_id";
                                          $result_ret = mysqli_query($db, $sql_ret);
                                          $resultCheck_ret = mysqli_num_rows($result_ret);

                                          if($resultCheck_ret > 0){
                                            while($row_ret = mysqli_fetch_assoc($result_ret)){
                                              ?>
                                              <option name="forms" value="<?php echo $row_ret['clearance_form'];?>"><?php echo $row_ret['clearance_form']." "."-"." ".$row_ret['purpose'];?></option>
                                              <?php
                                            }
                                          }
                                          ?>

                                  </select><br><br>


                                OR&nbsp;Number<input  class="form-control" type="number" id="or" placeholder="O.R Number" name="or"><br><br>
                                CTC Number<input  class="form-control" type="number" id="crc" placeholder="CTC Number" name="crc">
                                  <br><input type="submit" id="verify_Res" value="Verify Resident" name="verify_Res" <button class="btn btn-success">
                                      <input type="submit" id="labuleh" value="Submit" name="labuleh" <button class="btn btn-success"></button><br><br>
                              </form>
                            </div>
                              </div>
                                    <script>
                                      var table = document.getElementById('table'), rIndex;
                                      for(var i=0; i<table.rows.length; i++){
                                        table.rows[i].onclick = function(){
                                          rIndex = this.rowsIndex;
                                          document.getElementById("a1").value = this.cells[0].innerHTML;
                                          document.getElementById("a2").value = this.cells[1].innerHTML;
                                          document.getElementById("a3").value = this.cells[2].innerHTML;
                                          document.getElementById("a4").value = this.cells[3].innerHTML;
                                        }

                                      }
                                    </script>

                                  <div class="warning center">
                                  <?php
                                    echo $s1;
                                    echo $s2;
                                    echo "$s3";
                                  ?>
                                  </div>
                            </div>

                          </div>
                        </div>
                      </div>
      </section>
    </div>
  </body>
</html>
