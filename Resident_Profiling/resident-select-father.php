<!DOCTYPE html>

<?php
include("connections.php");
    $connect = mysqli_connect("localhost", "root", "", "bmis_db");  
$largestNumber= $rid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( res_id ) AS max FROM `resident_detail`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestNumber = $row['max'];
                                    $rid= $largestNumber+1;
                               
                                 

                                  ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body style="font-family: calibri; font-size: 18px; "> 

<br> <?php  
 $connect = mysqli_connect("localhost", "root", "", "bmis_db");  
 $query ="SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
sfx.suffix,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_suffixname sfx ON rd.suffix_ID = sfx.suffix_ID 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID where gender_Name='Male'  && res_ID != $largestNumber   "  ;  
 $result = mysqli_query($db, $query);  
 ?>  

<div class="container">
  <div class="table-responsive">
  <table class="table table table-hover" id="mytable">
  <thead>
     <tr>
      <th scope="col">Operations</th>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Marital</th>
        <th scope="col">Sex</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
    </tr>
  
  </thead>
     <?php  
                     while($row = mysqli_fetch_array($result))  
                          {  
                             ?> 
                               <tr>  
                               <td>
                                
               <a href="floader1.php?id=<?php echo $row['res_ID'] ?>" class="btn btn-primary btn-s">Select</a>
          </td>
                                    <td><?php echo $row["res_ID"]?></td>  
                                    <td><?php echo $row["res_fName"]?></td>  
                                    <td><?php echo $row["res_mName"]?></td>  
                                    <td><?php echo $row["res_lName"]?></td>  
                                    <td><?php echo $row["suffix"]?></td> 
                                      <td><?php echo $row["res_Bday"]?></td>  
                                    <td><?php echo $row["marital_Name"]?></td>  
                                    <td><?php echo $row["gender_Name"]?></td> 
                                    <td><?php echo $row["religion_Name"]?></td> 
                                     <td><?php echo $row["country_nationality"]?></td>  
                                    <td><?php echo $row["country_citizenship"]?></td>  
                                     <td><?php echo $row["occupation_Name"]?></td>  
                                      <td><?php echo $row["occuStat_Name"]?></td>  
                                       <td><?php echo $row["res_Date_Record"]?></td>  
                                    
                               </tr>  
                               <?php
                          }
                          ?>  
  <tfoot>
    <tr>
      <th scope="col">Operations</th>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Marital</th>
        <th scope="col">Sex</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
    </tr>
  
  </tfoot>
  </table>
</div>
  </div>
 <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendor/js/jquery.dataTables.min.js"></script>  
     <script src="vendor/js/dataTables.bootstrap.min.js"></script>
       <script>$(document).ready(function() {
    var table = $('#mytable').removeAttr('width').DataTable( {
        scrollY:        "400px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        columnDefs: [
            { width: 110, targets: 0 }

        ],
        fixedColumns: true
    } );
} );</script>
  
  </body>  
</html>