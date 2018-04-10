<?php

 
require('db.php');
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/design.css" rel="stylesheet" type="text/css">	
</head>
<body>

						<body>

<!-- <div class="label"> Dashboard / Special Project
</div> -->
<div class="navbar">
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
          <form action = "view_tblprint7.php" method = "post">
<!-- <form class="filteroption" action="" method="post"> -->
               <select class="select" name="print" onchange="filterTable()">
            <option><li>All</li></option>
            <?php $sql = mysqli_query($con, "SELECT year from annual_procurement GROUP BY year"); 
                  while($row = mysqli_fetch_assoc($sql))
                  {
                    ?><option><li><?php echo $row['year']; ?></li></option> <?php 
                  }

            ?>
          </select>
            <input  class="" type="submit" name="submit" value="Print">
</form>
</select>      
      	<section class="down">
		<div class="banner">
		VIEW
		</div>


<table width="100%" border="2" style="border-collapse:collapse;">
<tr>


    </section>   
<br><br>
<thead>
             
                                            
               
<!-- <thead>
 <tr width="100%">
                        <th width="10%">Name of Barangay: </th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        </tr>
<tr width="100%">
                        <th width="10%">Program Control No.: </th>
                        <th width="10%">Planned Amount: </th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        </tr>  -->
<tr width="100%">
                        <th width="10%">Department Office:  Alulod</th>
                        <th width="10%">Regular</th>
                        <th width="10%">Contigency</th>    
                        <th width="10%">Date Submitted</th>

                        </tr>                        




<table width="100%" border="2" style="border-collapse:collapse;">
<tr width="100%">
                        <th width="10%">Item No.</th>
                        <th width="10%">Description</th>
                        <th width="10%">Unit Cost</th>
                        <th width="10%">Quantity</th>     
                        <th width="10%">Unit</th>
                        <th width="10%">Total Cost</th>
                        <th width="10%"></th>
                        <th width="10%">Distribution</th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>                  
</tr><tr width="100%">
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">1st Quarter</th>
                        <th width="1%"></th>
                        <th width="10%">2nd Quarter</th>     
                        <th width="1%"></th>
                        <th width="10%">3rd Quarter</th>
                        <th width="1%"></th>
                        <th width="10%">4th Quarter</th>
                        <th width="1%"></th>                  
</tr>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>     
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                                      
</tr>
<tbody>
<?php
$count=1;
$sel_query="Select * from annual_procurement where year = (SELECT MAX(year) from annual_procurement) ORDER BY id desc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
	?>
<tr>
	<td align="center"><?php echo $row["item"]; ?></td>
	<td align="center"><?php echo $row["description"];?></td>
	<td align="center"><?php echo number_format($row["ucost"]); ?></td>
	<td align="center"><?php echo $row["quantity"]; ?></td>
	<td align="center"><?php echo $row["unit"]; ?></td>
  <td align="center"><?php echo number_format ($row["total"]); ?></td>
	

						<th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
</thead>

	</tr>
  <?php $count++; }


  $add=mysqli_query($con,'SELECT SUM(total) from `annual_procurement` where year = (SELECT MAX(year) from annual_procurement);');

  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(total)'];
    $_SESSION['total'] = $total;
?>
                                    <tr> <th width="auto"></th>
                                        <th width="10%">
                                           <th width="auto"></th>
                                        <th width="10%">
                                    
                                        
                                        
                                        </th>
                                         <th width="auto">Total Cost:</th>
                                        <th width="10%">
                                            <?php echo $_SESSION['total'] = number_format($total) ?>
                                        </th>
                                          <th width="10%">
                                        </th>
                                         <th width="auto"></th>
                                        <th width="10%"> <th width="auto"></th>
                                        <th width="10%"> <th width="auto"></th>
                                        <th width="10%"> <th width="auto"></th>
                                        <th width="10%">
                                        
                                    </tr>
                                            <?php } ?>

</body>

</html>