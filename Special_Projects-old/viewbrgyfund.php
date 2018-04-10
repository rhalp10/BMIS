<?php
require('db.php');

      
session_start();
  $query = $con->query("SELECT * FROM finance_fundoperation_noe");
        $rowCount = $query->num_rows;
 
?>
 <link href="css/design.css" rel="stylesheet" type="text/css"> 
      
   <body>
<div class="label"> Dashboard / Special Project
</div>
<div class="navbar">
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
      <a href="viewbrgy.php">Barangay Annual Fund </a>
     
        </a>
        </div>
        </div>
        </div>

        <form action = "view_tblprint5.php" method = "post">
<!-- <form class="filteroption" action="" method="post"> -->
          <select class="select" name="print" onchange="filterTable()">
            <option value="All"><li>All</li></option>
            <?php $sql = mysqli_query($con, "SELECT year from annual_project GROUP BY year"); 
                  while($row = mysqli_fetch_assoc($sql))
                  {
                    ?><option><li><?php echo $row['year']; ?></li></option> <?php 
                  }

            ?>
          
          </select>
            <input  class="" type="submit" name="submit" value="Print">
</form>
           


      <section class="down">
        <div class="banner">
        VIEW 
        </div>

       
            <div class="form">       
            <h2 align="center">Details of Program / Project/ Activity by Sector of Barangay Annual Fund</h2>




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
              <tr>
<?php

            $res = mysqli_query($con, "SELECT
              annual_project.aip,
              annual_project.program,
              annual_project.department,
              annual_project.start,
              annual_project.end,
              annual_project.e_output,
              finance_fundoperation_noe.noe_id,
              annual_project.amount,
              annual_project.status,

              annual_project.project_id,
              finance_fundoperation_noeset.noe_setid
             FROM finance_fundoperation_noe INNER JOIN annual_project
             
              WHERE annual_project.project_id=
              finance_fundoperation_noe.noe_id");

              
          while($row = mysqli_fetch_array($res)){?>
          <?php
            $id = $row["noe_setid"];
                        
              echo "<tr><td>".$row["aip"]."<td>".$row["program"]."<td>".$row["department"]."<td>".$row["start"]."<td>".$row["end"]."<td>".$row["e_output"]."<td>".$row["noe_type"]."<td>".number_format($row["amount"])."<td>".$row["status"]."</td>



          <td><center><a href='IncomeFundOperationSetUpdate.php?id=$id'><button  class='btn btn-success'> UPDATE </button></a>&nbsp;&nbsp;&nbsp;&nbsp;</td><center>
              <td><center><a href='IncomeFundOperationSetDelete.php?id=$id'><button  class='btn btn-success'> DELETE </button></a></td></tr><center>";      
            } 
            
          ?>
                
  
</tr>
</thead>
</table>
</div>
</section>
                    



                  </tr>
  <?php
 ?>
      
      
    </tbody>
  </table>

</form>    
        </div>
        
       <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
        //   function filterTable(){
        //     var year = $('.select').val();

        //     $('[class^=year]').hide();
        //     $('.year_'+year).show(); 

        //     if(year=='all'){
        //       $('[class^=year]').show();
        //     }

        //     var total = 0;
        //     $('.amount').each(function(){
        //       total += $( this ).val();
        //     });
        //     $("#grand_total").innerHTML(total);
        //   }
        // </script>
    </body>

    </html>