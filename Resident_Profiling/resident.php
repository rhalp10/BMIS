<?php
session_start();
?>
<?php
$link=mysqli_connect("localhost", "root", "");
mysqli_select_db($link,"bmis_db");
?>

 <?php  
 $connect = mysqli_connect("localhost", "root", "", "bmis_db");  
 $query ="SELECT * FROM resident_detail ORDER BY res_ID DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  





<?php
include("connections.php");
$largestNumber= $rid= "";
                           $rowSQL = mysqli_query($connections, "SELECT MAX( res_ID ) AS max FROM `resident_detail`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestNumber = $row['max'];
                                    $rid= $largestNumber+1;
                              

                                  ?>



<?php
include("connections.php");
$largest_address= $aid= "";
                           $rowSQL = mysqli_query($connections, "SELECT MAX( address_ID ) AS max FROM `resident_address`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_address= $row['max'];
                                    $aid= $largest_address+1;
                                 

                                  ?>


<?php
include("connections.php");
$largest_contact= $cid= "";
                           $rowSQL = mysqli_query($connections, "SELECT MAX( contact_ID ) AS max FROM `resident_contact`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_contact= $row['max'];
                                    $cid= $largest_contact+1;
                                 

                                  ?>



<?php
 $connect = mysqli_connect("localhost", "root", "", "bmis_db");
$res_fname = $res_mname = $res_lname = $res_suffix = $res_gender = $res_bdate = $res_bdate = $res_civilstatus= $res_contactnum =$res_id = $res_contacttype = $res_religion = $res_occupationstatus= $res_occupation =$res_height= $res_weight= $res_citizenship=  $res_houseno=   $res_purokno= $res_region= $res_address= $res_brgy="" ;

 $res_building= $res_lot= $res_block= $res_phase=$res_street =$res_subd= "";

 $res_unit=  "0";     

$isuffix= $igender= $icstatus = $ictype= $irel= $ioccst= $iocc= $iciti= $ipurok=$iadd= $ibrgy="" ;



  if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_fname=$_POST["res_fname"];
        }
        

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_mname=$_POST["res_mname"];
        }
        

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_lname=$_POST["res_lname"];
        }


 if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $isuffix=$_POST["res_suffix"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $suffix= "";
                        $rows = mysqli_query($connections, "SELECT suffix_ID  FROM `ref_suffixname` where suffix = '$isuffix';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $suffix = $row['suffix_ID'];
             $res_suffix=$suffix;
        }





if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $igender=$_POST["res_gender"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $gender= "";
                        $rows = mysqli_query($connections, "SELECT gender_ID  FROM `ref_gender` where gender_Name = '$igender';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $gender = $row['gender_ID'];
             $res_gender=$gender;
        }


 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_bdate=$_POST["res_bdate"];
        }
 

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $icstatus=$_POST["res_civilstatus"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $cstatus= "";
                        $rows = mysqli_query($connections, "SELECT marital_ID  FROM `ref_marital_status` where marital_Name = '$icstatus';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $cstatus = $row['marital_ID'];
             $res_civilstatus=$cstatus;
        }



 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_contactnum=$_POST["res_contactnum"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ictype=$_POST["res_contacttype"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $ctype= "";
                        $rows = mysqli_query($connections, "SELECT contactType_ID  FROM `ref_contact` where contactType_Name = '$ictype';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $ctype = $row['contactType_ID'];
             $res_contacttype=$ctype;
        }


 
if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $irel=$_POST["res_religion"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $relig= "";
                        $rows = mysqli_query($connections, "SELECT religion_ID  FROM `ref_religion` where religion_name = '$irel';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $relig = $row['religion_ID'];
             $res_religion= $relig;
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ioccst=$_POST["res_occupationstatus"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $occst= "";
                        $rows = mysqli_query($connections, "SELECT occuStat_ID  FROM `ref_occupation_status` where occuStat_Name = '$ioccst';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $occst = $row['occuStat_ID'];
             $res_occupationstatus=$occst;
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iocc=$_POST["res_occupation"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $occ= "";
                        $rows = mysqli_query($connections, "SELECT occupation_ID  FROM `ref_occupation` where occupation_Name = '$iocc';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $occ = $row['occupation_ID'];
             $res_occupation=$occ;
        }


 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_height=$_POST["res_height"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_weight=$_POST["res_weight"];
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iciti=$_POST["res_citizenship"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $citi= "";
                        $rows = mysqli_query($connections, "SELECT country_ID  FROM `ref_country` where country_citizenship = '$iciti';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $citi= $row['country_ID'];
             $res_citizenship= $citi;
        }


  if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_unit=$_POST["res_unit"];
        }
        


if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_building=$_POST["res_building"];
        }
        

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_lot=$_POST["res_lot"];
        }
        

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_block=$_POST["res_block"];
        }


 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_phase=$_POST["res_phase"];
        }
    
if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_houseno=$_POST["res_houseno"];
        } 


if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_street=$_POST["res_street"];
        }
        

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_subd=$_POST["res_subd"];
        }



if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ipurok=$_POST["res_purokno"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $purok= "";
             $region= "";
                        $rows = mysqli_query($connections, "SELECT purok_ID,region_Code  FROM `ref_purok` where purok_Name = '$ipurok';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $purok = $row['purok_ID'];
                                  $region = $row['region_Code'];
            
             $res_purokno=$purok;
            
             $res_region=$region;
        }



if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iadd=$_POST["res_address"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $address= "";
                        $rows = mysqli_query($connections, "SELECT addressType_ID  FROM `ref_address` where addressType_Name = '$iadd';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $address= $row['addressType_ID'];
             $res_address= $address;
        }





if ($_SERVER["REQUEST_METHOD"]== "POST"){
 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
}
?>

<?php
  

       
   
 
If($rid &&$res_fname  && $res_lname && $res_suffix && $res_gender && $res_bdate && $res_civilstatus && $res_religion && $res_religion && $res_occupationstatus && $res_occupation && $res_height && $res_weight && $res_citizenship){
        
    
    
        $query=mysqli_query($connections,"INSERT INTO resident_detail(res_ID,res_Img, 
res_fName, res_mName,res_lName,suffix_ID, gender_ID, res_Bday, marital_ID,religion_ID,res_Height,res_Weight, occuStat_ID,occupation_ID,country_ID) VALUES('$rid','$file','$res_fname','$res_mname','$res_lname','$res_suffix','$res_gender','$res_bdate','$res_civilstatus','$res_religion','$res_height', '$res_weight','$res_occupationstatus','$res_occupation','$res_citizenship') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    
    
        if ($res_contactnum && $rid && $res_contacttype && $res_citizenship){
             $query=mysqli_query($connections,"INSERT INTO resident_contact(contact_ID,contact_telnum,res_ID,contactType_ID,country_ID) VALUES('$cid','$res_contactnum','$rid','$res_contacttype','$res_citizenship') ");
            
        }
    
          if ( $rid ){
             $query=mysqli_query($connections,"INSERT INTO resident_address(address_ID,address_Unit_Room_Floor_num,res_ID,address_BuildingName,address_Lot_No,address_Block_No,address_Phase_No,address_House_No,address_Street_Name,address_Subdivision,country_ID,purok_ID,region_ID,addressType_ID) VALUES('$aid','$res_unit','$rid','$res_building',' $res_lot',' $res_block','$res_phase','$res_houseno','$res_street','$res_subd','$res_citizenship','$res_purokno','$res_region','$res_address') ");
            
        }
         
    header('Location: profile.php');
       
    }



?>


<!DOCTYPE html>
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
  <body style="font-family: calibri; font-size: 20px; ">

<br>
<br>
<br>
 <div class="container">
<?php 
            if ($_SESSION['position']=='Barangay Secretary')
            echo'
            <button type="button" class="btn btn-primary col-lg-offset-10" data-toggle="modal" data-target="#myModal"   >Add resident
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            
         <button type="button" class="btn btn-info col-lg-offset-10 pull-right" data-toggle="modal" data-target="#print"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
            ';?>



    </div><br>
   

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width:800px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT INFORMATION</h4>
      </div>
 
      <form method ="POST" enctype="multipart/form-data" action="<?php htmlspecialchars("PHP_SELF");?>" >


      <div class="modal-body"> 
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style type="text/css">
.thumb-image{
 float:left;width:250px;height: 200px;
 position:relative;
 padding:5px;
}
</style>
<div class="col-lg-offset-4" id="image-holder">
    </div>
     <div class="clearfix"></div>
<div class="form-group col-lg-offset-4 col-md-4">
 <div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">Profile Picture</div>
    <div class="file-select-name" id="noFile">No file chosen...</div> 
    <input type="file" name="image" id="image">
  </div>
</div>
</div>

<script>
    function numbersOnly(input){
        var regex=/[^0-9]/gi;
        input.value=input.value.replace(regex,"");
    }
</script>

  <div class="clearfix"></div>
  <div required class="form-group col-md-4">
      <label for="res_fname">Firstname</label>
    <input type="text" maxlength="20" class="form-control" id="res_fname" name="res_fname" placeholder="Firstname" required>
  </div>


  <div class="form-group col-md-4">
      <label for="res_mname">Middlename</label>
    <input type="text" maxlength="20" class="form-control" id="res_mname" name="res_mname" placeholder="Middlename">
  </div>


  <div class="form-group col-md-4">
      <label for="res_lname">Lastname</label>
    <input type="text" maxlength="20" class="form-control" id="res_lname" name="res_lname" placeholder="Lastname" required>
  </div>

          <div class="form-group col-md-4">
    <label for="res_suffix">Suffix</label>
  <select  class="form-control" id="res_suffix" name="res_suffix">
     <option value="" >Suffix</option>
   <?php
          $res=mysqli_query($link,"SELECT * FROM ref_suffixname");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["suffix"];?></option>

          <?php
        }

        ?>
</select>
  </div>
      
<div class="form-group col-md-4">
    <label for="res_gender">Gender</label>
  <select required class="form-control" id="res_gender" name="res_gender">
    <option value="" disabled selected>Gender</option>
 
        <?php
          $res=mysqli_query($link,"SELECT * FROM ref_gender");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["gender_Name"];?></option>

          <?php
        }

        ?>
</select>
  </div>
          
          
           <div class="form-group col-md-4">
      <label for="res_bdate">Birthdate</label>
    <input placeholder="Birthdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="getAge();"  id="res_bdate" name="res_bdate"> <!-- onblur="(this.type='text')" -->
  </div>

<div class="form-group col-md-4">
    <label for="res_age">Age</label>
    <input type="number" readonly maxlength="3" class="form-control" id="res_age" placeholder="Age" >
  </div>

          
<div class="form-group col-md-4">
    <label for="res_civilstatus">Civil status</label>
  <select required class="form-control"  id="res_civilstatus" name="res_civilstatus">
     <option value="" disabled selected>Civil status</option>
 <?php
          $res=mysqli_query($link,"SELECT * FROM ref_marital_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["marital_Name"];?></option>

          <?php
        }

        ?>
</select>
</div>          
          

<div class="form-group col-md-4">
    <label for="res_contactnum">Contact</label>
    <input  type="text" maxlength="11" class="form-control" id="res_contactnum" name="res_contactnum" onkeyup="numbersOnly(this)" placeholder="Contact number">
  </div>

          <div class="form-group col-md-4">
      <label for="res_contacttype">Contact type</label>
  <select required class="form-control" id="res_contacttype" name="res_contacttype">
    <option value="" disabled selected>Contact type</option>
   <?php
          $res=mysqli_query($link,"SELECT * FROM ref_contact");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["contactType_Name"];?></option>

          <?php
        }

        ?>
</select>
</div>
          

<div class="form-group col-md-4">
      <label for="res_mname">Height</label>
    <input type="number" class="form-control" id="res_height" name="res_height" placeholder="Meter/Centimeter">
  </div>


<div class="form-group col-md-4">
      <label for="res_mname">Weight</label>
    <input type="number" class="form-control" id="res_weight" name="res_weight" placeholder="Kilogram">
  </div>






          <div class="form-group col-md-4">
      <label for="res_citizenship">Citizenship</label>
  <select required class="form-control" id="res_citizenship" name="res_citizenship">
    <option value="" disabled selected>Citizenship</option>
   <?php
          $res=mysqli_query($link,"SELECT * FROM ref_country where country_ID=169");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["country_citizenship"];?></option>

          <?php
        }

        ?>

</select>
</div>
          
<div class="form-group col-md-4">
    <label for="res_religion">Religion</label>
    <select required class="form-control" id="res_religion" name="res_religion">
 <option value="" disabled selected>Religion</option>
        <?php
          $res=mysqli_query($link,"SELECT * FROM ref_religion");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["religion_Name"];?></option>

          <?php
        }

        ?>
      
 </select>
  </div>
          
          
          

   <div class="form-group col-md-4">
      <label for="res_occupationstatus">Occupation status</label>
  <select required class="form-control" id="res_occupationstatus" name="res_occupationstatus">
 <option value="" disabled selected>Occupational status</option>
  <?php
          $res=mysqli_query($link,"SELECT * FROM ref_occupation_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["occuStat_Name"];?></option>

          <?php
        }

        ?> 
 </select>
</div>
          
          
  <div class="form-group col-md-4">
      <label for="mname">Occupation</label>
    <select required class="form-control" id="res_occupation" name="res_occupation">
 <option value="" disabled selected>Occupational </option>
        <?php
          $res=mysqli_query($link,"SELECT * FROM ref_occupation");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["occupation_Name"];?></option>

          <?php
        }

        ?>
      
 </select>
  </div>

   <div class="clearfix"></div>
          <br>
<br>

      <h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT ADDRESS</h4>
      <br>  
     
          <div class="form-group col-md-4">
    <label for="res_unit">Unit-Room-Floor</label>
    <input type="text" maxlength="20" class="form-control" id="res_unit" name="res_unit" placeholder="Unit-Room-Floor" >
  </div>

          
          <div class="form-group col-md-4">
      <label for="res_building">Building name</label>
    <input type="text" maxlength="15" class="form-control" id="res_building" name="res_building" placeholder="Building name">
  </div>

  <div class="form-group col-md-4">
      <label for="res_lot">Lot</label>
    <input type="text" maxlength="15" class="form-control" id="res_lot" name="res_lot" placeholder="Lot">
  </div>

  <div class="form-group col-md-4">
      <label for="res_block">Block</label>
    <input type="text" maxlength="15" class="form-control" id="res_block" name="res_block" placeholder="Block">
  </div>

  <div class="form-group col-md-4">
      <label for="res_phase">Phase</label>
    <input type="text" maxlength="15" class="form-control" id="res_phase"  name="res_phase" placeholder="Phase">
  </div>
          
          
          
          
          <div class="form-group col-md-4">
      <label for="res_houseno">House number</label>
    <input type="text" maxlength="15" class="form-control" id="res_houseno" name="res_houseno" placeholder="House number">
  </div>

          
          <div class="form-group col-md-4">
      <label for="res_street">Street</label>
    <input type="text" maxlength="15" class="form-control" id="res_street" name="res_street" placeholder="Street">
  </div>

  <div class="form-group col-md-4">
      <label for="res_subdmname">Subdivision</label>
    <input type="text" maxlength="20" class="form-control" id="res_subd" name="res_subd" placeholder="Subdivision">
  </div>

          
          
           <div class="form-group col-md-4">
      <label for="res_purokno"> Purok no.</label>
  <select required class="form-control" id="res_purokno" name="res_purokno">
 <option value="" disabled selected>Purok no.</option>
 <?php
          $res=mysqli_query($link,"SELECT * FROM ref_purok");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["purok_Name"];?></option>

          <?php
        }

        ?>
      </select>
</div>
          
   
  
          
           <div class="form-group col-md-4">
      <label for="res_address">Address type</label>
  <select required class="form-control" id="res_address" name="res_address">
   <option value="" disabled selected>Address type</option>
  <?php
          $res=mysqli_query($link,"SELECT * FROM ref_address");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["addressType_Name"];?></option>

          <?php
        }

        ?>
</select>
</div>
          
          
          
 
<br><br>
      </div>
          <div class="clearfix"></div>
      <div class="modal-footer">
          <div class="clearfix"></div>
   <div class="row-bttn" >
       &nbsp;&nbsp; <p > <center><a href="profile.php">  <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" /> </a></center></p>
               
          
          </div>  
            
      </div>
      </form>
    </div>
  </div>
</div>


<br>
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
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID";  
 $result = mysqli_query($connect, $query);  
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
        <th scope="col">Gender</th>
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
                                <div class="btn-group">
               <a href="profile-final.php?id=<?php echo $row['res_ID'] ?>" class="btn btn-primary btn-s">View</a>
               <a href="edit.php?id=<?php echo $row['res_ID'] ?>" class="btn btn-info btn-s">Edit</a>
               </div>
                     
                                   
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
        <th scope="col">Gender</th>
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

<div class="clearfix"></div>
          <br>
<br>
<!-- <?php 
if ($_SESSION['position']=='Barangay Secretary')
echo'

            
    
 <style>
  .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}

</style>  ';?> -->


<script>
  $('#image').bind('change', function () {
  var filename = $("#image").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
      
<script type="text/javascript">

function getAge(){
    var dob = document.getElementById('res_bdate').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('res_age').value=age;
}

</script>
  

   <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendor/js/jquery.dataTables.min.js"></script>  
     <script src="vendor/js/dataTables.bootstrap.min.js"></script>
       <script>
        $(document).ready(function() {
    var table = $('#mytable').removeAttr('width').DataTable( {
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
            { width: 110, targets: 0 }

        ],
        fixedColumns: true
    } );
} );
// $(document).ready(function() {
//     $('#mytable').DataTable( {
//     } );
// } );

</script>
      
      
      <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  

 <script>
$(document).ready(function() {
        $("#image").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
</script>
    
       <script type="text/javascript">
   var uploadField = document.getElementById("image");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
       alert("File is too big!");
       this.value = "";
    };
};
 </script>
      
  </body>  
</html>


<!-- Modal -->
<div id="print" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">GENERATE RESIDENT REPORTS</h4>
         </div>
         <div class="modal-body">
            <form action="resident-export.php" target="_blank" method="POST">
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>All list of resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Resident.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <!-- <a href="resident-export.php?report=all" class="btn btn-primary btn-sm legitRipple" target="_blank">PRINT</a> -->
                           <div class="btn-group">
                              <button type="submit" name="resident" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="residentpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Male Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Male.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="male" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="malepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Female Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Female.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="female" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="femalepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Infant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Infant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Infant" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Infantpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Minor</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Minor.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Minor" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Minorpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Teenager</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Teen.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Teen" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Teenpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Adult</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Adult.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Adult" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Adultpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Senior Citizen</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Senior.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Senior" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Seniorpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Employed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Employed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="employed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="employedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Unemployed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Unemployed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="unemployed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="unemployedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Death</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/Death.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="death" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="deathpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Pregnant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(images/pregnant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="preg" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="pregpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>