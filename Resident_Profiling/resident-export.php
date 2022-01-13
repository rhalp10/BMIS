<?php  
//export.php  
include('connections.php');
$output = '';

 //-------------FOR  RESIDENT-------------------//

if(isset($_POST["resident"]))
{
 $query = "SELECT rd.res_ID ,
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
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '<br>

 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>

   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>
   <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';

  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=ALL-Resident-report.xls');
  echo $output;
 }
}

 //-------------FOR  MALE-------------------//


if(isset($_POST["male"]))
{
 $query = "SELECT rd.res_ID ,
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
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE gender_Name = 'Male'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=MALE-Resident-report.xls');
  echo $output;
 }
}

 //-------------FOR  FEMALE-------------------//


if(isset($_POST["female"]))
{
 $query = "SELECT rd.res_ID ,
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
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE gender_Name = 'Female'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=FEMALE-Resident-report.xls');
  echo $output;
 }
}

            //-------------FOR INFANT-------------------//


if(isset($_POST["Infant"]))
{
 $query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '0' AND '1'";
$result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>

   <table class="table" bordered="1">  
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Age</th>
      <th scope="col">Marital</th>
        <th scope="col">Gender</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td> 
                                       <td>'.$row["Age"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Infant-Resident-report.xls');
  echo $output;
}
}


          //-------------FOR MINOR-------------------//


if(isset($_POST["Minor"]))
{
 $query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '1' AND '17'";
$result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
  <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Age</th>
      <th scope="col">Marital</th>
        <th scope="col">Gender</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td> 
                                       <td>'.$row["Age"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Minor-Resident-report.xls');
  echo $output;
}
}

                          //-------------FOR TEEN-------------------//


           

if(isset($_POST["Teen"]))
{
 $query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '13' AND '19'";
$result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
   <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Age</th>
      <th scope="col">Marital</th>
        <th scope="col">Gender</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td> 
                                      <td>'.$row["Age"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Teen-Resident-report.xls');
  echo $output;
}
}

              //-------------FOR Adult-------------------//

if(isset($_POST["Adult"]))
{
 $query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '20' AND '59'";
$result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Age</th>
      <th scope="col">Marital</th>
        <th scope="col">Gender</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>
                                       <td>'.$row["Age"].'</td>   
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Adult-Resident-report.xls');
  echo $output;
}
}

               //-------------FOR SENIOR-------------------// 


if(isset($_POST["Senior"]))
{
 $query ="SELECT res_ID,
res_fName,
res_mName,
res_lName,
rs.suffix,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '60' AND '100'";
$result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
  <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Suffix</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Age</th>
      <th scope="col">Marital</th>
        <th scope="col">Gender</th>
        <th scope="col">Religion</th>
        <th scope="col">Nationality</th>
          <th scope="col">Citizenship</th>
        <th scope="col">Occupation</th>
         <th scope="col">Status</th>
            <th scope="col">Date record</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td> 
                                       <td>'.$row["Age"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Senior-Resident-report.xls');
  echo $output;
}
}


     //-------------FOR  EMPLOYED-------------------//

if(isset($_POST["employed"]))
{
 $query = "SELECT rd.res_ID ,
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
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE occuStat_Name = 'Employed' OR occuStat_Name = 'Employed Government'OR occuStat_Name = 'Employed Private' OR occuStat_Name ='Overseas Filipino Worker (OFW)' OR occuStat_Name ='Self-Employed (SE)'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>

   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=EMPLOYED-Resident-report.xls');
  echo $output;
 }
}
if(isset($_POST["unemployed"]))
{
 $query = "SELECT rd.res_ID ,
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
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE occuStat_Name = 'Unemployed'";
 $result = mysqli_query($db, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
   <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>


   <table class="table" bordered="1">  
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["suffix"].'</td> 
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>
                                    <td>'.$row["country_nationality"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                     <td>'.$row["occupation_Name"].'</td>   
                                      <td>'.$row["occuStat_Name"].'</td>
                                      <td>'.$row["res_Date_Record"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=UNEMPLOYED-Resident-report.xls');
  echo $output;
 }
}


 //-------------FOR  DEATH-------------------//

if (isset($_POST["death"]))
{
 $query = "SELECT res_fName,res_mName,res_lName,rg.gender_Name,res_Bday,death_Cost,death_Date From resident_death
INNER JOIN resident_detail ON resident_death.res_ID= resident_detail.res_ID
LEFT JOIN ref_gender rg ON resident_detail.gender_ID = rg.gender_ID";
 $result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>

   <table class="table" bordered="1">  
     
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Gender</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Cause of Death</th>
        <th scope="col">Date of Death</th>
        
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                                   
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["death_Cost"].'</td>  
                                    <td>'.$row["death_Date"].'</td>
                                
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=DEATH-Resident-report.xls');
  echo $output;
 }
}


if (isset($_POST["preg"]))
{
 $query = "SELECT res_fName,res_mName,res_lName,res_Bday,preg_Date,preg_Labor From resident_pregnant
INNER JOIN resident_detail ON resident_pregnant.res_ID= resident_detail.res_ID
";
 $result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
 {
  $output .= '
<br>
 <center> Republic of the Philippines<br>
Province of Cavite<br>
Municipality of Indang<br>
    BARANGAY CALUMPANG CERCA<br>
</center><br><br>

   <table class="table" bordered="1">  
     
      <th scope="col">Firstname</th>
      <th scope="col">Middle</th>
      <th scope="col">Lastname</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Pregnacy Month</th>
        <th scope="col">Esimated Labor Date</th>
        
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                                   
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["preg_Date"].'</td>  
                                    <td>'.$row["preg_Labor"].'</td>
                                
                    </tr>
   ';
  }
  $output .= '</table> <br><br><br><br>Prepared By:<br><br> <br>
   Signature: ___________________________<br>
   Name:<br>
   Position:';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=DEATH-Resident-report.xls');
  echo $output;
 }
}

function fetch_data1()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_citizenship,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID";  
    
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                         
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["residentpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
     
        $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="105" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="90" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
                    <br>
                    
   <br>
   List of all Residents
   <br>
   <br>
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="15%">Firstname</th>
      <th width="15%">Middle</th>
      <th width="15%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="10%">Religion</th>
          <th width="10%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  

      ';  
      $content .= fetch_data1();  
      $content .= '</table> <br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List resident.pdf', 'I');  
 }  

 function fetch_data2()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_citizenship,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE gender_Name = 'Male'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["malepdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
     
     
          $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all male residents
   <br>
   <br>
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="15%">Firstname</th>
      <th width="15%">Middle</th>
      <th width="15%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="10%">Religion</th>
          <th width="10%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data2();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of male.pdf', 'I');  
 }
 function fetch_data3()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_citizenship,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE gender_Name = 'Female'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["femalepdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                       <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all female residents
   <br>
   <br>
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="15%">Firstname</th>
      <th width="15%">Middle</th>
      <th width="15%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="10%">Religion</th>
          <th width="10%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data3();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of female.pdf', 'I');  
 }  
  function fetch_data4()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_ID,
res_fName,
res_mName,
res_lName,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_citizenship,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '0' AND '1'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                     <td>'.$row["Age"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["Infantpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
          $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all infants:
   <br>
   <br> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
             <th width="3%">ID</th>
      <th width="14%">Firstname</th>
      <th width="14%">Middle</th>
      <th width="14%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="4%">Age</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
            <th width="10%">Date record</th>    
           </tr>  
      ';  
      $content .= fetch_data4();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of infant.pdf', 'I');  
 } 
 function fetch_data5()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_ID,
res_fName,
res_mName,
res_lName,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_citizenship,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '1' AND '17'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                     <td>'.$row["Age"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["Minorpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php'); 
          $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all minors:
   <br>
   <br> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="14%">Firstname</th>
      <th width="14%">Middle</th>
      <th width="14%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="4%">Age</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data5();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of minor.pdf', 'I');  
 }

  function fetch_data6()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_ID,
res_fName,
res_mName,
res_lName,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_citizenship,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '13' AND '19'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                     <td>'.$row["Age"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["Teenpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all teenagers:
   <br>
   <br>   
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="3%">ID</th>
      <th width="14%">Firstname</th>
      <th width="14%">Middle</th>
      <th width="14%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="4%">Age</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
            <th width="10%">Date record</th>    
           </tr>  
      ';  
      $content .= fetch_data6();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of teenager.pdf', 'I');  
 }

 function fetch_data7()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_ID,
res_fName,
res_mName,
res_lName,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_citizenship,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '20' AND '59'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["res_Bday"].'</td> 
                                    <td>'.$row["Age"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                    <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["Adultpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
                    
   <br>
   List of all adults:
   <br>
   <br>  
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="3%">ID</th>
      <th width="14%">Firstname</th>
      <th width="14%">Middle</th>
      <th width="14%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="4%">Age</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data7();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of adult.pdf', 'I');  
 }

 function fetch_data8()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_ID,
res_fName,
res_mName,
res_lName,
res_Bday,
rg.gender_Name,
rms.marital_Name,
rr.religion_Name,
rc.country_citizenship,
res_Date_Record,
TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS Age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage 
FROM resident_detail rd 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE TIMESTAMPDIFF(YEAR,res_Bday,CURDATE())  BETWEEN '60' AND '100'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                     <td>'.$row["Age"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["Seniorpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all senior:
   <br>
   <br>  
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="14%">Firstname</th>
      <th width="14%">Middle</th>
      <th width="14%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="4%">Age</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data8();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of senior.pdf', 'I');  
 } 

  function fetch_data9()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_citizenship,
ros.occuStat_Name,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID  
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE occuStat_Name = 'Employed' OR occuStat_Name = 'Employed Government'OR occuStat_Name = 'Employed Private' OR occuStat_Name ='Overseas Filipino Worker (OFW)' OR occuStat_Name ='Self-Employed (SE)'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td> 
                                    <td>'.$row["occuStat_Name"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["employedpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         
      $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                       <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all employed residents:
   <br>
   <br>   
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="13%">Firstname</th>
      <th width="13%">Middle</th>
      <th width="13%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
             <th width="9%">Status</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data9();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of employed.pdf', 'I');  
 } 

 function fetch_data10()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT rd.res_ID ,
rd.res_fName ,
rd.res_mName ,
rd.res_lName ,
rd.res_Bday ,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_citizenship,
ros.occuStat_Name,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID  
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID WHERE occuStat_Name = 'Unemployed'";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                           <td>'.$row["res_ID"].'</td>  
                                    <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                      <td>'.$row["res_Bday"].'</td> 
                                    <td>'.$row["marital_Name"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["religion_Name"].'</td>  
                                    <td>'.$row["country_citizenship"].'</td> 
                                    <td>'.$row["occuStat_Name"].'</td>    
                                      <td>'.$row["res_Date_Record"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["unemployedpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .=' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all unemployed residents:
   <br>
   <br> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
               <th width="3%">ID</th>
      <th width="13%">Firstname</th>
      <th width="13%">Middle</th>
      <th width="13%">Lastname</th>
      <th width="10%">Birthdate</th>
      <th width="7%">Marital</th>
        <th width="7%">Gender</th>
        <th width="8%">Religion</th>
          <th width="9%">Citizenship</th>
             <th width="9%">Status</th>
            <th width="10%">Date record</th>  
           </tr>  
      ';  
      $content .= fetch_data10();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of unemployed.pdf', 'I');  
 } 

 function fetch_data11()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_fName,res_mName,res_lName,rg.gender_Name,res_Bday,death_Cost,death_Date From resident_death
INNER JOIN resident_detail ON resident_death.res_ID= resident_detail.res_ID
LEFT JOIN ref_gender rg ON resident_detail.gender_ID = rg.gender_ID";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                          <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["gender_Name"].'</td> 
                                    <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["death_Cost"].'</td>  
                                    <td>'.$row["death_Date"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["deathpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
         $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                       <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all died residents:
   <br>
   <br>  
 <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
      <th width="17%">Firstname</th>
      <th width="17%">Middle</th>
      <th width="17%">Lastname</th>
      <th width="9%">Gender</th>
        <th width="10%">Birthdate</th>
       <th width="15%">Cause of Death</th>
        <th width="15%">Date of Death</th>  
           </tr> 
      ';  
      $content .= fetch_data11();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of death.pdf', 'I');  
 }  

  function fetch_data12()  
 {  
      $output = '';  
     include('connections.php');
      $sql = "SELECT res_fName,res_mName,res_lName,res_Bday,preg_Date,preg_Labor From resident_pregnant
INNER JOIN resident_detail ON resident_pregnant.res_ID= resident_detail.res_ID";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          
                         <td>'.$row["res_fName"].'</td>  
                                    <td>'.$row["res_mName"].'</td>  
                                    <td>'.$row["res_lName"].'</td>  
                                    <td>'.$row["res_Bday"].'</td>  
                                    <td>'.$row["preg_Date"].'</td>  
                                    <td>'.$row["preg_Labor"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["pregpdf"]))  
 {  
      require_once('vendor/tcpdf/tcpdf.php');  
        
      $sqll = "SELECT * FROM ref_logo WHERE logo_ID=1"; 
        $resultt = mysqli_query($db, $sqll); 
        $roww = mysqli_fetch_array($resultt);
     
     
        $sqll2 = "SELECT * FROM ref_logo WHERE logo_ID=2"; 
        $resultt2 = mysqli_query($db, $sqll2); 
        $roww2 = mysqli_fetch_array($resultt2);
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Resident List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage('L');  
      $content = '';  
      $content .= ' <br>
<br>
                        <center> 
                                   <table><tr> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive"/>  </td>
                                   
                                   <td>
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Republic of the Philippines<br>
                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province of Cavite<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Municipality of Indang<br>
                           &nbsp; &nbsp;BARANGAY CALUMPANG CERCA  <br><br><br>    </td>
                           
                           
                       
                        
                        
                       <td width="20%"> <img src="data:image/jpeg;base64,'.base64_encode($roww2['logo_img'] ).'" height="80" width="100" class="img-circle img-responsive "/>  
                                       </td> 

                    </tr></table> </center>
   <br>
   List of all pregnants:
   <br>
   <br> 
 <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
      <th width="17%">Firstname</th>
      <th width="17%">Middle</th>
      <th width="17%">Lastname</th>
      <th width="13%">Birthdate</th>
         <th width="15%">Pregnacy Month</th>
        <th width="18%">Esimated Labor Date</th>
           </tr> 
      ';  
      $content .= fetch_data12();  
      $content .= '</table><br><br><br><br>
           Prepared By: <br>
   Signature: ___________________________<br>
  Name:<br>
   Position:';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('List of pregnant.pdf', 'I');  
 }  
?>