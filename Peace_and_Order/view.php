<html>
<style>
body {
	font-family: calibri;
	margin: 0; padding: 0;
} 
.label {
	background-color: #141414;
	width:100%;
	height:auto;
	padding-left: 3px;
	padding-top:3px;
	padding-bottom: 3px;
	color: white;
	top: 0;

}
.nav {
	background-color: #444444;
	margin-left:1%;
	margin-top:1%;
	margin-right:1%;
	border: none;

	width:98%;
	position: relative;
	overflow: hidden;
	text-transform: uppercase;
	font-family: calibri; 	
}
.nav a {
    	float: left;
	display: block;
	color: #f2f2f2;
    	text-align: center;
    	padding: 14px 16px;
    	text-decoration: none;
}
.nav a:hover {
    	background: #14aa6c;
    	color: white;
} 
.container {
	background-color: white;
	border: black solid;
	height:auto;
	width: 97%;
	margin-top: 1%;
	margin-left: 1%;
	margin-right: 1%;
	margin-bottom: 1%;
	overflow: hidden;
	
}

.left { 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 47%;
	margin-top: 1%;
	margin-left: 1%;
	float:left;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
}
.right{ 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 47%;
	margin-top: 1%;
	margin-right: 1%;
	float:right;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
}
.down{ 
	background-color: white;
	height:auto;
	width: 98%;
	margin-top: 1%;
	margin-right: 1%;
	float:right;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
	margin-bottom: 2%;
}
 .banner {
	width: auto;
  	height: 30px;
	padding-top: 8px;
	padding-bottom: 8px;
    	font-size: 20px;
    	text-align: center;
    	color: WHITE;
    	font-weight: bold;
    	background: #14aa6c;
    	border: #14aa6c solid 1px;
    	font-family: calibri
	padding-bottom: 2%;
	
}
input[type=text]{
	text-align:left;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color: #dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=password]{
	text-align:left;
	width: 50%;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color:#dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=text]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;
}
input[type=submit]:hover {
	background-color: #14aa6c;
	border: none;
	color: white;
	-webkit-transition:background 0.5s ease-in-out;
	-moz-transition:background 0.5s ease-in-out;
	transition:background-color 0.5s ease-in-out;
}
input[type=submit] {
	background-color: #444444;
	border: none;
	padding: none;
	color: white;	
	width:98%;
	height: 45px;
	margin-top:5%;
	margin-left:1%;
	margin-right:1%;
	border-radius: 7px;
}
input[type=password]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;

}
.container {
	
	background-color:  #14aa6c;
	border-color:#14aa6c;
	border-style: solid;
	height:350;
	width:1000;
	padding-top: 8px;
	padding-bottom: 8px;

}


</style>
<body>
<div class="label">Dashboard / Peace & Order /File blotter/incident case
</div>
<div class="nav">
	<a href="opening.php">Peace & Order</a>
	<a href="fileblotter.php">File blotter/incident case  </a>
	<a href="fileblotter.php">View blotter/incident case  </a>
	
</div> 


 <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>PEACE & ORDER (List of Incident) <a class="btn btn-primary btn-sm float-right" href="add_blotter.php">New Incident Report</a></h5>     
                                              
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="blotter_table">
                            <thead>
                                <tr>
                                    <th scope="col">Incident No.</th>
                                    <th scope="col">Complainant</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Date Reported</th>
                                    <th scope="col">Date occurred</th>
                                    <th scope="col">Complainant Type</th>
                                    <th scope="col" class="text-center">Solve</th>
                                    <th scope="col" class="text-center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $systems->getIncidentList();
                                    if($results){
                                        while($row = mysqli_fetch_assoc($results)){
                                        
                                            $date_reported = date('F d, Y h:i a', strtotime($row['date_reported']));
                                            $date = date('F d, Y', strtotime($row['date_incident']));
                                            $time = date('h:i a', strtotime($row['time_incident']));
                                            $incident_occurred = $date.' '.$time;

                                            if($row['complainantType_ID'] == 2 ){
                                                // outsider
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$row['name'].'</td>
                                                            <td>'.$row['phone_number'].'</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            <td>Outsider</td>
                                                            <td class="text-center"><i class="'.($row['status'] == '2'?"ti-check txt-green":"ti-close txt-red").'"></i></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                                <a href="update_incident.php?edit='.$row['incident_id'].'" class="btn-warning btn btn-sm primary-action"><i class="ti-pencil-alt"></i>    Edit</a>
                                                            </td>
                                                        </tr>
                                                        ';
                                            }else if($row['complainantType_ID'] == 1 ){
                                                // insider

                                                $res = $systems->getResidentDetails($row['res_ID']);
                                                // var_dump($res);
                                                if($res[0]['res_contact_no'] != null || $res[0]['res_contact_no'] !== ""){
                                                    $contact_no = $res[0]['res_contact_no'];
                                                }else{
                                                    $contact_no = "N/A";
                                                }
                                                
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$res[0]['res_fName'].' '.$res[0]['res_lName'].','.$res[0]['res_mName'].''.$res[0]['suffix'].'</td>
                                                            <td>'.$contact_no.'</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            <td>Resident</td>
                                                            <td class="text-center"><i class="'.($row['status'] == '2'?"ti-check txt-green":"ti-close txt-red").'"></i></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                                <a href="update_incident.php?edit='.$row['incident_id'].'" class="btn-warning btn btn-sm primary-action"><i class="ti-pencil-alt"></i>    Edit</a>
                                                            </td>
                                                        </tr>
                                                        ';
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>