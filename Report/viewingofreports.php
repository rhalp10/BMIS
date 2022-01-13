<?php

include('dbcon.php');
						
						
           if($_SESSION['reportID']==1){
			   
		   }
           else if($_SESSION['reportID']==2){
			    $query = "SELECT * FROM report_accomplishsment ORDER BY date_save";
						$res = mysqli_query($db,$query);
					while($row = mysqli_fetch_array($res)){
						
							$id = $row["accom_ID"];
								
							echo "<tr>
                            <td>Accomplishment Report</td>
                           
                            <td>".$row["date_save"]."</td>
                            <td>
								<a target='_blank' href='accomplishment.php?id=$id'><button  class='btn btn-success'> View </button></a>
								<input type='button' onClick='deleteme(".$id.")' class='btn btn-danger' value='Delete'>
								</td>
                            </tr>";
							
							
						}
		   }
		    else if($_SESSION['reportID']==3){
			   
		   } else if($_SESSION['reportID']==4){
			   
		   } else if($_SESSION['reportID']==5){
			   
		   } else if($_SESSION['reportID']==6){
			   
		   } else if($_SESSION['reportID']==7){
			    $query = "SELECT * FROM ref_manilabay ORDER BY date_save";
						$res = mysqli_query($db,$query);
					while($row = mysqli_fetch_array($res)){
						
							$id = $row["mb_ID"];
								
							echo "<tr>
                            <td>Manila Bay Clean Up</td>
                           
                            <td>".$row["date_save"]."</td>
                            <td><a target='_blank' href='MBCRP.php?id=$id'><button  class='btn btn-success'> View</button></a><input type='button' onClick='deleteme(".$id.")' class='btn btn-danger' value='Delete'></td>
                            </tr>";
					}
		   } else if($_SESSION['reportID']==8){
			   
		   } else if($_SESSION['reportID']==9){
			   
		   } else if($_SESSION['reportID']==10){
			   
		   }
		    else if($_SESSION['reportID']==11){
			   
		   }
		    else if($_SESSION['reportID']==12){
			    $query = "SELECT * FROM report_attendancemonitoring ORDER BY date";
						$res = mysqli_query($db,$query);
					while($row = mysqli_fetch_array($res)){
						
							$id = $row["attendancemonitoring_id"];
								
							echo "<tr>
                            <td>PERSONNEL ATTENDANCE MONITORING</td>
                           
                            <td>".$row["date"]."</td>
                            <td><a target='_blank' href='attendancemonitoring.php?id=$id'><button  class='btn btn-success'> VIEW </button></a>
							<input type='button' onClick='deleteme(".$id.")' class='btn btn-danger' value='Delete'></td>
                            </tr>";
					}
		   }
		    else if($_SESSION['reportID']==13){
			   
		   }
		    else if($_SESSION['reportID']==14){
			   $query = "SELECT * FROM report_cov ORDER BY date_save";
						$res = mysqli_query($db,$query);
					while($row = mysqli_fetch_array($res)){
						
							$id = $row["cov_ID"];
								
							echo "<tr>
                            <td>Certificate of Validation</td>
                           
                            <td>".$row["date_save"]."</td>
                            <td><a target='_blank' href='certificateofvalidation.php?id=$id'><button  class='btn btn-success'> VIEW </button></a><input type='button' onClick='deleteme(".$id.")' class='btn btn-danger' value='Delete'></td>
                            </tr>";
							
						}
		   }
					

					?>