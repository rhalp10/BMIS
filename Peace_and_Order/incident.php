<?php include('inc/header.php'); include_once('lib/init.php')?>


    <section class="content">
        <div class="row">
            <div class="" style="padding: 0px 15px;">
                <div class="card">
                    <div class="card-header">
                        <h5>PEACE & ORDER (List of Incident) <a class="btn btn-primary btn-sm float-right" href="add_blotter.php">New Incident Report</a></h5>     
                                              
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="blotter_table">
                            <thead>
                                <tr>
                                    <th scope="col">Incident No.</th>
                                    <th scope="col">Blotter Type</th>
                                    <th scope="col">Complainant</th>
                                    <th scope="col">Offender/s</th>
                                    <th scope="col">Complainant Type</th>
                                    <th scope="col">Date Reported</th>
                                    <th scope="col">Date occurred</th>                                    
                                    <th scope="col" class="text-center">Status</th>
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

                                            $offenders = $systems->getOffender($row['incident_id']);
                                            $offenderName = "N/A";
                                            $offenderNames = null;
                                            if($offenders){
                                                while($offender = mysqli_fetch_assoc($offenders)){
                                                    // var_dump($offender);
                                                    if($offender['off_complainantType'] == 2 ){
                                                        $offenderNames[] = $offender['offender_name'];
                                                    }else{
                                                        $offenderDetails = $systems->getResidentDetails($offender['off_res_ID']);
                                                        $offenderNames[] = $offenderDetails[0]['res_lName'].' '.$offenderDetails[0]['res_fName'].' '.$offenderDetails[0]['suffix'];
                                                    }
                                                }
                                                $offenderName = implode(" , ",$offenderNames);
                                            }

                                            
                                            // var_dump($offenderName);
                                            if($row['status'] == '1'){
                                                $status = 'Mediated 4a';
                                            }elseif($row['status'] == '2'){
                                                $status = 'Concialited 4b';
                                            }
                                            elseif($row['status'] == '3'){
                                                $status = 'Arbitrated 4a';
                                            }
                                            elseif($row['status'] == '4'){
                                                $status = 'Arbitrated 4b';
                                            }
                                            elseif($row['status'] == '5'){
                                                $status = 'Dismiss 4c';
                                            }elseif($row['status'] == '6'){
                                                $status = 'Certified case 4d';
                                            }

                                            if($row['blotterType_id'] == 2){
                                                $blotterType = 'Incident';
                                            }else{
                                                $blotterType = 'Complaint';
                                            }
                                            if($row['complainantType_ID'] == 2 ){
                                                // outsider
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$blotterType.'</td>
                                                            <td>'.$row['name'].'</td>
                                                            <td>'.$offenderName.'</td>
                                                            <td>Non Resident</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            
                                                            <td class="text-center">'.$status.'</td>
                                                            <td class="text-center">
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-primary" href="new_person.php?case='.$row['incident_id'].'"><i class="ti-plus"></i>     New Person Involve</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-primary" href="involve_person.php?case='.$row['incident_id'].'"><i class="ti-eye"></i>     View Person Involves</a>
                                                                <a style="margin-bottom: 10px;" href="update_incident.php?edit='.$row['incident_id'].'" class="btn-warning btn btn-sm primary-action"><i class="ti-pencil-alt"></i>    Edit</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                            </td>
                                                        </tr>
                                                        ';
                                            }else if($row['complainantType_ID'] == 1 ){
                                                // insider
                                                $res = $systems->getResidentDetails($row['res_ID']);
                                                if($row['status'] == '1'){
                                                    $status = 'Mediated 4a';
                                                }elseif($row['status'] == '2'){
                                                    $status = 'Concialited 4b';
                                                }
                                                elseif($row['status'] == '3'){
                                                    $status = 'Arbitrated 4a';
                                                }
                                                elseif($row['status'] == '4'){
                                                    $status = 'Arbitrated 4b';
                                                }
                                                elseif($row['status'] == '5'){
                                                    $status = 'Dismiss 4c';
                                                }elseif($row['status'] == '6'){
                                                    $status = 'Certified case 4d';
                                                }
                                                
                                                echo    '<tr>
                                                            <td>#'.$row['incident_id'].'</td>
                                                            <td>'.$blotterType.'</td>
                                                            <td>'.$res[0]['res_fName'].' '.$res[0]['res_lName'].','.$res[0]['res_mName'].''.$res[0]['suffix'].'</td>
                                                            <td>'.$offenderName.'</td>
                                                            <td>Resident</td>
                                                            <td>'.$date_reported.'</td>
                                                            <td>'.$incident_occurred.'</td>
                                                            <td class="text-center">'.$status.'</td>
                                                            <td class="text-center">
                                                                <a style="margin-bottom: 10px;"  class="btn btn-sm btn-primary" href="new_person.php?case='.$row['incident_id'].'"><i class="ti-plus"></i>     New Person Involve</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-primary" href="involve_person.php?case='.$row['incident_id'].'"><i class="ti-eye"></i>     View Persons Involve</a>
                                                                <a style="margin-bottom: 10px;" href="update_incident.php?edit='.$row['incident_id'].'" class="btn-warning btn btn-sm primary-action"><i class="ti-pencil-alt"></i>    Edit</a>
                                                                <a style="margin-bottom: 10px;" class="btn btn-sm btn-success" href="print_incident.php?print='.$row['incident_id'].'"><i class="ti-printer"></i>     Print</a>
                                                                    
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
    
<?php include('inc/footer.php');?>