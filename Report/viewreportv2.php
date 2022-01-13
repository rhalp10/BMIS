<?php 
session_start();
include('official.php');
include('checkposition.php');
 $pID= $_SESSION['position_ID'];
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
        background-color: #134C72;
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

    .btt {
        text-align: center;

    }

    .btn {
        border-radius: 3px;
        background-color: #797D7F;
        /* Green */
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 0px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;


    }


    .btn-success:hover {
        background-color: #31B0D5;
        color: white;
    }
    </style>
</head>


<body>





    <center>
        <table>
            <?php if($pID==3){ echo "<tr ><td><h1>REPORTS</h1></td><td></td><td class='btt'><a  href='logosettings.php'><button  class='btn btn-success'> SETTINGS </button></a></td></tr>";} 
				else{
					echo "<tr ><td><h1>REPORTS</h1></td></tr>";
				}?>
            <tr>

                <th class="kinds">Kinds of Report</th>
                <th class="action">Action</th>

            </tr>
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
								<td class='btt'><a  href='view.php?id=$id'><button  class='btn btn-success'> VIEW LIST </button></a></td>
								<td class='btt'><a href='createnew.php?id=$id'><button  class='btn btn-success'> CREATE NEW </button></a></td>
								</tr>";
                                
                            }else if ($id==15){
                                    $others=$row["report_Name"];
									$others1=$id;
									$others2=$id;
                                    
                                   
                            }else if ($id==16){
								$query1 = "SELECT distinct income_year as etooh FROM finance_fundoperation_incomeset";
								$res1 = mysqli_query($db,$query1);
								
								while($row1 = mysqli_fetch_array($res1)){
									echo "<tr>
									<td>".$row["report_Name"]."</td>
									 <td>".$row1["etooh"]."</td>
									<td class='btt'><a  href='printFundOperation.php?year=".$row1["etooh"]."' target='_blank'><button  class='btn btn-success'> VIEW </button></a></td>
									</tr>";
								}
                        
							
							
							}
							if($pID>=9&&$pID<=15){
								echo "<tr>
								<td>".$others."</td>
								 <td class='btt'><a  href='view.php?id=$others2'><button  class='btn btn-success'> VIEW LIST </button></a></td>
								<td class='btt'><a  href='uploadfile.php?id=$others1'><button  class='btn btn-success'> UPLOAD FILE </button></a></td>
							   
								</tr>";
							}
					 
						
					}
                        if($pID==3||$pID==3){ echo "<tr>
								<td>Resident Information Report</td>
								 <td class='btt'><a  href='res.php'><button  class='btn btn-success'> VIEW LIST </button></a></td>
								<td class='btt'></td>
							   
								</tr>";}
					}
					else{
						
						echo '<script>window.location = "../../dreamit/index.php";</script>';
					}
					?>




        </table>
    </center>





</body>

</html>