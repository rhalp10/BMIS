<?php 
session_start();

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
        <?php
         
					
						$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query1 = "SELECT * FROM accounts WHERE Position='Barangay Captain'";
						$res1 = mysqli_query($con,$query1);
						
					

					while($row1 = mysqli_fetch_array($res1)){
						
							
							$secName=$row1["Fullname"];
							
							$_SESSION['captain']= $secName;
							
							
						}
        
       $query2 = "SELECT * FROM accounts WHERE Position='Barangay Secretary'";
						$res2 = mysqli_query($con,$query2);
						
					

					while($row2 = mysqli_fetch_array($res2)){
						
							
							$seccName=$row2["Fullname"];
							
							$_SESSION['secretary']= $seccName;
							
							
						}
        
        
        
        
        $query11 = "SELECT resident_detail.res_fName, resident_detail.res_mName, resident_detail.res_lName FROM resident_detail INNER JOIN brgy_official_position where resident_detail.res_ID = brgy_official_position.res_ID AND brgy_official_position.position_ID = 27";
						$res11 = mysqli_query($con,$query11);
						
					

					while($row11 = mysqli_fetch_array($res11)){
						
							
							$secName1=$row11["res_fName"]." ".$row11["res_mName"].". ".$row11["res_lName"];
							
							$_SESSION['desk']= $secName1;
							
							
						}
        
        
        
        
        
        
        
					
						
						
					?>
        
        <center>
       <table>
				<tr ><h2>REPORTS</h2></tr>
					<tr> 
						
						<th class="kinds">Kind of Reports</th>
												
						<th class="action">Upload</th>
                        <th class="action">View</th>
                        <th class="action">Create new</th>
					</tr>
					<?php
           $pID= $_SESSION['positionID'];
					
						$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query = "SELECT ref_report.report_Name, ref_report.report_ID FROM `ref_report` INNER JOIN report_list WHERE ref_report.report_ID = report_list.report_ID AND report_list.position_ID = '$pID' ORDER BY ref_report.report_Name";
						$res = mysqli_query($con,$query);
						
					

					while($row = mysqli_fetch_array($res)){
						
							
							$id=$row["report_ID"];
							
								
							echo "<tr>
                            <td>".$row["report_Name"]."</td>
                             <td class='btt'><a  href='uploadfile.php?id=$id'><button  class='btn btn-success'> UPLOAD FILE </button></a></td>
                            <td class='btt'><a  href='view.php?id=$id'><button  class='btn btn-success'> VIEW LIST </button></a></td>
                           <td class='btt'><a href='createnew.php?id=$id'><button  class='btn btn-success'> CREATE NEW </button></a></td>
                            </tr>";
							
							
						}
					
						
						
					?>
           
           
           
					
				</table>
            </center>
        
        
    
    
    
    </body>

</html>