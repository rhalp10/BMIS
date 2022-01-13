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
  <nav class="navbar navbar-fixed-top" style="background-color: #e94b3c;">
    <div class="navbar-header">
      <a class="navbar-brand" id="brand" style="color: #f2f2f2">BARANGAY OFFICIALS </a>
    </div>
    <div>
       <?php include('nav.php'); ?>
    </div>
  </nav>
</div>
<div class="container-fluid" style="padding-left: 5%; padding-right: 5%" id="org">
<center><br><br><br>
<body style="font-family: Calibri">
	<h2>Barangay Officials</h2>
	<br>
<?php

$sql = mysqli_query($db,"SELECT rd.res_ID, rd.res_Img, rd.res_fName, rd.res_mName, rd.res_lName, rs.suffix, rg.gender_Name, bod.official_Start, bod.official_End, rp.position_Name FROM resident_detail rd INNER JOIN brgy_official_detail bod ON rd.res_ID = bod.res_ID INNER JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_gender rg on rd.gender_ID = rg.gender_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID GROUP BY rd.res_fName, rd.res_lName");

// $sql = mysqli_query($db, "SELECT rd.res_fName,rd.res_mName,rd.res_mName,rs.suffix,rn.network_Name,rp.position_Name,rpp.position_Name FROM `brgy_official_detail` bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID LEFT JOIN resident_contact rc ON rd.res_ID = rc.res_ID LEFT JOIN ref_network rn ON rc.network_ID = rn.network_ID LEFT JOIN ref_position rpp ON bod.commitee_assignID = rpp.position_ID WHERE bod.visibility = 1");
 

?>
<style type="text/css">
table > #x{
  padding: 0px;
}
</style>
  <table class="table table-bordered"  id="x">

  <thead>
    <th class="col-sm-2">First Name</th>
    <th class="col-sm-1">Middle Name</th>
    <th class="col-sm-2">Last Name</th>
    <th class="col-sm-1">Suffix</th>
    <th class="col-sm-1">Gender</th>
    <th class="col-sm-1">Date Appoint</th>
    <th class="col-sm-1">Date End</th>
    <th class="col-sm-1">Position</th>
    <th class="col-sm-2">Action</th>
  </thead>
  <tbody>
<?php

while($row = mysqli_fetch_array($sql))

  {

    ?>
      <tr>
        <?php 
$image_data = $row['res_Img'];
$encoded_image = base64_encode($image_data);
//You dont need to decode it again.

$img = "<img src='data:image/jpeg;base64,{$encoded_image}'></img>";

//and you echo $Hinh
?>
      
      <td><?PHP ECHO $row['res_fName']?></td>
      <td><?PHP ECHO $row['res_mName']?></td>
      <td><?PHP ECHO $row['res_lName']?></td>
      <td><?PHP ECHO $row['suffix']?></td>
      <td><?PHP ECHO $row['gender_Name']?></td>
      <td><?PHP ECHO $row['official_Start']?></td>
      <td><?PHP ECHO $row['official_End']?></td>
      <td><?PHP ECHO $row['position_Name']?></td>
      <td style="width: 500px!important;">
<div class="btn-group">
  <a href="update.php?id=<?PHP ECHO $row['res_ID']?>" class="btn btn-primary">UPDATE</a>
  <a href="delete.php?id=<?PHP ECHO $row['res_ID']?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-primary">DELETE</a>
</div>
      </td>
      </tr>
    <?php
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