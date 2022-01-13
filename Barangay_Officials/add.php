<style>

body {
  font-family: calibri;
  margin: 0; padding: 0;
  background-color: #e6e6e6;
} 

.left { 
  background-color: white;
  overflow: hidden;
  height:auto;
  float:center;
  font-family: calibri;
  padding:10px;
}

.banner {
  width: auto;
    height: 40px;
  padding-top: 8px;
  padding-bottom: 8px;
      font-size: 20px;
      text-align: center;
      color: WHITE;
      font-weight: bold;
      background: #14aa6c;
      border: #14aa6c solid 1px;
      font-family: calibri; 
}

input[type=text]{
  text-align:left;
  padding: 12px 6px;
  color: #444444;
  border:  #2a992c;
  background-color: #dddddd;
  margin-top:5px;
  margin-left:5px;
  margin-right:5px;
  font-family: calibri;
}
input[type=password]{
  text-align:left;
  width: 50%;
  padding: 12px 6px;
  color: #444444;
  border:  #2a992c;
  background-color:#dddddd;
  margin-top:5px;
  margin-left:5px;
  margin-right:5px;
  font-family: calibri;
}
input[type=text]:focus {
  cursor:pointer;
  background-color: white;
  border-color:#14aa6c;
  border-style: solid;
}
input[type=submit]:hover {
  background-color: #14aa6c;
  border: none;
  color: white;
  -webkit-transition:background 0.5s ease-in-out;
  -moz-transition:background 0.5s ease-in-out;
  transition:background-color 0.5s ease-in-out;
}
input[type=submit] {
  background-color: #444444;
  border: none;
  padding: none;
  color: white; 
  width:98%;
  height: 45px;
  margin-top:5%;
  margin-left:1%;
  margin-right:1%;
  border-radius: 7px;
}
input[type=password]:focus {
  cursor:pointer;
  background-color: white;
  border-color:#14aa6c;
  border-style: solid;

}

</style>
<?php 
    require_once('db.php');
    if (isset($_POST['submit'])) {
        $resident = $_POST['resident'];
        $commitee= $_POST['commitee'];
        $Start = $_POST['Start'];
        $end = $_POST['End'];

        $sql = mysqli_query($db,"INSERT INTO `brgy_official_detail` (`res_ID`, `commitee_assignID`, `official_Start`, `official_End`) VALUES ('$resident', '$commitee', '$Start', '$end')");
        mysqli_query($db, "UPDATE `resident_detail` SET  `position_ID` = '$commitee' WHERE res_ID = '$resident'");

    }
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
<body style="padding: 5px;">
  <br>
  <br>
  <br>
  <section class="left">
      <div class="banner">
        ADD NEW BARANGAY OFFICIAL
      </div>
<br>
<center>
  <form action="add.php" method="post">
    <select name="resident">
      <br>
      <option disabled="">SELECT</option>
      <p>Residents</p>
      <?php 

      $sql = mysqli_query($db,"SELECT * FROM `resident_detail`");
      while ($d = mysqli_fetch_array($sql)) {
        ?>
        <option value="<?php echo $d[0]?>"><?php echo $d[2]." ".$d[3]." ".$d[4];?></option>
        <?php
      }
      ?>
    </select>
    
    <select name="commitee">
      <option disabled="">SELECT</option>
      <?php 
      $sql = mysqli_query($db,"SELECT * FROM `ref_position` where position_ID != 1 and position_ID != 5");
      while ($d = mysqli_fetch_array($sql)) {
        ?>
        <option value="<?php echo $d[0]?>"><?php echo $d[1];?></option>
        <?php
      }
      ?>
    </select>
    <br>
    <p>Year Start</p>
    <input type="date" name="Start">
    <p>Year End</p>
    <input type="date" name="End">
        <input type="submit" name="submit" value="Submit">

  </form>

    <br>
    <br></section>

</body>
</html>