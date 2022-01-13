
<html>
    
    <?php
include('connections.php');
    
    
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
    
    $res_idIN=$db_res_resu=$db_res_resu1=$db_res_resu2= $db_fam_tel=$db_fam_gender=  $db_fam_occu=$db_fam_gen=  $db_fam_occ= $db_res_resMo1= $db_res_resMo2=$db_res_resMo3=$db_fam_genMo=$db_fam_occMo=$db_fam_telMo= $db_fam_genderMo =$db_fam_occuMo= $res_idFa=$db_fam_genderFa=$db_fam_occuFa=$db_fam_telFa=$res_idMo="";
     if ($_SERVER["REQUEST_METHOD"]== "POST")
            $res_idIN=$_POST["ser"];
     
    
    if ($_SERVER["REQUEST_METHOD"]== "POST")
            $res_idFa=$_POST["fa"]; 
    ?>
    
   
    <?php
    $res_mother="";
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_mother=$res_idIN;
        }
    
    If($res_mother){
        
    
    
        $query=mysqli_query($db,"INSERT INTO resident_family(res_ID,family_res_ID,relType_ID) VALUES('$largestNumber','$res_idIN','4') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    }
        
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
    
     $res_father=$db_res_resFa1=$db_res_resFa2= $db_res_resFa3=  $db_fam_genFa=$db_fam_occFa="";
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_father=$res_idFa;
        }
    
    If($res_father){
        
    
    
        $query=mysqli_query($db,"INSERT INTO resident_family(res_ID,family_res_ID,relType_ID) VALUES('$largestNumber','$res_idFa','3') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        header('Location: resident.php');
    }
    
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
      $view_query = mysqli_query($db, "SELECT * FROM ref_gender where gender_ID ='$db_fam_genFa' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_genderFa= $row["gender_Name"];
     
  }
    ?>
    
      <?php
      $view_query = mysqli_query($db, "SELECT * FROM ref_occupation where occupation_ID ='$db_fam_occ' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_occu= $row["occupation_Name"];
     
  }
    ?>
    
  
    
     <?php
      $view_query = mysqli_query($db, "SELECT * FROM ref_occupation where occupation_ID ='$db_fam_occFa' ");
  while($row = mysqli_fetch_assoc($view_query)){
   $db_fam_occuFa= $row["occupation_Name"];
     
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
	.tital{ font-size:16px; font-weight:550;}
	 .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}	
    </style>
</head>
    
    
    
    <body style="font-family: calibri; font-size: 18px;">
        <!-- ##################QUERY FOR RETRIEVING RESIDENT DETAILS###################### --> 
       
<?php
		$today = date('Y-m-d');
  $view_query = mysqli_query($db, "SELECT * FROM resident_detail where res_ID=' $largestNumber'");

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
  $view_query = mysqli_query($db, "SELECT * FROM resident_contact where res_ID='$largestNumber'");

  while($row = mysqli_fetch_assoc($view_query)){
    $db_res_cnum = $row["contact_telnum"];
     }
    
?>
           <!-- ##################QUERY FOR RETRIEVING RESIDENT ADDRESS###################### -->
        
        <?php
  $view_query = mysqli_query($db, "SELECT * FROM resident_address where res_ID='$largestNumber'");

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
           <!-- ##################QUERY FOR INITIALIATION & RETRIEVING BARANGAY NAME###################### -->
        
 
        
		
		
		
	

		
		<!-- ##################MOTHER DETAILS###################### -->


		
		
		
        
        <br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-success col-lg-offset-0" onclick="location.href = 'resident.php';"  >Back
  <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
</button><br><br>
   
        
        
        
<div class="container">
	<div class="row">      
        
       <div class="col-md-7 ">

              <!-- ##################DISPLAYING PERSONAL INFORMATION###################### -->
           
<div class="panel panel-default">
    <div class="panel-heading">  <center><h4 >User Profile</h4></center></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> 
                <?php  
                $query = "SELECT * FROM resident_detail where res_ID=$largestNumber";  
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
<div style="color:#999;" >Profile Picture</div>
            
           
              
   
                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h3 style="color:#00b1b1; "><?php echo $db_res_fname ;?>&nbsp;<?php echo $db_res_mname ;?>&nbsp; <?php echo $db_res_lname ;?> </h3>
              <span><p><?php echo $db_res_id;?></p></span>            
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

<div class="col-sm-5 col-xs-6 tital " >Contact No.:</div><div class="col-sm-7"><?php echo $db_res_cnum;?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7"><?php echo $db_res_unit .", ".$db_res_build.", L".$db_res_lot.", BLK".$db_res_block.", PH".$db_res_phase.", ".$db_res_house .", ".$db_res_street." Street, ".$db_res_sub.", ".$db_res_pur." , Indang, Cavite";?></div>
        
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Occupation Status:</div><div class="col-sm-7"><?php echo $db_res_ocst;?></div><div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Occupation:</div><div class="col-sm-7"><?php echo $db_res_occ;?></div>

              
      
                
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
        
        
         <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">

           <!-- ##################FAMILY BACKGROUND FILL UP FORM###################### -->
        <div class="col-md-5 ">

<div class="panel panel-default">
    <div class="panel-heading">  <h4 >Family Background </h4>
   <div class="panel-body">

    <div class="box box-info">
        <form method ="POST" action="<?php htmlspecialchars("PHP_SELF");?>" >
     
     <div class="clearfix"></div>
  
   <div class="row-bttn" >
       <button type="button" onclick="location.href='resident-select-mother.php'" id="show_button" class="btn btn-success btn-sm col-lg-offset-4">
  Select Mother
</button>
<br>

                </div>  
			  
        
       
<div class="col-sm-5 col-xs-6 tital " >Name:</div><div class="col-sm-7"> </div>
    
            <div class="clearfix"></div>
<div class="col-sm-5 col-xs-6 tital " >Contact Number :</div><div class="col-sm-7"> </div>
            
            
            
            <div class="clearfix"></div>
<div class="col-sm-5 col-xs-6 tital " >Gender :</div><div class="col-sm-7"> </div>
            
            <div class="clearfix"></div>
<div class="col-sm-5 col-xs-6 tital " >Occupation :</div><div class="col-sm-7"> </div>
            
            
            
</form>
        </div>
       
            
    </div> 
    </div>
</div>
  <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
           
       
       
   </div>
        
                
        
    </div>
    
    
    
    
    
    </div>
        
        
       

        
        
           <!-- ##################SCRIPT FOR GETTING AGE###################### -->
        
        <script type="text/javascript">

function getAge(){
    var dob = document.getElementById('res_bdate').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('res_age').value=age;
}

</script>

	<script type="text/javascript">
    var button = document.getElementById('show_button')
    button.addEventListener('click',hideshow,false);

    function hideshow() {
        document.getElementById('hidden-div').style.display = 'block'; 
        this.style.display = 'none'
    }   
</script>
	
</body>

</html>