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
  <nav class="navbar navbar-fixed-top" style="background-color: #141414;">
    <div class="navbar-header">
      <a class="navbar-brand" id="brand" style="color: #f2f2f2">BARANGAY OFFICIALS </a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a href="chart.php" style="color: #f2f2f2;">Chart</a></li>
            <li><a href="index.php" style="color: #f2f2f2;">Edit</a></li>
            <li><a href="edit.php" style="color: #f2f2f2;">Update</a></li>
            <li><a href="add.php" style="color: #f2f2f2;">Add</a></li>
          </li>
      </ul>
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

$sql = mysqli_query($con,"SELECT 
  rd.res_ID,
  rd.res_Img,
  rd.res_fName,
  rd.res_mName,
  rd.res_lName,
  rs.suffix,
  rg.gender_Name,
  rp.position_Name,
  bod.official_Start,
  bod.official_End,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name FROM ref_position WHERE position_ID =  bod.commitee_assignID), '')) as Kagawad_committee FROM `brgy_official_detail`  bod
INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID
INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID ORDER BY rp.position_ID");

 

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

while($row = mysqli_fetch_array($sql))

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



</body>

</html>
</div>
		</form>
	</section>
</body>
</html>