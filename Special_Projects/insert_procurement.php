<?php

 
require('db.php');
?>
<?php


$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$item = $_REQUEST['item'];
$description = $_REQUEST['description'];
$ucost = $_REQUEST['ucost'];
$quantity = $_REQUEST['quantity'];
$unit = $_REQUEST['unit'];
$total = $_REQUEST['total'];

$ins_query="insert into annual_procurement (`item`,`description`,`ucost`,`quantity`,`unit`,`total`)
 values ('$item','$description','$ucost','$quantity','$unit','$total')";
mysqli_query($con, $ins_query) or die(mysql_error());

$status = "New Record Inserted Successfully.</br></br><a href='view_procurement.php'>View Inserted Record</a>";
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="css/design.css" rel="stylesheet" type="text/css">	
</head>
<body>
<div class="label">
</div>
						<body>
<div class="navbar" style="background-color: #e94b3c;">
<a href="view.php">HOME</a>
    <div class="dropdown">
      <button class="dropbtn">Insert New Record
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="insert_annual.php">Add new Annual Fund</a>
         <a href="insert_youth.php">Add new Annual Youth</a>
        <a href="insert_procurement.php">Add new Procurement</a> 
    </div>
      </div>
  <div class="dropdown">
      <button class="dropbtn">Edit Record
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        
      <a href="viewbrgy.php"> All Project</a> 
      <a href="viewsk.php">Youth Plan</a> 
        <a href="view_procurement.php"> Procurement Plan</a>   
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
		Add Annual Procurement Plan
		</div>
    <center>
		<form method="POST">
			
<form method="POST">
<p style="color:#FF0000;"><?php echo $status; ?></p>


<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<p>Item<br><input type="text" name="item" placeholder="Enter Here" required size="50"/>
</p>

<p>Description<br> <input type="text" name="description" placeholder="Enter Here" required size="50"/>
</p>
<p>Unit<br> <input type="text" name="unit" placeholder="Enter Here" required size="50"/>
</p>

<p>Unit Cost<br><input type="text" name="ucost" placeholder="Enter Here" required size="50"/>
</p>

<p>Quantity<br><input type="text" name="quantity" placeholder="Enter Here" required size="50"/>
</p>
<p>Total Cost<br><input type="text" name="total" placeholder="Enter Here" required size="50"/>
</p>

	<p> <input name="submit" type="submit" value="Submit" />
<a href="view_procurement.php">Cancel</a>
</p>
		</form>
	</section>
</body>

</html>