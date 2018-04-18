<?php
session_start(); 
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>

  <link href="css/design.css" rel="stylesheet" type="text/css">   
</head>
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
             
<!-- <section class="container"> -->
<form action="" method="post">
    <!-- <input type="text" id="valueToSearch" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
   
      <section class="down">
        <div class="banner">
        VIEW 

        </div>
        
       
            <div class="form"> 
 
            <h2 align="center">Details of Program / Project/ Activity by Sector of Sangguniang Kabataan Youth Investment Fund</h2>
          
                            
<p>  <input type="search" class="light-table-filter" data-table="order-table" placeholder="Search All Youth"></p>

    
            <table class="order-table table" width="100%" border="2" id="table">
                <thead>
                    <tr width="100%">
                        <th>GAPS/ISSUES</th>
                        <th>Programs/Projects/<br>Activities</th>
                        <th>Result/Target<br>/Beneficiaries</th>
                        <th>Project Cost</th>  
                        <th>Date Started</th>
                        <th>Date Ended</th>
                      
                        <th>Status</th>                       
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>

               <?php
$count=1;
$sel_query="Select * from youth_investment ORDER BY youth_id desc";
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
                           <td align="center" width="8%"><a style="color:BLUE;" href="edit.php?id=<?php echo $row["youth_id"];?>">Edit</a>&nbsp<a style="color:BLUE;" href="delete_youth.php?id=<?php echo $row["youth_id"];?>">Delete</a></td>
                          
                            <?php $count++; }

?>
                </tbody>
                </tr>
<?php
  $add=mysqli_query($con,'SELECT SUM(amount) from `youth_investment` ;');
  while($row1=mysqli_fetch_array($add))
  {
    $total=$row1['SUM(amount)'];
?>
                                     <tr><tr></tr></tr> 
                                        
                                        <th width="auto"></th>
                                        <th width="10%">
                                         
                                        </th>


                                         </th>
                                        </th>
                                         <th width="auto">Total Projects Cost:</th>
                                        <th width="10%">
                                        <?php echo $_SESSION['total'] = number_format($total)?>
                                        <th width="auto"></th>
                                        <th width="10%"><th width="10%">
                                           </th>
                                         
                                        </th><th width="auto"></th>
                                        </th>
                                        </td>
                                        </tr>
                                        <tr>
                                     
                                        </th>
                                        


                                 
                                      
                                        </th>
                                    </tr>

                  
            
      
                               
                        <?php } ?>

                  </tr>
                         
            


            </table>
        </div>
  <?php
 ?>
      
     
 </tbody>
  </table>
<!-- </section> -->

<script>
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>

    </body>

    </html>