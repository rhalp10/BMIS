<?php
session_start();
require('db.php');

?>

    <!DOCTYPE html>
    <html>

     <link href="css/design.css" rel="stylesheet" type="text/css"> 

   <body>
<div class="label">
</div>
<div class="navbar" style="background-color: #e94b3c;">

   <?php 
if ($_SESSION['position']=='Barangay Secretary' OR $_SESSION['position']=='Barangay Treasurer')
echo'

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
        </div>';?>
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
     </body>
<form action = "view_tblprint2.php" method = "post">
<select name = "print">
<option><li>All</li></option>
            <?php $sql = mysqli_query($con, "SELECT year from annual_project GROUP BY year"); 
                  while($row = mysqli_fetch_assoc($sql))
                  {
                    ?><option><li><?php echo $row['year']; ?></li></option> <?php 
                  }

            ?>
</select>

<input type = "submit" name = "seestud" value="PRINT">
</form>                 
      <section class="down">
        <div class="banner">
        VIEW
        </div>
          <div class="form">
            <h2 align="center">Details of Program / Project/ Activity by Sector of Senior Citizen Persons with Disability Fund</h2>

            <table width="100%" border="2">
                <thead>
                    <tr width="100%">
                         <th width="10%">AIP Reference Code</th>
                        <th width="10%">Programs/Projects/<br>Activites</th>
                        <th width="10%">Implementing Office Department</th>
                      
                        <th width="10%">Starting Date</th>
                      
                        <th width="10%">Completion Date</th>
                        <th width="10%">Expected Output</th>
                        <th width="10%">Source of Funds</th>
                        <th width="10%">Cost</th>
                        <th width="10%">Status</th>
                    </tr>



                </thead>
                <tbody>

                    <?php
$count=1;
$sel_query= "Select * from annual_project where source='Senior Citizen Persons With Disability Fund' and year = (SELECT MAX(year) from annual_project) ORDER BY project_id desc";
$result = mysqli_query($con,$sel_query);
while ($row = mysqli_fetch_assoc($result)) { ?> 
                        <tr>
                            <td align="center" width="8%">
                                <?php echo $row["aip"]; ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["program"]; ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["department"];?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["start"]; ?>
                           <td>
                                <?php echo $row["end"]; ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["e_output"]; ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["source"]; ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo number_format($row["amount"]); ?>
                            </td>
                            <td align="center" width="8%">
                                <?php echo $row["status"]; ?>
                            </td>
                            

                            <?php $count++; }


  $add=mysqli_query($con,'SELECT SUM(amount) from `annual_project` Where `source` ="Senior Citizen Persons With Disability Fund" and year = (SELECT MAX(year) from annual_project);');
  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(amount)'];
?>
                                     <tr><tr></tr></tr> <th width="auto"></th>
                                        <th width="10%">
                                         
                                        </th><th width="auto"></th>
                                        <th width="10%">
                                           </th>
                                        <th width="auto"></th>
                                        <th width="10%">
                                         
                                        </th>


                                         </th>
                                        </th>
                                         <th width="auto">Total Projects Cost:</th>
                                        <th width="10%">
                                        <?php echo $_SESSION['total'] = number_format($total)?><th width="10%">
                                        </th>
                                        </td>
                                        </tr>
                                        <tr>
                                     
                                        </th>
                                        


                                 
                                      
                                        </th>
                                    </tr>

                  
            
      
                               
                        <?php } ?>

                  </tr>
                         
            




            <table width="100%" border="2">
  <th width="auto">TITLE</th>
                                        <th width="10%">CODE</th>
                                        <th width="auto">AMOUNT</th>
                                        <th width="10%">YEAR</th>
                                      
                                        </td>
                                        </tr>
                                        <tr>
                                     
                                        </th>
                                        <section class="down">
        <div class="banner">
      Yearly Alloted Fund for the Barangay 
        </div>

                   <?php 
                            $result = mysqli_query($con, "select f.noe_id,ffns.noe_type,noe_code, f.noe_amount,max(f.noe_year) as MaxDate
    from finance_fundoperation_noeset f
    inner join (SELECT max(noe_setid) mxID FROM finance_fundoperation_noeset WHERE noe_id = 3) x ON f.noe_setid = x.mxID
    INNER JOIN finance_fundoperation_noe ffns ON ffns.noe_id = f.noe_id
    group by f.noe_id");
                          while($row2 = mysqli_fetch_assoc($result))
                          {
?>

                              <tr>  
                              <td><?php echo $row2['noe_type']; ?></td>
                              <td><?php echo $row2['noe_code']; ?></td>
                              <td><?php echo number_format($row2['noe_amount']); ?></td>
                              <td><?php echo $row2['MaxDate']; ?></td>
                             
                              </tr>
<?php
                        }

                    ?>
                                    

 </table>
</div>
 </body>
</html>