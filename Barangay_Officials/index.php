<?php 
    require_once('db.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>Barangay Officials</title>
  <link href="style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="resources\css\bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="resources\css\custom_2.css">
<link rel="stylesheet" type="text/css" href="resources\css\bootstrap.min.css">
</head>

<div class="container-fluid">
  <nav class="navbar navbar-fixed-top" style="background-color: #e94b3c; ">
    <div class="navbar-header">

      <a class="navbar-brand" id="brand" style="color: #f2f2f2">BARANGAY OFFICIALS </a>
    </div>
    <div>
        <?php include('nav.php'); ?>
    </div>
  </nav>
</div>
<div class="container-fluid" style="margin:0%; width:100%; padding-left:0%;">
</div>
<div class="container-fluid" style="padding-left: 20%; padding-right: 20%" id="org">
<center><br><br><br>
<body style="font-family: Century Gothic">
	<h2>Barangay Officials</h2>
	<br>
<?php

$sql_capt = mysqli_query($db,"SELECT rd.res_Img, rd.res_fName, rd.res_mName, rd.res_lName, rs.suffix, rg.gender_Name, bod.official_Start, bod.official_End, rp.position_Name FROM resident_detail rd INNER JOIN brgy_official_detail bod ON rd.res_ID = bod.res_ID INNER JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE rp.position_ID = 2 ORDER BY bod.official_ID DESC LIMIT 1");

$sql_sec = mysqli_query($db,"SELECT rd.res_Img, rd.res_fName, rd.res_mName, rd.res_lName, rs.suffix, rg.gender_Name, bod.official_Start, bod.official_End, rp.position_Name FROM resident_detail rd INNER JOIN brgy_official_detail bod ON rd.res_ID = bod.res_ID INNER JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE rp.position_ID = 3 ORDER BY bod.official_ID DESC LIMIT 1");

$sql_tr = mysqli_query($db,"SELECT rd.res_Img, rd.res_fName, rd.res_mName, rd.res_lName, rs.suffix, rg.gender_Name, bod.official_Start, bod.official_End, rp.position_Name FROM resident_detail rd INNER JOIN brgy_official_detail bod ON rd.res_ID = bod.res_ID INNER JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE rp.position_ID = 4 ORDER BY bod.official_ID DESC LIMIT 1");

$sql_k = mysqli_query($db,"SELECT rd.res_Img, rd.res_fName, rd.res_mName, rd.res_lName, rs.suffix, rg.gender_Name, bod.official_Start, bod.official_End, rp.position_Name FROM resident_detail rd INNER JOIN brgy_official_detail bod ON rd.res_ID = bod.res_ID INNER JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE rp.position_Name != 'Barangay Captain' and rp.position_Name != 'Barangay Treasurer' and rp.position_Name != 'Barangay Secretary' GROUP BY rp.position_Name");
 

?>
<style type="text/css">
  table,tr,td,th{

    border:solid 1px;
    padding: 5px;
    text-align: center;

  }
  .card {
    
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
    padding: 10px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}
</style>

<?php

while($row = mysqli_fetch_array($sql_capt))

  {

    ?>
        <?php 
$image_data = $row['res_Img'];

if ($image_data == null) {
  $encoded_image = "images/default.png";
  $img = "<img src='$encoded_image' style='width:100px; height:100px'></img>";
}
else{
  $encoded_image = base64_encode($image_data);
  $img = "<img src='data:image/jpeg;base64,{$encoded_image}' style='width:100px; height:100px;'></img>";
}

?>
<div class="card">
   <?PHP 
        
        echo $img;
        
        ?>
  <div >
    <h4><b><?php 
          echo  $row['res_fName']." ".$row['res_mName']." ".$row['res_lName']." ".$row['suffix'];
          ?></b></h4> 
    <p><?php echo $row['position_Name'];?></p> 
  </div>
</div>
<br>
    <?php
  }
  ?>

  <?php

while($row = mysqli_fetch_array($sql_sec))

  {

    ?>
        <?php 
$image_data = $row['res_Img'];

if ($image_data == null) {
  $encoded_image = "images/default.png";
  $img = "<img src='$encoded_image' style='width:100px; height:100px'></img>";
}
else{
  $encoded_image = base64_encode($image_data);
  $img = "<img src='data:image/jpeg;base64,{$encoded_image}' style='width:100px; height:100px;'></img>";
}

?>
<div class="card">
   <?PHP 
        
        echo $img;
        
        ?>
  <div >
    <h4><b><?php 
          echo  $row['res_fName']." ".$row['res_mName']." ".$row['res_lName']." ".$row['suffix'];
          ?></b></h4> 
    <p><?php echo $row['position_Name'];?></p> 
  </div>
</div>
<br>
    <?php
  }
  ?>

<?php

while($row = mysqli_fetch_array($sql_tr))

  {

    ?>
        <?php 
$image_data = $row['res_Img'];

if ($image_data == null) {
  $encoded_image = "images/default.png";
  $img = "<img src='$encoded_image' style='width:100px; height:100px'></img>";
}
else{
  $encoded_image = base64_encode($image_data);
  $img = "<img src='data:image/jpeg;base64,{$encoded_image}' style='width:100px; height:100px;'></img>";
}

?>
<div class="card">
   <?PHP 
        
        echo $img;
        
        ?>
  <div >
    <h4><b><?php 
          echo  $row['res_fName']." ".$row['res_mName']." ".$row['res_lName']." ".$row['suffix'];
          ?></b></h4> 
    <p><?php echo $row['position_Name'];?></p> 
  </div>
</div>
<br>
    <?php
  }
  ?>

  <?php
$counter = 1;

    $length = mysqli_num_rows($sql_k);
while($row = mysqli_fetch_array($sql_k))

  { 
      if ($counter % 2 != 0) {
               
        echo "<div class='row'>";
            }


    ?>
        <?php 
$image_data = $row['res_Img'];

if ($image_data == null) {
  $encoded_image = "images/default.png";
  $img = "<img src='$encoded_image' style='width:100px; height:100px'></img>";
}
else{
  $encoded_image = base64_encode($image_data);
  $img = "<img src='data:image/jpeg;base64,{$encoded_image}' style='width:100px; height:100px;'></img>";
}

?>
<div class="col-sm-6" style="">
  <div class="card" style="width:324; height: 189;">
     <?PHP 
          
          echo $img;
          
          ?>
    <div >
      <h4><b><?php

            echo  $row['res_fName']." ".$row['res_mName']." ".$row['res_lName']." ".$row['suffix'];
            ?></b></h4> 
            <p><?php echo "Barangay Kagawad - "; echo $row['position_Name'];?></p>

    </div>
  </div>
</div>
      <?php
     if ($counter % 2 == 0 || $length == $counter) {
                echo '</div>';
     }

      $counter++;
  }
  ?>




  </tbody>
</table>

</body>

</html>
</div>
		</form>
	</section>
</body>
</html>