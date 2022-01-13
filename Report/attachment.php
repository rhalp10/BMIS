<?php 
session_start();
$id = $_GET['id'];

					

					
						include('dbcon.php');
						$query = "SELECT * FROM `report_data` WHERE reportdata_id = '$id'";
						$res = mysqli_query($db,$query);
	
					while($row = mysqli_fetch_array($res)){
						
							header('Content-Type:'.$row['reportdata_type']);
							
							
								
							echo $row['reportdata_use'];
							
							
						}
					
						
						
					?>