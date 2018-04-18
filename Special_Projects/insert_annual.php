<?php

require('db.php');
$status = "";
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

$ins_query="insert into annual_project (`year`,`aip`,`program`,`department`,`start`,`end`,`e_output`,`source`,`amount`,`status`) values ('$year','$aip','$program','$department','$start','$end','$e_output','$source','$amount','$status')";

mysqli_query($con, $ins_query) or die(mysql_error());

$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>

 <script>
    $(function(){
        $( "#datepicker" ).datepicker();
        $("#icon").click(function() { 
            $("#datepicker").datepicker( "show" );
        })
    });
    </script>  
    <!DOCTYPE html>
    <html>

   

 <link href="css/design.css" rel="stylesheet" type="text/css"> 
      
   <body>
<div class="label">
</div>
 <div class="navbar" style="background-color: #e94b3c;">
<a href="index.php">HOME</a>

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
        Add Annual Fund
        </div>
        <form method="POST">
      <center><b>     
<form method="POST">
<form name="form" method="post" action="view.php">
<input type="hidden" name="new" value="1" />
<p style="color:#FF0000;"><?php echo $status; ?></p>


 <p>PROJECT FOR THE YEAR<br><input type="number" name="year" placeholder="Enter Here" required size="50"/>
                           </p>
                       <p>AIP CONFERENCE CODE<br><input type="number" name="aip" placeholder="Enter Here" required size="50"/>
                           </p>
                         <p>PROGRAM/ PROJECT ACTIVITY DESCRRIPTION<br><input type="text" name="program" placeholder="Enter Here" required size="50"/>
                            </p>

                            <p>IMPLEMENTING DEPARTMENT<br><input type="text" name="department" placeholder="Enter Here" required size="50"/>
                            </p>

                            
                    
                            <p>PERIOD OF IMPLEMENTATION</p>
                            <p>START
                              
                  <input type="date" name="start">
                               
                         
                                COMPLETED
                              
                                  <input type="date" name="end">
<p>EXPECTED OUTPUT<br><textarea input type="text"  name="e_output" cols="50" rows="5" placeholder="Enter Here" required size="50"/></textarea>
                            </p>
 <p>SOURCE<select name="source">
                                <optgroup>
                                    <option>Barangay Development Fund</option>
                                    <option>Sangguniang Kabataan Fund</option>
                                    <option>Barangay Disaster Risk Reduction Management Fund</option>
                                    <option>Barangay Council For the Protection of Children Fund</option>
                                    <option>Senior Citizen Persons with Disability Fund</option>
                                </optgroup>
                            </select>
                           </p>
                           <p>AMOUNT<br><input type="number" name="amount" placeholder="Enter Here" required size="50"/>
                           </p>
      

                       <p>Status<select name="status">
                                <optgroup>
                                    <option>On-Going</option>
                                    <option>Completed</option>

                                </optgroup>
                            </select>
                           </p>
                           
                            <p>
                              <input type="Submit" name="submit" value="SUBMIT">
                              <a href="view.php">Cancel</a>
        </form>
    </section>
 