<?php
 session_start();
require('db.php');
?>
<?php


$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$issues = $_REQUEST['issues'];
$programs = $_REQUEST['programs'];
$result = $_REQUEST['result'];
$amount = $_REQUEST['amount'];
$start = $_REQUEST['start'];
$end = $_REQUEST['end'];
$status = $_REQUEST['status'];

$ins_query="insert into youth_investment (`issues`,`programs`,`result`,`amount`,`start`,`end`,`status`)
 values ('$issues','$programs','$result','$amount','$start','$end','$status')";

}
?>
<!DOCTYPE html>
<html>
<head>
  <link href="css/design.css" rel="stylesheet" type="text/css">   
</head>
<body>

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
          
     <form action = "view_tblprint6.php" method = "post">
<select name = "print">
<option value = "all">All Data</option>
            <?php $sql = mysqli_query($con, "SELECT year from youth_investment GROUP BY year"); 
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
        </body>
    
    </form>

<table width="100%" border="2" style="border-collapse:collapse;">
<thead>
             
 
</tr>

<table width="100%" border="2" style="border-collapse:collapse;">
 
            <h2 align="center">Details of Program / Program oject/ Activity by Sector of Sangguniang Kabataan Youth Investment Fund</h2>

            <table width="100%" border="2" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th>GAPS/ISSUES</th>
                        <th>Programs/Projects/<br>Activities</th>
                        <th>Result/Target<br>/Beneficiaries</th>
                        <th>Project Cost</th>  
                        <th>Date Started</th>
                        <th>Date Ended</th>
                      
                        <th>Status</th>                       
                        
                    </tr>
                </thead>
                <tbody>

               <?php
$count=1;
$sel_query="Select * from youth_investment where year = (SELECT MAX(year) from youth_investment)ORDER BY youth_id desc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {   ?>
  
                        <tr>
                            <td align="center">
                                <?php echo $row["issues"]; ?>
                            </td>
                            <td align="center">
                                <?php echo $row["programs"]; ?>
                            </td>
                            <td align="center">
                                <?php echo $row["result"];?>
                            </td>
                            <td align="right">
                                <?php echo number_format($row["amount"]); ?>
                            </td>
                        
                            <td align="center">
                                <?php echo $row["start"]; ?>
                            </td>
                            <td align="center">
                                <?php echo $row["end"]; ?>
                            </td>
                          
                            <td align="center">
                                <?php echo $row["status"]; ?>
                            </td>
                      
                          
                            <?php $count++; }

?>
                </tbody>
                </tr>
<?php
  $add=mysqli_query($con,'SELECT SUM(amount) from `youth_investment` where  year = (SELECT MAX(year) from youth_investment);');
  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(amount)'];
?>
                                   <tr><tr></tr></tr> 

                                        <th width="10%">
                                           </th>
                                        <th width="auto"></th>
                                       


                                         </th>
                                        </th>
                                         <th width="auto">Total Projects Cost:</th>
                                        <th width="10%">
                                        <?php echo $_SESSION['total'] = number_format($total)?>
                                        <th width="10%"></th>
                                        <th width="auto"></th>
                                        <th width="10%"></th>
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
    inner join (SELECT max(noe_setid) mxID FROM finance_fundoperation_noeset WHERE noe_id = 8) x ON f.noe_setid = x.mxID
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