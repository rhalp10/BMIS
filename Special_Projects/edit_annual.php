<?php

require('db.php');

$id=$_REQUEST['id'];
$query = "SELECT * from annual_project where project_id='".$id."'"; 
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
 
</head>

<body>
<div class="form">

<?php

if(isset($_POST['new']) && $_POST['new']==1)
{
  $year = $_REQUEST['year'];
$aip = $_REQUEST['aip'];
$program = $_REQUEST['program'];
$department = $_REQUEST['department'];
$start = $_REQUEST['start'];
$end = $_REQUEST['end'];
$e_output = $_REQUEST['e_output'];
$source = $_REQUEST['source'];
$amount = $_REQUEST['amount'];
$status = $_REQUEST['status'];



$update="update annual_project set aip='".$aip."', year='".$year."', program='".$program."', department='".$department."', start='".$start."',end='".$end."',e_output='".$e_output."',source='".$source."',amount='".$amount."', status='".$status."' where project_id='".$id."' ";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:blue;">'.$status.'</p>';
}else {

}?>

<body>
  <link href="css/design.css" rel="stylesheet" type="text/css"> 
                        <body>
<div class="label">
</div>
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
<form name="form" method="post" action="view.php"> 
<input type="hidden" name="new" value="1" />
<input name="project_id" type="hidden" />
<p>PROJECT FOR THE YEAR<br><input type="number" name="year" placeholder="Enter title" required value="<?php echo $row['year'];?>" size="50" /></p>
 <p>AIP CONFERENCE CODE<br><input type="number" name="aip" placeholder="Enter Here" value="<?php echo $row['aip'];?>" required size="50"/>
                           </p>
                         <p>PROGRAM/ PROJECT ACTIVITY DESCRRIPTION<br><input type="text" name="program" placeholder="Enter Here" value="<?php echo $row['program'];?>" required size="50"/>
                            </p>

                            <p>IMPLEMENTING DEPARTMENT<br><input type="text" name="department" placeholder="Enter Here" value="<?php echo $row['department'];?>" required size="50"/>
                            </p>

                            
                    
                            <p>PERIOD OF IMPLEMENTATION</p>
                            <p>START
                           <input type="date" name="start" value=<?php echo $row['start'];?>>
                         
                           COMPLETED
                              
                           <input type="date" name="end" value=<?php echo $row['end'];?>>

<p>EXPECTED OUTPUT<br><textarea input type="text" name="e_output" cols="50" rows="5" placeholder="Enter Here" value= "<?php echo $row['e_output'];?>" required size="50"/></textarea>
                            </p>
                            
 <p>SOURCE<select name="source">
                                <optgroup>
                                <option><?php echo $row['source'];?></option>
                                    <option>Barangay Development Fund</option>
                                    <option>Sangguniang Kabataan Fund</option>
                                    <option>Barangay Disaster Risk Reduction Management Fund</option>
                                    <option>Barangay Council For the Protection of Children Fund</option>
                                    <option>Senior Citizen Persons with Disability Fund</option>
                                </optgroup>
                            </select>
                           </p>
                           
      <p>AMOUNT<br><input type="number" name="amount" placeholder="Enter Here" value="<?php echo $row['amount'];?>" required size="50"/>
                           </p>

                       <p>Status<select name="status">
                                <optgroup>
                                <option><?php echo $row['status'];?></option>
                                    <option>On-Going</option>
                                    <option>Completed</option>

                                </optgroup>
                            </select>
                           </p>
                           
                            <p>
                            
                                <input name="submit" type="submit" value="Update">
                                 <a href="view.php">Cancel</a>
                           
                            </form>
  </section>
</form>

</div>
</div>
</body>
</html>
