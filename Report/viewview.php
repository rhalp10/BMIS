<?php 
session_start();
$id = $_GET['id'];

					
						$pID= $_SESSION['positionID'];
					
						$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query = "SELECT * FROM `report_data` WHERE report_ID = '$id' AND position_ID = '$pID'";
						$res = mysqli_query($con,$query);
						$res = mysqli_query($con,$query);
	
					while($row = mysqli_fetch_array($res)){
						
							header('Content-Type:'.$row['reportdata_type']);
							
							
								
							echo $row['reportdata_use'];
							
							
						}
					
						
						
					?>












