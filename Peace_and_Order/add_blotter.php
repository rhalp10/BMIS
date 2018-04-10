<?php include('inc/header.php'); include_once('lib/init.php')?>





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
											if($row['suffix']=="N/A")
												$suffix="";
											else
												$suffix=$row['suffix'];
                                            $birth_date = date('F d, Y', strtotime($row['res_Bday']));
                                            echo    '<tr resident-id="'.$row['res_ID'].'">
                                                        <td>#'.$row['res_ID'].'</td>
                                                        <td>'.$row['res_lName'].' '.$row['res_fName'].', '.$row['res_mName'].' '.$suffix.'</td>
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
											if($row['suffix']=="N/A")
												$suffix="";
											else
												$suffix=$row['suffix'];
                                            $birth_date = date('F d, Y', strtotime($row['res_Bday']));
                                            echo    '<tr resident-id="'.$row['res_ID'].'">
                                                        <td>#'.$row['res_ID'].'</td>
                                                        <td>'.$row['res_lName'].' '.$row['res_fName'].', '.$row['res_mName'].' '.$suffix.'</td>
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

        </div>     
    </div>
  </div>
</div>


<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
  <h5>PEACE & ORDER (Add Incident) <a class="btn btn-primary btn-sm float-right" href="Incident.php">Back</a></h5>     
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>New Incident Reported</b>                            
                    </div>
                    <form id="validateForm" action="" name="" >
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
                                            <option value="1">Complaint</option>
                                            <option value="2">Incident</option>
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
                                        <!-- 2 = outsider (default) -->
                                        <!-- 1 = resident of barangay -->
                                        <input type="hidden" name="complainantType" value="2">
                                        <input type="hidden" name="case_id" value="0">

                                        <input type="text" class="form-control" name="name" id="fullName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="contact_number" id="contactNumber">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="text" class="form-control" name="birthday" id="birthday">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="">
                                    </div>       
                                </div>

                                <!-- offender -->
                                <div class="col-md-12">
                                    <h6 style="margin-top:30px;">
                                        Offenders
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
                                        <input type="hidden" name="residentIdOffender" value="">                                        
                                        <input type="hidden" name="complainantTypeOffender" value="2">
                                        <input type="text" class="form-control" name="offender_name" id="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="offender_gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="offender_address" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea style="height:150px!important;" class="form-control" name="offender_description" id=""></textarea>
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
                                            <label class="radio-inline"><input type="radio" value="criminal" name="optradio">&nbsp;Criminal&nbsp;&nbsp;&nbsp;</label>
                                            <label class="radio-inline"><input type="radio" value="civil" name="optradio">&nbsp;Civil&nbsp;&nbsp;&nbsp;</label>
                                            <label class="radio-inline"><input type="radio" name="optradio" id="other_case" value="other">&nbsp;Others&nbsp;&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control" name="case" id="case_input" style="display:none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Incident title</label>
                                        <input type="text" class="form-control" name="incident_title" id="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Date of Incident</label>
                                        <input type="text" class="form-control" id="incidentDate"  name="date">
                                    </div>       
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Time of Incident</label>
                                        <input type="text" class="form-control" name="time" id="incidentTime">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Location of Incident</label>
                                        <input type="text" class="form-control" name="incident_location" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Narrative</label>
                                        <textarea style="height:250px!important;" class="form-control" name="narrative" id=""></textarea>
                                    </div>       
                                </div>
                            </div>  
                        </div>
                        <div class="card-footer clearfix">      
                            <button type="submit" name="save" value="insert" class="btn btn-primary float-right">Submit</button>
                             <a href="incident.php">Back</button>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php include('inc/footer.php');?>