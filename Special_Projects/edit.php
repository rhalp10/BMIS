<?php

require('db.php');

$id=$_REQUEST['id'];
$query = "SELECT * from youth_investment where youth_id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
</head>

<!DOCTYPE html>
<html>
<head>
  <link href="css/design.css" rel="stylesheet" type="text/css">     
</head>

<body>
<div class="form">

<?php

if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['youth_id'];
$year =$_REQUEST['year'];
$issues =$_REQUEST['issues'];
$programs =$_REQUEST['programs'];
$result =$_REQUEST['result'];
$amount =$_REQUEST['amount'];
$start =$_REQUEST['start'];
$end =$_REQUEST['end'];
$status =$_REQUEST['status'];


$update="update youth_investment set issues='".$issues."', year='".$year."', programs='".$programs."', result='".$result."', amount='".$amount."', start='".$start."',end='".$end."',status='".$status."' where youth_id='".$id."' ";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='viewsk.php'>View Updated Record</a>";
echo '<p style="color:blue;">'.$status.'</p>';
}else {

}?>

<body>

      <div class="navbar" style="background-color: #e94b3c;">

    <div class="dropdown">
      <button class="dropbtn">Insert New Record
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="insert_annual.php">Add new Annual Fund</a>
         <a href="insert_youth.php">Add new Annual Youth</a>
      
    </div>
      </div>
  <div class="dropdown">
      <button class="dropbtn">Edit Record
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        
      <a href="viewbrgy.php"> All Project</a> 
      <a href="viewsk.php">Youth Plan</a> 
  
  </div>
        </div>
        <div class="dropdown">
      <button class="dropbtn">View Record
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
      <a href="view.php"> Annual Barangay Funds</a>
      <a href="viewbdf.php">Barangay Funds</a>    
      <a href="viewbdrrmc.php">BDRRMC Funds</a>   
      <a href="viewBCPC.php">BCPC Funds</a>   
      <a href="viewsenior.php">SCPD Funds</a> 
      <a href="view_sk.php">SK Funds</a>
       <a href="viewsk2.php">Youth Funds</a>
        </div>
        </div>
        </div>
                       

<section class="down">
        <div class="banner">
        EDIT
        </div>
        <form method="POST">
            <center><b>
<form method="POST">

<div>
<form name="form" method="post" action="viewsk.php"> 
<input type="hidden" name="new" value="1" />
<input name="youth_id" type="hidden" value="<?php echo $row['youth_id'];?>" />
<p>PROJECT FOR THE YEAR<br><input type="number" name="year" placeholder="Enter title" required value="<?php echo $row['year'];?>" size="50" /></p>
<p>GAPS/ISSUES<br><input type="text" name="issues" placeholder="Enter title" required value="<?php echo $row['issues'];?>" size="50" /></p>
<p>PROGRAMS/PROJECTS/ACTIVITIES<br><input type="text" name="programs" placeholder="Enter name" required value="<?php echo $row['programs'];?>" size="50" /></p>
<p>RESULTS TARGET/BENEFICIARIES<br><input type="text" name="result" placeholder="Enter name" required value="<?php echo $row['result'];?>" size="50"size="50" /></p>
<p>TOTAL PROJECT COST<br><input type="number" name="amount" placeholder="Enter quantity" required value="<?php echo $row['amount'];?>" size="50" /></p>


<p>PERIOD OF IMPLEMENTATION<br></p>
<p>START&nbsp&nbsp<input type="date" name="start" value=<?php echo $row['start'];?>

COMPLETED&nbsp&nbsp<select name="end">
					 <input type="date" name="end" value=<?php echo $row['end'];?>>
<p>STATUS&nbsp&nbsp<select name="status">
						<optgroup>
						<option><?php echo $row['status'];?> </option>
						<option>On-Going</option>
						<option>Completed</option>
						
						</optgroup>
						</select>
						</p>
<input name="submit" type="submit" value="Update"> 
 <a href="view.php">Cancel</a>
        </form>
    </section>
</form>

</div>
</div>
</body>
</html>
