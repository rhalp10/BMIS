        <?php
         
					
						include('dbcon.php');
						$query1 = "SELECT resident_detail.res_fName, resident_detail.res_mName, resident_detail.res_lName FROM resident_detail INNER JOIN brgy_official_detail where resident_detail.res_ID = brgy_official_detail.res_ID AND brgy_official_detail.commitee_assignID = 2";
						$res1 = mysqli_query($db,$query1);
						
					

					while($row1 = mysqli_fetch_array($res1)){
						
							$mid = $row1['res_mName'];
            $midd = $mid[0];
							$secName=$row1["res_fName"]." ". $midd.". ".$row1["res_lName"];
							
							$_SESSION['captain']= $secName;
							
							
						}
        
       $query2 = "SELECT resident_detail.res_fName, resident_detail.res_mName, resident_detail.res_lName FROM resident_detail INNER JOIN brgy_official_detail where resident_detail.res_ID = brgy_official_detail.res_ID AND brgy_official_detail.commitee_assignID = 3";
						$res2 = mysqli_query($db,$query2);
						
					

					while($row2 = mysqli_fetch_array($res2)){
						$mid = $row2['res_mName'];
            $midd = $mid[0];
							
							$seccName=$row2["res_fName"]." ".$midd.". ".$row2["res_lName"];
							
							$_SESSION['secretary']= $seccName;
							
							
						}
						
						
						$query2 = "SELECT resident_detail.res_fName, resident_detail.res_mName, resident_detail.res_lName FROM resident_detail INNER JOIN brgy_official_detail where resident_detail.res_ID = brgy_official_detail.res_ID AND brgy_official_detail.commitee_assignID = 4";
						$res2 = mysqli_query($db,$query2);
						
					

					while($row2 = mysqli_fetch_array($res2)){
						$mid = $row2['res_mName'];
            $midd = $mid[0];
							
							$seccName=$row2["res_fName"]." ".$midd.". ".$row2["res_lName"];
							
							$_SESSION['treasurer']= $seccName;
							
							
						}
						
						// $con1 =  mysqli_connect("localhost", "root", "","bmis_db");
						// $query11 = "SELECT * FROM `ref_brgy`";
						// $res1 = mysqli_query($db1,$query11);
						// $row1=mysqli_fetch_assoc($res1);
						// $brgy=$row1['brgy_Name'];
						$_SESSION['barangay'] = "Banaba Cerca";
        
        ?>