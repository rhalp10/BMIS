<?php
require('db.php');
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$year =  $_REQUEST['year'];
$issues = $_REQUEST['issues'];
$programs = $_REQUEST['programs'];
$result = $_REQUEST['result'];
$amount = $_REQUEST['amount'];
$start = $_REQUEST['start'];
$end = $_REQUEST['end'];
$status = $_REQUEST['status'];

$query = "INSERT INTO youth_investment (year, issues,programs,result,amount,start,end,status)
 values ('$year','$issues','$programs','$result','$amount','$start','$end','$status')";
mysqli_query($con, $query) or die("ERROR");

  $status = "New Record Inserted Successfully.</br></br><a href='viewsk.php'>View Inserted Record</a>";

}

?>
<!DOCTYPE html>
<html>
<head>
 <head>
   <link href="css/design.css" rel="stylesheet" type="text/css"> 
  
</head>
<body>
<div class="label"> 
</div>
<div class="navbar" style="background-color: #e94b3c;">
<a href="view.php">HOME</a>
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
       Add Youth Investment Plan
        </div>
        <form method="POST">
            <center><b>
<form method="POST">
<form name="form" method="post" action="view.php">
                            <input type="hidden" name="new" value="1" />

	

<meta charset="utf-8">


<link rel="stylesheet" href="css2/style.css" />
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p style="color:#FF0000;"><?php echo $status; ?></p>
<p>PROJECT FOR THE YEAR<br><input type="number" name="year" placeholder="Enter Here" required size="50"/>
                           </p>
<p>GAPS/ISSUES<br><input type="text" name="issues" placeholder="Enter Here" required size="50"/>
</p>

<p>PROGRAMS/PROJECTS/ ACTIVITES<br><input type="text" name="programs" placeholder="Enter Here" required size="50"/>
</p>

<p>RESULT/TARGETS/ BENEFICIARIES<br><input type="text" name="result" placeholder="Enter Here" required size="50" />
</p>

<p>PROJECT COST<br><input type="number" name="amount" placeholder="Enter Here" required size="50"/>
</p>

 <p>PERIOD OF IMPLEMENTATION<br></p>
                            <p>DATE STARTED
                                <input type="date" name="start">
                        
                                DATE COMPLETED
                                <input type="date" name="end">
                                </p>


 <p>Status<select name="status">
                                <optgroup>
                                    <option>On-Going</option>
                                    <option>Completed</option>

                                </optgroup>
                            </select>
                            </p>



<p> <input name="submit" type="submit" value="Submit" />
<a href="viewsk.php">Cancel</a>
</p>
</form>


</div>
</div>
</body>
</html>
