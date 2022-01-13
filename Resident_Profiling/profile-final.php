
<html>
    
    <?php
include('connections.php');
    
   $user_id = $_REQUEST["id"];

    $db_mother_ID= $db_father_ID="";
?>
    
 <?php
include("connections.php");
 
$largestNumber= $rid= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( res_id ) AS max FROM `resident_detail`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestNumber = $row['max'];
                                    $rid= $largestNumber+1;
                              
                                 

                                  ?>
 
    
<?php
include("connections.php");
$largest_death= $did= "";
                           $rowSQL = mysqli_query($db, "SELECT MAX( death_ID ) AS max FROM `resident_death`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_death= $row['max'];
                                    $did= $largest_death+1;
                                 

                                  ?>
    

<?php
    
    $res_idIN=$db_res_resu=$db_res_resu1=$db_res_resu2= $db_fam_tel=$db_fam_gender=  $db_fam_occu=$db_fam_gen=  $db_fam_occ= $db_res_resMo1= $db_res_resMo2=$db_res_resMo3=$db_fam_genMo=$db_fam_occMo=$db_fam_telMo= $db_fam_genderMo =$db_fam_occuMo= $res_idFa=$db_fam_genderFa=$db_fam_occuFa=$db_fam_telFa=$res_idMo="";
     if ($_SERVER["REQUEST_METHOD"]== "POST")
            $res_idIN=$_POST["ser"];
     
    
    if ($_SERVER["REQUEST_METHOD"]== "POST")
            $res_idFa=$_POST["fa"]; 
    ?>
    
   
    <?php
  
        
      $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID ='$res_idIN' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_res_resu= $row["res_fName"];
      $db_res_resu1= $row["res_mName"];
       $db_res_resu2= $row["res_lName"];
       $db_fam_gen= $row["gender_ID"];
      $db_fam_occ= $row["occupation_ID"];
      
      
  }
    
    
    ?>
    
    
    
    <?php
    
   
    
      $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID ='$res_idFa' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_res_resFa1= $row["res_fName"];
      $db_res_resFa2= $row["res_mName"];
       $db_res_resFa3= $row["res_lName"];
       $db_fam_genFa= $row["gender_ID"];
      $db_fam_occFa= $row["occupation_ID"];   
      
  }
    ?>
    
    
       <?php
      $view_query = mysqli_query($db, "SELECT * FROM ref_gender where gender_ID ='$db_fam_gen' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_gender= $row["gender_Name"];
     
  }
    ?>
    
 
     
    
      <?php
      $view_query = mysqli_query($db, "SELECT * FROM ref_occupation where occupation_ID ='$db_fam_occ' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_occu= $row["occupation_Name"];
     
  }
    ?>
    
  
   
    
    
    
    
    <?php
      $view_query = mysqli_query($db, "SELECT * FROM resident_contact where res_ID ='$res_idFa' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_telFa= $row["contact_telnum"];
     
      
      
  }
    ?>
    
      
    <?php
      $view_query = mysqli_query($db, "SELECT * FROM resident_contact where res_ID ='$res_idIN' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_tel= $row["contact_telnum"];
     
      
      
  }
    ?>
    
    
    
    <?php
    $cause= "";
        
    $death_id="";
     if ($_SERVER["REQUEST_METHOD"]== "POST"){
$death_id=$_POST["deathId"];
        }
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
$cause=$_POST["cause"];
        }
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
$ddate=$_POST["ddate"];
        }
  
    ?>
    
    
    <?php
    If($cause && $ddate){
        
    
    
        $query=mysqli_query($db,"INSERT INTO resident_death(death_ID,res_ID,death_Cost, 
death_Date) VALUES('$did','$death_id','$cause','$ddate') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    
    
         
    header('Location: resident.php');
       
    }
    ?>
    
   
<head>

<link href="js2/bootstrap.min.css" rel="stylesheet">
<script src="js2/bootstrap.min.js"></script>
<script src="js2/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    
    
    <style>
        
        
  input.hidden {
    position:static;
    left: -9999px;
}
        
        

#profile-image1 {
    cursor: pointer;
  
     width: 175px;
    height: 175px;
	border:2px solid #03b1ce ;}
	.tital{ font-size:16px; font-weight:500;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	
    </style>
</head>
    
    
    
    <body style="font-family: calibri; font-size: 18px;">
        <!-- ##################QUERY FOR RETRIEVING RESIDENT DETAILS###################### --> 
       
<?php
$today = date('Y-m-d');
  $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID=' $user_id'");

  while($row = mysqli_fetch_assoc($view_query)){
    
    $user_id = $row["res_ID"];

    $db_res_id = $row["res_ID"];
    $db_res_fname = $row["res_fName"];
    $db_res_mname = $row["res_mName"];
    $db_res_lname = $row["res_lName"];
    $db_res_bdate = $row["res_Bday"];
    $db_res_civilstatus = $row["marital_ID"];
    $db_res_gender = $row["gender_ID"];
    $db_res_height = $row["res_Height"];
    $db_res_weight = $row["res_Weight"];
    $db_res_religion = $row["religion_ID"];
    $db_res_country = $row["country_ID"];
    $db_res_occust = $row["occuStat_ID"];
    $db_res_occu = $row["occupation_ID"];

      
    
$diff = date_diff(date_create($db_res_bdate), date_create($today));
    
    $age= $diff->format('%y');
     }
              
        
?>
        
             
<?php
  $view_query = mysqli_query($db, "SELECT * FROM resident_family where res_ID=' $user_id' && relType_ID='4'");

  while($row = mysqli_fetch_assoc($view_query)){
    
   

    $db_mother_ID = $row["family_res_ID"];
   
     }
              
        
?>
        
        <?php
       
  $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID='$db_mother_ID'");

         $db_mother_fName ="No Data Recorded";
        $db_mother_mName =  $db_mother_lName = "";
  while($row = mysqli_fetch_assoc($view_query)){
    
   

    $db_mother_fName = $row["res_fName"];
   $db_mother_mName = $row["res_mName"];
      $db_mother_lName = $row["res_lName"];
     }
              
        
?>
        
        
        <?php
  $view_query = mysqli_query($db, "SELECT * FROM resident_family where res_ID=' $user_id' && relType_ID='3'");

  while($row = mysqli_fetch_assoc($view_query)){
    
   

    $db_father_ID = $row["family_res_ID"];
   
     }
              
        
?>
        
        <?php
       
  $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID='$db_father_ID'");

         $db_father_fName ="No Data Recorded";
         $db_father_mName =  $db_father_lName = "";
  while($row = mysqli_fetch_assoc($view_query)){
    
   

    $db_father_fName = $row["res_fName"];
   $db_father_mName = $row["res_mName"];
      $db_father_lName = $row["res_lName"];
     }
              
        
?>
        
        
         
<?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_marital_status where marital_ID='$db_res_civilstatus '");
  while($row = mysqli_fetch_assoc($view_query)){
    $db_res_mstat = $row["marital_Name"];
 }
?>
        
             
<?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_gender where gender_ID=' $db_res_gender '");
            while($row = mysqli_fetch_assoc($view_query)){
                    $db_res_gen = $row["gender_Name"];
    }
?>
         <!-- ##################QUERY FOR INITIALIATION & RETRIEVING RELIGION NAME ###################### -->
        
        <?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_religion where religion_ID=' $db_res_religion '");
            while($row = mysqli_fetch_assoc($view_query)){
                    $db_res_rel = $row["religion_Name"];
    }
?>
         <!-- ##################QUERY FOR INITIALIATION & RETRIEVING CITIZENSHIP###################### -->
              
        <?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_country where country_ID=' $db_res_country '");
            while($row = mysqli_fetch_assoc($view_query)){
                    $db_res_citi = $row["country_citizenship"];
    }
?>
           <!-- ##################QUERY FOR INITIALIATION & RETRIEVING OCCUPATION STATUS###################### -->
        
      <?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_occupation_status where occuStat_ID='$db_res_occust '");
   $db_res_ocst="Not Available/Unemployed";
        while($row = mysqli_fetch_assoc($view_query)){
    $db_res_ocst = $row["occuStat_Name"];
 }
?>
           <!-- ##################QUERY FOR INITIALIATION & RETRIEVING OCCUPATION NAME###################### -->
        
            <?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_occupation where occupation_ID='$db_res_occu '");
        $db_res_occ ="---";
  while($row = mysqli_fetch_assoc($view_query)){
    $db_res_occ = $row["occupation_Name"];
 }
?>
      
           <!-- ##################QUERY FOR  RETRIEVING CONTACT NUMBER###################### -->
        
<?php
  $view_query = mysqli_query($db, "SELECT * FROM resident_contact where res_ID='$user_id '");

  while($row = mysqli_fetch_assoc($view_query)){
    $db_res_cnum = $row["contact_telnum"];
     }
    
?>
           <!-- ##################QUERY FOR RETRIEVING RESIDENT ADDRESS###################### -->
        
        <?php
  $view_query = mysqli_query($db, "SELECT * FROM resident_address where res_ID='$user_id '");

  while($row = mysqli_fetch_assoc($view_query)){
    

$db_res_unit = $row["address_Unit_Room_Floor_num"];
      $db_res_build = $row["address_BuildingName"];
      $db_res_lot = $row["address_Lot_No"];
      $db_res_block = $row["address_Block_No"];
      $db_res_phase = $row["address_Phase_No"];
        $db_res_house = $row["address_House_No"];
      $db_res_street = $row["address_Street_Name"];
      $db_res_sub = $row["address_Subdivision"];
      
      $db_res_purok = $row["purok_ID"];
     }
                    
?>
   
           <!-- ##################QUERY FOR INITIALIATION & RETRIEVING PUROK NAME###################### -->
        
            <?php
  $view_query = mysqli_query($db, "SELECT * FROM ref_purok where purok_ID=' $db_res_purok '");
            while($row = mysqli_fetch_assoc($view_query)){
                    $db_res_pur = $row["purok_Name"];
    }
?>
     
        
        
        <br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-primary col-lg-offset-0" onclick="location.href = 'resident.php';"  >Back
  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
</button><br><br>
   
        
        
        
<div class="container">
	<div class="row">      
        <div class="col-md-2 "></div>
       <div class="col-md-8 ">

              <!-- ##################DISPLAYING PERSONAL INFORMATION###################### -->
           
<div class="panel panel-primary">
    <div class="panel-heading">  <center><h4 >User Profile</h4></center></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> 
                <?php  
                $query = "SELECT * FROM resident_detail where res_ID=$user_id";  
                $result = mysqli_query($db, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['res_Img'] ).'" height="200" width="200" class="img-circle img-responsive"/>  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
                
<div style="color:#999;" >Profile Image</div>
              
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h3 style="color:#00b1b1; "><?php echo $db_res_fname ;?>&nbsp;<?php echo $db_res_mname ;?>&nbsp; <?php echo $db_res_lname ;?> </h3>
              <span><p><b> Resident ID: <?php echo $db_res_id;?></b></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
                
     
                
<div class="col-sm-5 col-xs-6 tital " >Sex:</div><div class="col-sm-7 col-xs-6 "><?php echo  $db_res_gen;?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Birthday:</div><div class="col-sm-7"> <?php echo $db_res_bdate;?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Age:</div><div class="col-sm-7" > <?php echo $age;?> </div>
  <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-sm-5 col-xs-6 tital " >Civil Status:</div><div class="col-sm-7"><?php echo $db_res_mstat;?></div>



 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Religion:</div><div class="col-sm-7"><?php echo $db_res_rel;?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>



<div class="col-sm-5 col-xs-6 tital " >Height:</div><div class="col-sm-7 col-xs-6 "><?php echo  $db_res_height;?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Weight:</div><div class="col-sm-7 col-xs-6 "><?php echo  $db_res_weight;?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Citizenship:</div><div class="col-sm-7"><?php echo $db_res_citi;?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Contact No.:</div><div class="col-sm-7"><?php echo isset($db_res_cnum);?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?php echo $db_res_unit .", ".$db_res_build.", L".$db_res_lot.", BLK".$db_res_block.", PH".$db_res_phase.", ".$db_res_house .", ".$db_res_street." Street, ".$db_res_sub.", ".$db_res_pur.", Calumpang Cerca".", Indang, Cavite";?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Occupation Status:</div><div class="col-sm-7"><?php echo $db_res_ocst;?></div><div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Occupation:</div><div class="col-sm-7"><?php echo $db_res_occ;?></div>

                
                <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Mother:</div><div class="col-sm-7"><?php echo $db_mother_fName." ".$db_mother_mName." ".$db_mother_lName;?></div>
    
                
                           
                <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Father:</div><div class="col-sm-7"><?php echo $db_father_fName." ".$db_father_mName." ".$db_father_lName;?></div>
    
               
                
                 
<div id="signup">
<button type="button" class="btn btn-primary col-lg-offset-10" id="signup"  name="signup">Status
  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
</button>
    <form hidden action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST"  id="form1">
    <div required class="form-group col-md-4">
     
    <input type="hidden" maxlength="20" class="form-control" id="dethId" name="deathId" value="<?php echo $user_id;?>">
  </div>  
        <br>
        <div required class="col-lg-offset-1 form-group col-md-5">
      <label for="res_fname">Cause of Death</label>
    <input type="text" maxlength="20" class="form-control" id="cause" name="cause" placeholder="Cause of Death" required>
  </div>

         <div class="form-group col-md-4">
      <label for="res_bdate">Date of Death</label>
    <input placeholder="Date of Death" class="form-control"  type="date" id="ddate" name="ddate"> <!-- onblur="(this.type='text')" -->
  </div>
        <div class="clearfix"></div>
       <center>  <input type="submit" name="signup" id="insert" value="Insert" class="btn btn-info" /> </center>
    </form>
</div>

                

                <br><br><br>
                
                  <!-- ##################EDUCATIONAL FILL UP FORM###################### -->
                
             
                
            <div class="form-group col-md-4">
    
    <input placeholder="Birthdate"  class="form-control"  type="hidden" onfocus="(this.type='date')"   id="res_bdate" name="res_bdate" value="<?php echo $db_res_bdate;?>"> <!-- onblur="(this.type='text')" -->
  </div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
        
        
        
                
        
    </div>
    
    
    
    
    
    </div>
        
        
       

        
        
        <script type="text/javascript">
            $( document ).ready( function() {
  $( "#signup" ).click( function() {
    $( "#form1" ).show();
       $( "#form1" ).show();
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
    $('#ddate').attr('max', maxDate);
});
 </script>
</body>

</html>