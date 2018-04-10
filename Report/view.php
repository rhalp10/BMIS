<?php 
session_start();
$id = $_GET['id'];
?>
<html>
    <head>

    <title>REPORT MODULE</title>
     <style>
table {
    border: 1px solid gray;
    width: 80%;
    border-collapse: collapse;
}

th {
     background-color: #27AE60;
    text-align: center;
    padding: 8px;
      border: 1px solid #e9f7ef;
   border: 1px solid gray;
    color: white;
}
        
        
        
td {
       background-color: white;
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid gray;
}
        .btt{
            text-align: center;
            
        }

 .btn {
            border-radius: 3px;
    background-color: #797D7F; /* Green */
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display:    inline-block
    font-size: 16px;
    margin: 0px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
     
     
}


.btn-success:hover {
    background-color: #27AE60;
    color: white;
}
</style>
    </head>
    
        
    <body>
       <a  href="viewreport.php"><button  class='btn btn-success'> back </button></a>
        
        
        
        <center>
       <table>
           <tr ><h2>REPORTS</h2></tr>
				
					<tr> 
						
						<th class="kinds">LIST</th>
                        <th class="kinds">FILENAME</th>
				<th >DATE UPLOADED</th>
						
						<th class="action">VIEW</th>
                        <th class="action">DELETE</th>
					</tr>
					<?php
           $pID= $_SESSION['positionID'];
					
						$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query = "SELECT `ref_report`.`report_Name`, `report_data`.`reportdata_id`, `report_data`.`report_ID`,`report_data`.`reportdata_date`, `report_data`.`Title` FROM `ref_report` inner join `report_data` WHERE `ref_report`.`report_ID` = `report_data`.`report_ID` and `report_data`.`position_ID` = '$pID' and `report_data`.`report_ID` = '$id'";
						$res = mysqli_query($con,$query);
						
           
           
					

					while($row = mysqli_fetch_array($res)){
						
							$id = $row["reportdata_id"];
							
						
								
							echo "<tr>
                            <td>".$row["report_Name"]."</td>
                            <td>".$row["Title"]."</td>
                            <td>".$row["reportdata_date"]."</td>
                            <td class='btt'><a target='_blank' href='attachment.php?id=$id'><button  class='btn btn-success'> VIEW </button></a></td>
                           <td class='btt'> <a href='delete.php?id=$id' onclick='return confirm('Are you sure?');'><button  class='btn btn-success'> DELETE </button></a></td>
                            </tr>";
							
							
						}
					
						
						
					?>
					
				</table>
            </center>
        
        
    
    
    
    </body>

</html>