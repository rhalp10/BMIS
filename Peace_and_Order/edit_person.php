<?php

include('inc/header.php'); 
include_once('lib/init.php');

if(isset($_GET['id']) && $_GET['id'] !== ""){
    $data_offender ='';
    $data_reporting_person = '';

    $person_type = $_GET['person_type'];
    if($person_type == 'complainant'){
        $complainant = $systems->getComplainantDetails($_GET['id']);
        if($complainant){
            while($compl = mysqli_fetch_array($complainant)){
        
                $complainant_type = $compl['complainantType_ID'];

                $comp_id = $compl['person_id'];
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
                    $resident_id = $compl['res_ID'];
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
    }elseif($person_type == 'offender'){

        $offender = $systems->getOffenderDetails($_GET['id']);
        if($offender){
            while($off = mysqli_fetch_array($offender)){
                
                $description = $off['description'];
                $off_id =  $off['offender_id'];
                $offender_type = $off['off_complainantType'];

                if($off['off_complainantType'] == 2){    
                    $offender_name = $off['offender_name'];
                    $offender_address = $off['offender_address'];
                    $offender_gender = $off['offender_gender'];
                }else{
                    $resident_id = $off['off_res_ID'];
                    $res = $systems->getResidentDetails($off['off_res_ID']);
                    // var_dump($res); 
                    $offender_name = $res[0]['res_lName'].' '.$res[0]['res_fName'].','.$res[0]['res_mName'].','.$res[0]['suffix'];
                    $offender_address = $res[0]['address_Unit_Room_Floor_num'].' '. $res[0]['address_BuildingName'].' '. $res[0]['address_Lot_No'].' '.$res[0]['address_Block_No'].' '.$res[0]['address_House_No'].' '.$res[0]['address_Street_Name'].' '.$res[0]['address_Subdivision'];
                    $offender_gender = $res[0]['gender_Name'];
                }
            }
        }
    }else{
        header("Location: 404.html");   
    }

}else{
    header("Location: 404.html");   
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
                                            $birth_date = date('F d, Y', strtotime($row['res_Bday']));
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
                                            $birth_date = date('F d, Y', strtotime($row['res_Bday']));
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

        </div>     
    </div>
  </div>
</div>


<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
  <h5>PEACE & ORDER (Update Involve Person) <a class="btn btn-primary btn-sm float-right" href="Incident.php">Back</a></h5>     
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Update Person Involve</b>                            
                    </div>
                    <form id="updatePersonInvolve" action="" name="" >
                        <div class="card-body">
                            <div class="row">
                                    <input type="hidden" id="involvepersontype" value="<?php echo $person_type ?>">
                            <?php
                                if($person_type === 'complainant'){
                            ?>
                                <div class="complainant_form col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>
                                                Reporting Person/Complainant
                                                
                                                <a href="" data-toggle="modal" data-target="#residentList">                    
                                                    <span id="show-resident" class="float-right text-danger"  <?php if($complainant_type == 2){ echo 'style="display:none"'; }?> >
                                                        Show Resident List&nbsp&nbsp&nbsp<i class="ti-arrow-circle-down"></i>
                                                    </span>
                                                </a>
                                                
                                            </h6>
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Complainant Type</label>
                                                <select class="form-control" id="complainanttype">
                                                    <option <?php echo ($complainant_type == 1)?'selected':'' ?> value="resident">Resident</option>
                                                    <option <?php echo ($complainant_type == 2)?'selected':'' ?> value="outsider">Non Resident</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="hidden" name="case_id" value="<?php echo $_GET['case']; ?>">
                                                <input type="hidden" name="residentId" value="<?php echo $resident_id ?>">
                                                <input type="hidden" name="person_id" value="<?php echo $_GET['id']; ?>">
                                                <!-- 2 = outsider (default) -->
                                                <!-- 1 = resident of barangay -->
                                                <input type="hidden" name="complainantType" value="<?php echo $complainant_type ?>">
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
                                                <input type="text"  value="<?php echo $phone_number ?>" class="form-control" name="contact_number" id="contactNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="text" value="<?php echo $birth_date?>"  class="form-control" name="birthday" id="birthday">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text"  value="<?php echo $address?>"  class="form-control" name="address" id="">
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }elseif($person_type === 'offender'){
                            ?>
                                <!-- offender -->
                                <div class="offender_form col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 style="margin-top:30px;">
                                                Offenders
                                                
                                                <a href="" data-toggle="modal" data-target="#residentListOffender">                    
                                                    <span id="show-off-resident" class="float-right text-danger"   <?php if($offender_type == 2){ echo 'style="display:none"'; }?>>
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
                                                    <option <?php echo ($offender_type == 1)?'selected':'' ?> value="resident">Resident</option>
                                                    <option <?php echo ($offender_type == 2)?'selected':'' ?>  value="outsider">Non Resident</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                
                                                <input type="hidden" name="case_id" value="<?php echo $_GET['case']; ?>">
                                                <input type="hidden" name="residentIdOffender" value="<?php echo $resident_id ?>">               
                                                <input type="hidden" name="offender_id" value="<?php echo $_GET['id']; ?>">
                                                <input type="hidden" name="complainantTypeOffender" value="<?php echo $offender_type?>">
                                                <input type="text" class="form-control" name="offender_name"  value="<?php echo $offender_name?>">
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
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                                
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