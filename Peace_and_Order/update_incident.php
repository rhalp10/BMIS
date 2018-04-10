<?php include('inc/header.php'); include_once('lib/init.php')?>
<?php
    if(isset($_GET['edit']) && $_GET['edit'] !== ""){
        $results = $systems->getData($_GET['edit']);
        if($results){
            while($row = mysqli_fetch_array($results)){
                // var_dump($row);
                $case_no = $row['incident_id'];

                $blotterType = $row['blotterType_id'];
                // $violation_id = $row['violation_id'];
                $incident_type = $row['case_incident'];
                // echo $incident_type;
                $incident_title = $row['incident_title'];
                $time = $row['time_incident'];
                $date = date('d/m/Y', strtotime($row['date_incident']));
                $date_reported = $row['date_reported'];
                $location = $row['location'];
                $narrative = $row['narrative'];
                $status = $row['status'];
            }            
        }
        $offender = $systems->getOffender($_GET['edit'],true);
        $offender_name = "";
        $offender_address = "";
        $offender_gender = "";
        $description = "";
        $off_complainantType = "";
        if($offender){
            while($off = mysqli_fetch_array($offender)){
                $off_complainantType = $off['off_complainantType'];
                $description = $off['description'];
                if($off['off_complainantType'] == 2){    
                    $offender_name = $off['offender_name'];
                    $offender_address = $off['offender_address'];
                    $offender_gender = $off['offender_gender'];
                    
                }else{
                    $res = $systems->getResidentDetails($off['off_res_ID']);
                    // var_dump($res);
                    $offender_name = $res[0]['res_lName'].' '.$res[0]['res_fName'].','.$res[0]['res_mName'].','.$res[0]['suffix'];
                    $offender_address = $res[0]['address_Unit_Room_Floor_num'].' '. $res[0]['address_BuildingName'].' '. $res[0]['address_Lot_No'].' '.$res[0]['address_Block_No'].' '.$res[0]['address_House_No'].' '.$res[0]['address_Street_Name'].' '.$res[0]['address_Subdivision'];
                    $offender_gender = $res[0]['gender_Name'];
                }
            }
        }
        $complainant = $systems->getComplainant($_GET['edit'],true);
        $name = "";
        $gender = "";
        $phone_number = "";
        $address = "";
        $complainantType = "";
        if($complainant){
            while($compl = mysqli_fetch_array($complainant)){
                $complainantType = $compl['complainantType_ID'];
                if($compl['complainantType_ID'] == 2){    
                    $name = $compl['name'];
                    $gender = $compl['gender'];
                    if($compl['phone_number'] != NULL || $compl['phone_number'] !== "" ){
                        $phone_number = $compl['phone_number'];
                    }else{
                        $phone_number = 'N/A';
                    }
                    $address = $compl['address'];
                }else{
                    $res2 = $systems->getResidentDetails($compl['res_ID']);
                    // var_dump($res2);
                    $name = $res2[0]['res_lName'].' '.$res2[0]['res_fName'].','.$res2[0]['res_mName'].','.$res2[0]['suffix'];
                    $address = $res2[0]['address_Unit_Room_Floor_num'].' '. $res2[0]['address_BuildingName'].' '. $res2[0]['address_Lot_No'].' '.$res2[0]['address_Block_No'].' '.$res2[0]['address_House_No'].' '.$res2[0]['address_Street_Name'].' '.$res2[0]['address_Subdivision'];
                    $gender = $res2[0]['gender_Name'];
                    
                    if($res2[0]['contact_telnum'] != NULL || $res2[0]['contact_telnum'] !== "" ){
                        $phone_number = $res2[0]['contact_telnum'];
                    }else{
                        $phone_number = 'N/A';
                    }
                }
            }
        }
    }else{
        
    }
?>
<div id="residentList" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Select Reporting Person</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                        <table class="table table-hover" id="resident_table">
                            <thead>
                                <tr>
                                    <th scope="col">Resident ID.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Birthday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $systems->getResidentList();
                                    if($results){
                                        while($row = mysqli_fetch_assoc($results)){
                                            $birth_date = date('d/m/Y', strtotime($row['res_Bday']));
                                            echo    '<tr resident-id="'.$row['res_ID'].'">
                                                        <td>#'.$row['res_ID'].'</td>
                                                      
                                                        <td>'.$row['res_lName'].' '.$row['res_fName'].', '.$row['res_mName'].''.$row['suffix'].'</td>
                                                        <td>'.$birth_date.'</td>
                                                    </tr>
                                                    ';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>     
    </div>
  </div>
</div>

<div id="residentListOffender" class="modal fade bd-example-modal-lg">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Select Offender</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                        <table class="table table-hover" id="resident_table_offender">
                            <thead>
                                <tr>
                                    <th scope="col">Resident ID.</th>                                   
                                    <th scope="col">Name</th>
                                    <th scope="col">Birthday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $results = $systems->getResidentList();
                                    if($results){
                                        while($row = mysqli_fetch_assoc($results)){
                                            $birth_date = date('d/m/Y', strtotime($row['res_Bday']));
                                            echo    '<tr resident-id="'.$row['res_ID'].'">
                                                        <td>#'.$row['res_ID'].'</td>
                                                       
                                                        <td>'.$row['res_lName'].' '.$row['res_fName'].', '.$row['res_mName'].''.$row['suffix'].'</td>
                                                        <td>'.$birth_date.'</td>
                                                    </tr>
                                                    ';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>     
    </div>
  </div>
</div>


<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
        <h4 class="text-uppercase">Peace and Order</h4>    
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="validateForm" action="" name="" >
                        <div class="card-header"><b>Update Incident Reported</b></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>
                                        Reporting Person/Complainant
                                        <a href="" data-toggle="modal" data-target="#residentList">                    
                                            <span id="show-resident" class="float-right text-danger">
                                                Show Resident List&nbsp&nbsp&nbsp<i class="ti-arrow-circle-down"></i>
                                            </span>
                                        </a>
                                    </h6>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Blotter Type</label>
                                        <select class="form-control" name="blotter_type">
                                            <option value="1" <?php echo $blotterType == 1?"select":"" ?>>Complaint</option>
                                            <option value="2"  <?php echo $blotterType == 2?"select":"" ?>>Incident</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complainant Type</label>
                                        <select class="form-control" id="complainanttype">
                                            <option value="resident">Resident</option>
                                            <option value="outsider">Non Resident</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="residentId" value="">
                                        <input type="hidden" name="residentIdOffender" value="">
                                        
                                        <!-- 2 = outsider (default) -->
                                        <!-- 1 = resident of barangay -->
                                        <input type="hidden" name="complainantType" value="<?php echo $complainantType ?>">
                                        <input type="hidden" name="complainantTypeOffender" value="<?php echo $off_complainantType?>">
                                        <input type="text" value="<?php echo $name?>" class="form-control" name="name" id="fullName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male" <?php echo $gender === 'Male' || $gender === 'male'?"selected":""?> >Male</option>
                                            <option value="female" <?php echo $gender === 'Female'  || $gender === 'female'?"selected":""?> >Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" value="<?php echo $phone_number ?>" class="form-control" name="contact_number" id="contactNumber">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="text" value="<?php echo $birth_date?>" class="form-control" name="birthday"  id="birthday">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" value="<?php echo $address?>" class="form-control" name="address" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12">
                                    <h6 style="margin-top:30px;">Offenders
                                        <a href="" data-toggle="modal" data-target="#residentListOffender">                    
                                            <span id="show-off-resident" class="float-right text-danger">
                                                Show Resident List&nbsp&nbsp&nbsp<i class="ti-arrow-circle-down"></i>
                                            </span>
                                        </a>
                                        </h6>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offender Type</label>
                                        <select class="form-control" id="offendertype">
                                            <option value="resident">Resident</option>
                                            <option value="outsider">Non Resident</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="<?php echo $offender_name?>" class="form-control" name="offender_name" id="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="offender_gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male" <?php echo $offender_gender === 'male' || $offender_gender === 'Male'?"selected":""?> >Male</option>
                                            <option value="female" <?php echo $offender_gender === 'female' || $offender_gender === 'Female'?"selected":""?> >Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" value="<?php echo $offender_address?>" class="form-control" name="offender_address" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea style="height:150px!important;" class="form-control" name="offender_description" id=""><?php echo $description?></textarea>
                                    </div>       
                                </div>

                                <div class="col-md-12">
                                    <h6 style="margin-top:30px;">Incident Reported</h6>
                                    <hr>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                        <label>Case</label>
                                        <div class="">
                                            <label class="radio-inline"><input <?php echo $incident_type === 'criminal'?'checked':'' ?> type="radio" value="criminal" name="optradio">&nbsp;Criminal&nbsp;&nbsp;&nbsp;</label>
                                            <label class="radio-inline"><input  <?php echo $incident_type === 'civil'?'checked':'' ?> type="radio" value="civil" name="optradio">&nbsp;Civil&nbsp;&nbsp;&nbsp;</label>
                                            <label class="radio-inline"><input  <?php echo $incident_type !== 'civil' && $incident_type !== 'criminal'?'checked':'' ?> type="radio" name="optradio" id="other_case" value="other">&nbsp;Others&nbsp;&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control" name="case" id="case_input" style="<?php echo $incident_type !== 'civil' && $incident_type !== 'criminal'?'display:block':'display:none';?>" value="<?php echo $incident_type ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <div class="form-group">
                                        <label>Incident title</label>
                                        <input type="text" class="form-control" value="<?php echo $incident_title?>" name="incident_title" id="">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" <?php echo $status === '1'? "selected":"";?> >Mediated 4a</option>
                                            <option value="2"  <?php echo $status === '2'? "selected":"";?> >Concialited 4b</option>
                                            <option value="3" <?php echo $status === '3'? "selected":"";?> >Arbitrated 4a</option>
                                            <option value="4" <?php echo $status === '4'? "selected":"";?> >Arbitrated 4b</option>
                                            <option value="5"  <?php echo $status === '5'? "selected":"";?> >Dismiss 4c</option>
                                            <option value="6"  <?php echo $status === '6'? "selected":"";?> >Certified case 4d</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Date of Incident</label>
                                        <input type="text" value="<?php echo $date?>" class="form-control" name="date" id="incidentDate">
                                    </div>       
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Time of Incident</label>
                                        <input type="text" value="<?php echo $time?>" class="form-control" name="time" id="incidentTime">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Location of Incident</label>
                                        <input type="text" value="<?php echo $location?>" class="form-control" name="incident_location" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Narrative</label>
                                        <textarea style="height:250px!important;" class="form-control" name="narrative" id=""><?php echo $narrative?></textarea>
                                    </div>       
                                </div>
                            </div>  
                        </div>
                        <div class="card-footer clearfix">      
                            <button type="submit" name="save" data-id="<?php echo $_GET['edit']?>" class="btn btn-primary float-right" value="update">Save</button> 
                            <a href="incident.php">Back</button>              
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php include('inc/footer.php');?>