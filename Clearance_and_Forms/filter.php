<?php
$s3="";
include 'connection.php';
if(isset($_POST['print'])){
  $startd = $_POST['from'];
  $endd = $_POST['to'];
  if($startd=="" || $endd==""){
    $s3="PLease Choose a date to be printed!";
  }

  else{
    header("Location:logs.php?startd=$startd&endd=$endd");
  }

}

$s1="";?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Forms and Clearances</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
  </head>
  <body>
    <div ng-app="app" ng-controller="ctrl" class="wrapper">
      <nav  style="background-color: #e94b3c;" >
        <div class="logo">Filter Log to Print</div>
        <ul>
          <li><a href="index.php">Back</a></li>
        </ul>
      </nav>

      <section class="sec1">
                      <div class="qwe">
                        <div class="input-container1">
                          <div class="mb_logo3 borderNow">
                            <h3>Released FORMS</h3>
                            <form name="search"method="post">
                            <input type="date" name="from" placeholder="From Date"/>
                            <input type="date" name="to" placeholder="to Date"/>
                            <input type="submit" name="search" value="Search"><br><br><br>
                            <input type="submit" name="print" value="Print">
                            </form>
                          </div>
                          <div class="mb_logo borderNow">
                            <?php
                            if(isset($_POST['search'])){
                              $startd = $_POST['from'];
                              $endd = $_POST['to'];
                              $sss="SELECT res_fName, res_mName, res_lName, fcl.clearance_form, fcs.purpose, fcs.price, release_Date
                                        FROM form_release
                                        LEFT JOIN  resident_detail rd ON form_release.res_ID = rd.res_ID
                                        LEFT JOIN finance_clearance_set fcs ON form_release.form_ID = fcs.clearance_id
                                        LEFT JOIN finance_clearance_list fcl ON fCL.clearance_id = fcs.clearance_id
                                        WHERE release_Date BETWEEN '$startd' AND '$endd'";

                              $query = mysqli_query($conn, $sss);
                              $count = mysqli_num_rows($query);
                              ?>

                              <table class="table toCenterDiv">
                                <tr>
                                  <th>Name</th>
                                  <th>Clearance</th>
                                  <th>Purpose</th>
                                  <th>Price</th>
                                  <th>Date</th>
                                </tr>
                              <?php
                              if($count > 0){
                                while($row = mysqli_fetch_array($query)){
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
                          }
                          else{
                            echo "<div class='warning'>No Record Found!!</div>";
                          }
                        }
                        ?>
                              <div class="warning">
                              <?php echo $s3;?>
                              </div>
                          </div>
                        </div>
                      </div>
      </section>
    </div>
  </body>
</html>
