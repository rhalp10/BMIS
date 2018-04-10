<?php 
session_start();
$id = $_GET['id'];

					

					
						$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query = "SELECT * FROM `report_data` WHERE reportdata_id = '$id'";
						$res = mysqli_query($con,$query);
	
					while($row = mysqli_fetch_array($res)){
						
							header('Content-Type:'.$row['reportdata_type']);
							
							
								
							echo $row['reportdata_use'];
							
							
						}
					
						
						
					?>