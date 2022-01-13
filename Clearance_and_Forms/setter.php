<?php
include 'connection.php';
$s1="";

      if (isset($_POST['labuleh'])) {
        $brgy_Name = $_POST['a1'];
        $citymun_Name = $_POST['a2'];
        $province_Name = $_POST['a3'];
        if(empty($brgy_Name)){
          $s1 = "Null!! Please Search and Select from the table!";
        }
        else{
          $sql_sub = "UPDATE brgy_address_info SET brgy_Name='$brgy_Name',
                      citymun_Name='$citymun_Name', province_Name='$province_Name'
                      WHERE caller_Code='setter'";
          if (mysqli_query($db, $sql_sub)) {$s1="Update Success!!";}
          else {echo $s1="Update Failed";}
        }

      }



?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Set up barangay address</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
  </head>
  <body>
    <div ng-app="app" ng-controller="ctrl" class="wrapper">
      <nav style="background: #14aa6c">
        <div class="logo">Barangay Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
        <ul>
          <li class="dd">
          </li>
          <li><a style="text-decoration: none;"href="index.php">Back</a></li>
        </ul>
      </nav>

      <section class="sec1">
                      <div class="qwe">
                        <div class="input-container1">
                          <div class="mb_names borderNow toCenterDiv">
                            <center><h3>Set Address</h3></center>
                            <div class="mb_names_holder">
                              <div class="intro-text text-right">
                            <form action="setter.php" method="post">
                              <input type="text" name="search" placeholder="Search">
                              <input class="btn btn-success" type="submit" name="searchbtn" id="searchbtn" value="Search">
                            </form>
                            </div>
                            <div class="super_holder">
                              <table id="table" border="1px" class="table" width =  "100%" >
                              <!-- <tr>
                                <th colspan="10"><h3>NAMES</h3></th>
                              </tr> -->
                              <tr>
                                <th class="text-center">Barangay </th>
                                <th class="text-center">Municipality</th>
                                <th class="text-center">Province</th>
                              </tr>
                              <?php
                              if(isset($_POST['searchbtn'])){
                                  $searchq = $_POST['search'];
                                  $searchq = preg_replace ("#^0-9a-z#i","",$searchq);
                                  $squery = "SELECT brgy_Name, citymun_Name, province_Name
                                            FROM ref_brgy rb
                                            LEFT JOIN ref_citymun rf ON rb.citymun_Code = rf.citymun_Code
                                            LEFT JOIN ref_province rp ON rp.province_Code = rb.province_Code
                                            WHERE brgy_Name LIKE '%$searchq%' OR citymun_Name LIKE '%$searchq%' OR province_Name LIKE '%$searchq%'  ORDER BY brgy_Name ASC " ;

                                            $res_conf = mysqli_query($db, $squery);
                                            $conf_check = mysqli_num_rows($res_conf);


                                  if($conf_check > 0){
                                    while($row6 = mysqli_fetch_assoc($res_conf)){
                                  ?>
                                  <tr>
                                    <td><?php echo $row6['brgy_Name'];?></td>
                                    <td><?php echo $row6['citymun_Name'];?></td>
                                    <td><?php echo $row6['province_Name'];;?></td>

                                  </tr>
                                  <?php
                                    }
                                  }
                                  else{$s2 = "No Records Found!!";}
                              }
                              ?>
                            </table>
                            <script>
                              var table = document.getElementById('table'), rIndex;
                              for(var i=0; i<table.rows.length; i++){
                                table.rows[i].onclick = function(){
                                  rIndex = this.rowsIndex;
                                  document.getElementById("a1").value = this.cells[0].innerHTML;
                                  document.getElementById("a2").value = this.cells[1].innerHTML;
                                  document.getElementById("a3").value = this.cells[2].innerHTML;

                                }
                              }
                            </script>
                            <div class="warning center">
                            <?php
                              echo $s1;
                            ?>
                            </div>
                            </div>
                            <div class="resu">
                              <form action="setter.php" method="post">
                                <label class="intro-text text-left">Barangay Name:</label><input class="form-control" type="text" id="a1" readonly="readonly" name="a1">
                                <label class="intro-text text-left">Municipality:</label><input class="form-control" type="text" id="a2" readonly="readonly" name="a2">
                                <label class="intro-text text-left">Province:</label><input class="form-control" type="text" id="a3" readonly="readonly" name="a3"><br><br>
                                <button class="btn btn-success" type="submit" id="labuleh" name="labuleh" >Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
      </section>
    </div>
  </body>
</html>
