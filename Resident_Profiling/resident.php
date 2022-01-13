<?php
session_start();
 
include('connections.php');
 
$query ="SELECT * FROM resident_detail ORDER BY res_ID DESC";  
$result = mysqli_query($db, $query);  
 
 
$largestNumber= $rid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( res_ID ) AS max FROM `resident_detail`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestNumber = $row['max'];
                                    $rid= $largestNumber+1;
 
 
$largestocc= $oid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( occupation_ID ) AS max FROM `ref_occupation`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestocc = $row['max'];
                                    $oid= $largestocc+1;
                              
 
$largest_address= $aid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( address_ID ) AS max FROM `resident_address`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_address= $row['max'];
                                    $aid= $largest_address+1;
                                 
 
$largest_contact= $cid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( contact_ID ) AS max FROM `resident_contact`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_contact= $row['max'];
                                    $cid= $largest_contact+1;
                                 
 
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
                        $rows = mysqli_query($db, "SELECT suffix_ID  FROM `ref_suffixname` where suffix = '$isuffix';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $suffix = $row['suffix_ID'];
             $res_suffix=$suffix;
        }





if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $igender=$_POST["res_gender"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $gender= "";
                        $rows = mysqli_query($db, "SELECT gender_ID  FROM `ref_gender` where gender_Name = '$igender';" );
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
                        $rows = mysqli_query($db, "SELECT marital_ID  FROM `ref_marital_status` where marital_Name = '$icstatus';" );
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
                        $rows = mysqli_query($db, "SELECT contactType_ID  FROM `ref_contact` where contactType_Name = '$ictype';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $ctype = $row['contactType_ID'];
             $res_contacttype=$ctype;
        }


 
if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $irel=$_POST["res_religion"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $relig= "";
                        $rows = mysqli_query($db, "SELECT religion_ID  FROM `ref_religion` where religion_name = '$irel';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $relig = $row['religion_ID'];
             $res_religion= $relig;
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ioccst=$_POST["res_occupationstatus"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $occst= "";
                        $rows = mysqli_query($db, "SELECT occuStat_ID  FROM `ref_occupation_status` where occuStat_Name = '$ioccst';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $occst = $row['occuStat_ID'];
             $res_occupationstatus=$occst;
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iocc=$_POST["res_occupation"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            
          
            $res_occupation=$oid;
            
           
                        $rows = mysqli_query($db, "SELECT occupation_ID  FROM `ref_occupation` where occupation_Name = '$iocc';" );
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
                        $rows = mysqli_query($db, "SELECT country_ID  FROM `ref_country` where country_citizenship = '$iciti';" );
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
$res_trabaho=$_POST["res_trabaho"];
        }


if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ipurok=$_POST["res_purokno"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $purok= "";
             $region= "";
                        $rows = mysqli_query($db, "SELECT purok_ID,region_Code  FROM `ref_purok` where purok_Name = '$ipurok';" );
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
                        $rows = mysqli_query($db, "SELECT addressType_ID  FROM `ref_address` where addressType_Name = '$iadd';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $address= $row['addressType_ID'];
             $res_address= $address;
        }





if ($_SERVER["REQUEST_METHOD"]== "POST"){
 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
}
?>

<?php
  

       
   
 
If($rid && $res_fname  && $res_lname  && $res_gender && $res_bdate && $res_civilstatus  && $res_religion  && $res_citizenship){
  
    
     if($res_trabaho){
         $res_occupation=$oid;
          $query=mysqli_query($db,"INSERT INTO ref_occupation(occupation_Name,occupation_ID) VALUES('$res_trabaho','$oid') ");
     }
    
        $query=mysqli_query($db,"INSERT INTO resident_detail(res_ID,res_Img, 
res_fName, res_mName,res_lName,suffix_ID, gender_ID, res_Bday, marital_ID,religion_ID,res_Height,res_Weight, occuStat_ID,occupation_ID,country_ID,Status) VALUES('$rid','$file','$res_fname','$res_mname','$res_lname','$res_suffix','$res_gender','$res_bdate','$res_civilstatus','$res_religion','$res_height', '$res_weight','$res_occupationstatus','$res_occupation','$res_citizenship','Active') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    
    
        if ($rid  && $res_citizenship){
             $query=mysqli_query($db,"INSERT INTO resident_contact(contact_ID,contact_telnum,res_ID,contactType_ID,country_ID) VALUES('$cid','$res_contactnum','$rid','$res_contacttype','$res_citizenship') ");
            
        }
    
          if ( $rid && $res_houseno && $res_purokno && $res_address){
             $query=mysqli_query($db,"INSERT INTO resident_address(address_ID,address_Unit_Room_Floor_num,res_ID,address_BuildingName,address_Lot_No,address_Block_No,address_Phase_No,address_House_No,address_Street_Name,address_Subdivision,country_ID,purok_ID,region_ID,addressType_ID) VALUES('$aid','$res_unit','$rid','$res_building',' $res_lot',' $res_block','$res_phase','$res_houseno','$res_street','$res_subd','$res_citizenship','$res_purokno','$res_region','$res_address') ");
            
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
  <body style="font-family: calibri; font-size: 18px; ">

<br>
<br>
<br>
 <div class="container">
<?php 
if ($_SESSION['position']=='Barangay Secretary')
echo'
<button type="button" class="btn btn-primary col-lg-offset-10" data-toggle="modal" data-target="#myModal"   >Add resident
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button>';?>
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
<br>
<br>

      <h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">PERSONAL INFORMATION</h4>
      <br>     
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style type="text/css">
.thumb-image{
 float:left;width:250px;height: 200px;
 position:relative;
 padding:6px;
}
</style>
 <div class="clearfix"></div>
<center><p style="font-size: 15px;">Fill up all the required fields with asterisk**</p></center>
 <div class="clearfix"></div>
<div class="col-lg-offset-4" id="image-holder">
    </div>
     <div class="clearfix"></div>
<div class="form-group col-lg-offset-5 col-md-4">
  <div class="upload">
      <input type="file" name="image" id="image" />
    </div>
   
</div>

<style type="text/css">
  div.upload {
    width: 113px;
    height: 29px;
    background: url("images/Choose-photo.png");
    overflow: hidden;
}

div.upload input {
    display: block !important;
    width: 157px !important;
    height: 57px !important;
    opacity: 0 !important;
    overflow: hidden !important;
}
</style>



<script>
    function numbersOnly(input){
        var regex=/[^0-9]/gi;
        input.value=input.value.replace(regex,"");
    }
</script>

  <div class="clearfix"></div>
  <div required class="form-group col-md-4">
      <label for="res_fname">First name*</label>
    <input type="text" maxlength="20" required class="form-control" id="res_fname" name="res_fname" placeholder="First name" required>
  </div>


  <div class="form-group col-md-4">
      <label for="res_mname">Middle name </label>
    <input type="text" maxlength="20" class="form-control" id="res_mname" name="res_mname" placeholder="Middle name">
  </div>


  <div class="form-group col-md-4">
      <label for="res_lname">Last name*</label>
    <input type="text" maxlength="20" class="form-control" id="res_lname" name="res_lname" placeholder="Last name" required>
  </div>

          <div class="form-group col-md-4">
    <label for="res_suffix">Suffix</label>
  <select  class="form-control" id="res_suffix" name="res_suffix">
     
   <?php
          $res=mysqli_query($db,"SELECT * FROM ref_suffixname");
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
    <label for="res_gender">Sex*</label>
  <select required class="form-control" id="res_gender" name="res_gender">
    <option value="" disabled selected>Sex</option>
 
        <?php
          $res=mysqli_query($db,"SELECT * FROM ref_gender");
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
      <label for="res_bdate">Birthdate*</label>
    <input  placeholder="Birthdate"  required class="form-control" type="date"  id="res_bdate" name="res_bdate" onblur="getAge();" >
  </div>


<div class="form-group col-md-4">
    <label for="res_age">Age*</label>
    <input type="number" readonly maxlength="3" class="form-control" id="res_age" placeholder="Age" >
  </div>
          
          
          
 
          
<div class="form-group col-md-4">
    <label for="res_civilstatus">Civil status*</label>
  <select required class="form-control"  id="res_civilstatus" name="res_civilstatus">
     <option value="" disabled selected>Civil status</option>
 <?php
          $res=mysqli_query($db,"SELECT * FROM ref_marital_status");
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
      <label for="res_contacttype">Contact type</label>
  <select class="form-control" id="res_contacttype" name="res_contacttype" onchange="maxLengthFunction()">
    <option value="" disabled selected>Contact type</option>
   <?php
          $res=mysqli_query($db,"SELECT * FROM ref_contact");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["contactType_Name"];?></option>

          <?php
        }

        ?>
</select>
</div> 
          
          
            <script>
 $(function () {
        $("#res_contacttype").change(function () {
            if ($(this).val() == "N/A") {
                  document.getElementById("res_contactnum").disabled = true;
            
            }
            else {
                  document.getElementById("res_contactnum").disabled = false;
            }
        });
    });
</script>    
          
<div class="form-group col-md-4">
    <label for="res_contactnum">Contact</label>
    <input  type="text" maxlength="11" class="form-control" id="res_contactnum" name="res_contactnum" onkeyup="numbersOnly(this)" placeholder="Contact number">
  </div>

       
          

<div class="form-group col-md-4">
      <label for="res_mname">Height</label><label ><font size="2">&nbsp; (Optional)</font></label>
    <input type="number" class="form-control" id="res_height" name="res_height" placeholder="Meter/Centimeter">
  </div>


<div class="form-group col-md-4">
      <label for="res_mname">Weight</label><label ><font size="2">&nbsp; (Optional)</font></label>
    <input type="number" class="form-control" id="res_weight" name="res_weight" placeholder="Kilogram">
  </div>






          <div class="form-group col-md-4">
      <label for="res_citizenship">Citizenship*</label>
  <select required class="form-control" id="res_citizenship" name="res_citizenship">
    <option value="" disabled selected>Citizenship</option>
   <?php
          $res=mysqli_query($db,"SELECT * FROM ref_country where country_ID=169");
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
    <label for="res_religion">Religion*</label>
    <select required class="form-control" id="res_religion" name="res_religion">
 <option value="" disabled selected>Religion</option>
        <?php
          $res=mysqli_query($db,"SELECT * FROM ref_religion");
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
  <select class="form-control" id="res_occupationstatus" name="res_occupationstatus">
 <option value="" disabled selected></option>
  <?php
          $res=mysqli_query($db,"SELECT * FROM ref_occupation_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["occuStat_Name"];?></option>

          <?php
        }

        ?> 
 </select>
</div>
          <script>
 $(function () {
        $("#res_occupationstatus").change(function () {
            if ($(this).val() == "Unemployed") {
                  document.getElementById("res_occupation").disabled = true;
            
            }
            else {
                  document.getElementById("res_occupation").disabled = false;
            }
        });
    });
</script>        
          
  <div class="form-group col-md-4">
      <label for="mname">Occupation</label>
    <select  class="form-control" id="res_occupation" name="res_occupation" disabled>
 <option value="" disabled selected>Occupational </option>
        <?php
          $res=mysqli_query($db,"SELECT * FROM ref_occupation");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
          <option><?php echo $row["occupation_Name"];?></option>

          <?php
        }

        ?>
  <option value="Others">Others</option>    
 </select>
  </div>
          
            <script>
 $(function () {
        $("#res_occupation").change(function () {
            if ($(this).val() == "Others") {
                  document.getElementById("res_trabaho").disabled = false;
            } else {
                  document.getElementById("res_trabaho").disabled = true;
            }
        });
    });
</script>        

          <div class="form-group col-md-3">
     <label for="mname">Adding Occupation</label>
    <input type="text" maxlength="20" class="form-control" id="res_trabaho" name="res_trabaho" placeholder="Add Occupation" disabled>
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
    <input type="text" onkeypress="return isNumberKey(event)" maxlength="15" class="form-control" id="res_lot" name="res_lot" placeholder="Lot">
  </div>

  <div class="form-group col-md-4">
      <label for="res_block">Block</label>
    <input type="text" onkeypress="return isNumberKey(event)" maxlength="15" class="form-control" id="res_block" name="res_block" placeholder="Block">
  </div>

  <div class="form-group col-md-4">
      <label for="res_phase">Phase</label>
    <input type="text" onkeypress="return isNumberKey(event)" maxlength="15" class="form-control" id="res_phase"  name="res_phase" placeholder="Phase">
  </div>
          
          
          
          
          <div class="form-group col-md-4">
      <label for="res_houseno">House number*</label>
    <input type="text"  onkeypress="return isNumberKey(event)" maxlength="15" required class="form-control" id="res_houseno" name="res_houseno" placeholder="House number">
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
      <label for="res_purokno"> Purok no.*</label>
  <select required class="form-control" id="res_purokno" name="res_purokno">
 <option value="" disabled selected>Purok no.</option>
 <?php
          $res=mysqli_query($db,"SELECT * FROM ref_purok");
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
      <label for="res_address">Address type*</label>
  <select required class="form-control" id="res_address" name="res_address">
   <option value="" disabled selected>Address type</option>
  <?php
          $res=mysqli_query($db,"SELECT * FROM ref_address");
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
        
         $query ="SELECT rd.res_ID , rd.res_fName , rd.res_mName , rd.res_lName , sfx.suffix, rd.res_Bday , rms.marital_Name, rg.gender_Name, rr.religion_Name, rc.country_nationality, rc.country_citizenship, ro.occupation_Name, ros.occuStat_Name, rd.res_Date_Record FROM resident_detail rd LEFT JOIN ref_suffixname sfx ON rd.suffix_ID = sfx.suffix_ID LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID where rd.res_ID NOT IN (Select res_ID from resident_death) && rd.Status='Active'";  
         $result = mysqli_query($db, $query);  
         ?>  
      <div class="container">
         <div class="table-responsive">
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th scope="col-2">Name</th>
                     <th scope="col">Sex</th>
                     <th scope="col">Citizenship</th>
                     <th scope="col">Religion</th>
                     <th scope="col">Civil Status</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <?php  
                  while($row = mysqli_fetch_array($result))  
                       {  
                          ?> 
               <tr>
             
                  <td><?php echo $row["res_lName"].", "?> <?php echo $row["res_fName"]?> <?php echo"( ". $row["res_mName"]." )"?> <?php echo $row["suffix"]?></td>
                  <td><?php echo $row["gender_Name"]?></td> 
                  <td><?php echo $row["country_citizenship"]?></td>
                  <td><?php echo $row["religion_Name"]?></td>
                  <td><?php echo $row["marital_Name"]?></td>
                  <td>
                     <div class="btn-group">
                        <a href="profile-final.php?id=<?php echo $row['res_ID'] ?>" class="btn btn-primary btn-xs">View</a>
                       <?php if($_SESSION['position']!="Barangay Captain"){ echo '<a href="edit.php?id='.$row['res_ID'].'" class="btn btn-info btn-xs">Edit</a>';} ?> 
                     </div>
                  </td>
               </tr>
               <?php
                  }
                  ?>  
               <tfoot>
                  <tr>
                     <th scope="col-2">Name</th>
                     <th scope="col">Sex</th>
                     <th scope="col">Citizenship</th>
                     <th scope="col">Religion</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      <div class="clearfix"></div>
          <br>
<br>


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
  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendor/js/jquery.dataTables.min.js"></script>  
     <script src="vendor/js/dataTables.bootstrap.min.js"></script>
       <script>$(document).ready(function() {
    var table = $('#mytable').removeAttr('width').DataTable();
} );</script>
      
      <script type="text/javascript">
   var uploadField = document.getElementById("image");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
      swal("ERROR", "Check the size of your image it must be less than 300 kb size or check the file you've selected it must be an image file type.");
       this.value = "";
    };
};
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
               swal("ERROR", "This browser does not support FileReader.");
            }
          } else {
           swal("ERROR", "Check the size of your image it must be less than 300 kb size or check the file you've selected it must be an image file type.");
          }
        });
      });
</script>

 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
               swal("ERROR", "Please select a image file.");   
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                    swal("ERROR", "Invalid image file.");  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 




  
      
 <script type="text/javascript">
  $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#res_bdate').attr('max', maxDate);
});
 </script>
<script type="text/javascript">
  $(function() {

  $('#res_fname').keydown(function (e) {
  
    if (e.shiftKey || e.ctrlKey || e.altKey) {
    
      e.preventDefault();
      
    } else {
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    }
    
  });
  
});
</script>
<script type="text/javascript">
  $(function() {

  $('#res_mname').keydown(function (e) {
  
    if (e.shiftKey || e.ctrlKey || e.altKey) {
    
      e.preventDefault();
      
    } else {
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    }
    
  });
  
});
</script>
<script type="text/javascript">
  $(function() {

  $('#res_lname').keydown(function (e) {
  
    if (e.shiftKey || e.ctrlKey || e.altKey) {
    
      e.preventDefault();
      
    } else {
    
      var key = e.keyCode;
      
      if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
      
        e.preventDefault();
        
      }

    }
    
  });
  
});
</script>
      
      
      <script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>

<script type="text/javascript">
   function maxLengthFunction()
{

   var ddl = document.getElementById("res_contacttype");
   var strOption = ddl.options[ddl.selectedIndex].text

   if(strOption == "Mobile")
       document.getElementById("res_contactnum").maxLength="11";
  if(strOption == "Home") 
       document.getElementById("res_contactnum").maxLength="7";
     if(strOption == "Work")
       document.getElementById("res_contactnum").maxLength="11";
  if(strOption == "Fax") 
       document.getElementById("res_contactnum").maxLength="10";
      if(strOption == "Etc") 
       document.getElementById("res_contactnum").maxLength="11";
}
    </script>
  </body>  
</html>