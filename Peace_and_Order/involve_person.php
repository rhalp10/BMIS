<?php include('inc/header.php'); include_once('lib/init.php')?>

<?php
if(isset($_GET['case']) && $_GET['case'] !== ""){
    $data_offender ='';
    $data_reporting_person = '';
    $results = $systems->getData($_GET['case']);
    if($results){
        while($row = mysqli_fetch_array($results)){
            // var_dump($row);
            $case_no = $row['incident_id'];
            $case_incident = $row['case_incident'];
            $incident_title = $row['incident_title'];
            $time = $row['time_incident'];
            $date = $row['date_incident'];
            $date_reported = $row['date_reported'];
        } 
    }
    $offender = $systems->getOffender($_GET['case']);
    $offender_name = "";
    $offender_address = "";
    $offender_gender = "";
    $description = "";
    $off_complainantType = "";
    if($offender){
        while($off = mysqli_fetch_array($offender)){
            $description = $off['description'];
            $off_id =  $off['offender_id'];
            
            if($off['off_complainantType'] == 2){    
                $offender_name = $off['offender_name'];
                $offender_address = $off['offender_address'];
                $offender_gender = $off['offender_gender'];
            }else{
                $res = $systems->getResidentDetails($off['off_res_ID']);
                // var_dump($res); 
                $offender_name = $res[0]['res_lName'].' '.$res[0]['res_fName'].','.$res[0]['res_mName'].','.$res[0]['suffix'];
                //$offender_address = $res[0]['address_Unit_Room_Floor_num'].' '. $res[0]['address_BuildingName'].' '. $res[0]['address_Lot_No'].' '.$res[0]['address_Block_No'].' '.$res[0]['address_House_No'].' '.$res[0]['address_Street_Name'].' '.$res[0]['address_Subdivision'];
                $offender_gender = $res[0]['gender_Name'];
            }

            $data_offender .= "<tr>
                <tr> 
                    <td>
                        $offender_name
                    </td>
                    <td>
                        $offender_gender
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        Offender
                    </td>
                    <td>
                        <a href='edit_person.php?id=$off_id&case=$case_no&person_type=offender' class=\"btn btn-sm btn-warning\">Edit details</a>
                        <a href='remove_person.php?id=$off_id&case=$case_no&person_type=offender' class=\"btn btn-sm btn-danger\">Remove</a>
                    </td>
                </tr>";
        }
    }
    $complainant = $systems->getComplainant($_GET['case']);
        $name = "";
        $gender = "";
        $phone_number = "";
        $address = "";
        $complainantType = "";
    if($complainant){
        while($compl = mysqli_fetch_array($complainant)){

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
                $res2 = $systems->getResidentDetails($compl['res_ID']);
                // var_dump($res2);
                $name = $res2[0]['res_lName'].' '.$res2[0]['res_fName'].','.$res2[0]['res_mName'].','.$res2[0]['suffix'];
                //$address = $res2[0]['address_Unit_Room_Floor_num'].' '. $res2[0]['address_BuildingName'].' '. $res2[0]['address_Lot_No'].' '.$res2[0]['address_Block_No'].' '.$res2[0]['address_House_No'].' '.$res2[0]['address_Street_Name'].' '.$res2[0]['address_Subdivision'];
                $gender = $res2[0]['gender_Name'];
                
                // if($res2[0]['res_contact_no'] != NULL || $res2[0]['res_contact_no'] !== "" ){
                //     $phone_number = $res2[0]['res_contact_no'];
                // }else{
                //     $phone_number = 'N/A';
                // }
            }

                $data_reporting_person.="<tr> 
                                            <td>
                                            $name
                                            </td>
                                            <td>
                                            $gender
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                Complainant
                                            </td>
                                            <td>
                                                <a href='edit_person.php?id=$comp_id&case=$case_no&person_type=complainant' class=\"btn btn-sm btn-warning\">Edit details</a>
                                                <a href='remove_person.php?id=$comp_id&case=$case_no&person_type=complainant' class=\"btn btn-sm btn-danger\">Remove</a>
                                            </td>
                                        </tr>";
        }
    }
}else{
    header("Location: 404.html");   
}
?>


<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
  <h5>PEACE & ORDER (Involve Persons) <a class="btn btn-primary btn-sm float-right" href="Incident.php">Back</a></h5>     
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>List of person involve</b>                            
                    </div>
                    <form id="newPersonInvolve" action="" name="" >
                        <div class="card-body">
                            <div class="row">
                                <div class="complainant_form col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label>Case</label>
                                                <input type="text" value="<?php echo $case_incident ?>"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="form-group">
                                                <label>Incident title</label>
                                                <input  value="<?php echo $incident_title ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Date of Incident</label>
                                                <input value="<?php echo $date ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Time of Incident</label>
                                                <input  value="<?php echo $time ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <br>
                                                <label>List</label>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <table id="personInvolve">
                                                <thead>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>Gender</td>
                                                        <td>Address</td>
                                                        <td>Involve Person Type</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $data_offender ?>
                                                    <?php echo $data_reporting_person ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer clearfix">      
                             <a href="incident.php">Back</button>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php include('inc/footer.php');?>