<?php
					
          
					if($pID>0){
						include('dbcon.php');
						$query = "SELECT ref_report.report_Name, ref_report.report_ID FROM `ref_report` INNER JOIN report_list WHERE ref_report.report_ID = report_list.report_ID AND report_list.position_ID = '$pID' ORDER BY `ref_report`.`report_name`";
						$res = mysqli_query($db,$query);
						$others="";
						$others1="";
						$others2="";
					

					while($row = mysqli_fetch_array($res)){
						
							
							$id=$row["report_ID"];
							if($id<15){
                                
									echo "<tr>
								<td>".$row["report_Name"]."</td>
								<td><a  href='view.php?id=$id'><button  class='btn btn-primary'> VIEW LIST </button></a><a href='createnew.php?id=$id'><button  class='btn btn-success'> CREATE NEW </button></a></td>
								</tr>";
                                
                            }else if ($id==15){
                                    $others=$row["report_Name"];
									$others1=$id;
									$others2=$id;
                                    
                                   
                            }else if ($id==16){
								
									echo "<tr>
									<td>".$row["report_Name"]."</td>
									<td><a  href='viewfinance.php?id=$id'><button  class='btn btn-primary'> VIEW LIST </button></a></td>
									 </tr>";
								
                        
							
							
							}
							else if ($id==17){
								
									echo "<tr>
									<td>".$row["report_Name"]."</td>
									<td><a  href='viewfinance.php?id=$id'><button  class='btn btn-primary'> VIEW LIST </button></a></td>
									 </tr>";
								
                        
							
							
							}
							if($pID>=9&&$pID<=15){
								echo "<tr>
								<td>".$others."</td>
								 <td><a  href='view.php?id=$others2'><button  class='btn btn-primary'> VIEW LIST </button></a><a  href='uploadfile.php?id=$others1'><button  class='btn btn-success'> UPLOAD FILE </button></a></td>
							   
								</tr>";
							}
					 
						
					}
                        if($pID==3||$pID==3){ echo "<tr>
								<td>Resident Information Report</td>
								 <td><a  href='res.php'><button  class='btn btn-primary'> VIEW LIST </button></a></td>
							   
								</tr>";}
					}
					else if($_SESSION['position']=="Barangay Health Worker"){ echo "<tr>
								<td>Resident Information Report</td>
								 <td><a  href='res.php'><button  class='btn btn-primary'> VIEW LIST </button></a></td>
							   
								</tr>";}
					
					else{
						
						echo '<script>window.location = "../index.php";</script>';
					}
					?>