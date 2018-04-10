<?php include_once('lib/init.php');


if(isset($_GET['print']) && $_GET['print'] !== ""){
    $data_offender ='';
    $data_reporting_person = '';
    $results = $systems->getData($_GET['print']);
    if($results){
        while($row = mysqli_fetch_array($results)){
            // var_dump($row);
            $case_no = $row['incident_id'];
        
            $incident_title = $row['incident_title'];
            $time = $row['time_incident'];
            $date = $row['date_incident'];
            $date_reported = $row['date_reported'];
            $location = $row['location'];
            $narrative = $row['narrative'];
            $status = $row['status'];
        } 
    }
    $offender = $systems->getOffender($_GET['print']);
    if($offender){
        while($off = mysqli_fetch_array($offender)){
            
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

            $data_offender .= "<table>
                <tr> 
                    <td colspan=\"2\">
                        <h3>Offender</h3>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <label>Name :</label>
                    </td>
                    <td>
                        $offender_name
                    </td>
                </tr>
                <tr> 
                    <td>
                        <label>Gender :</label>
                    </td>
                    <td>
                    $offender_gender
                    </td>
                </tr>
                <tr> 
                    <td>
                        <label>Address :</label>
                    </td>
                    <td>
                    $offender_address
                    </td>
                </tr>
                <tr> 
                    <td>
                        <label>Description :</label>
                    </td>
                    <td>
                    $description
                    </td>
                </tr>
            </table>";
        }
    }

    $complainant = $systems->getComplainant($_GET['print']);
    if($complainant){
        while($compl = mysqli_fetch_array($complainant)){
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
                
            }

                $data_reporting_person .= "<table>
                                        <tr> 
                                            <td colspan=\"2\">
                                                <h3>Reporting Person</h3>
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td>
                                                <label>Name :</label>
                                            </td>
                                            <td>
                                            $name
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td>
                                                <label>Gender :</label>
                                            </td>
                                            <td>
                                            $gender
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td>
                                                <label>Phone Number :</label>
                                            </td>
                                            <td>
                                            N/A
                                            </td>
                                        </tr>
                                        <tr> 
                                            <td>
                                                <label>Address :</label>
                                            </td>
                                            <td>
                                                $address
                                            </td>
                                        </tr>
                                    </table>";
        }
    }

}else{
    header("Location: 404.html");   
}

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$print = new Dompdf();

$layout="
            <style>
                .text-center{
                    text-align: center;
                }
                .pull-right{
                    float: right;
                }
                .pull-left{
                    float: left;
                }
                .text-left{
                    text-align: left;
                }
                .text-right{
                    text-align: right;
                }
                .text-uppercase{
                    text-transform: uppercase;
                }
                .heading{
                    margin-top: 50px;
                    width: 100%;
                }
                .heading span{
                    display: block;
                    width: 100%;
                }
                .heading-logo .left-img{
                    width: 100px;
                    height: 100px;
                    position: absolute;
                    left: 90px;
                    top: 15px;
                }
                .heading-logo .right-img{
                    width: 100px;
                    height: 100px;
                    position: absolute;
                    right: 90px;
                    top: 15px;
                }
                .heading h2{
                    margin: 60px 0px;
                    letter-spacing: 2px;
                }
                .incident-primary-info span{
                    font-size: 16px;
                    line-height: 24px;
                    font-weight: bold;
                }
                .narative p{
                    font-size: 18px;
                    line-height: 22px;
                    text-indent: 40px;
                }
                .doc-signatures{
                    margin-top: 50px;
                }
                .doc-signatures span{
                    width: 180px;
                    display: block;
                    line-height: 24px;
                    border-top: 1px solid;
                }
                .barangay-cap-sign{
                    margin-left: 300px;
                }
                .barangay-cap-sign span{
                    border-bottom: 0px!important;
                }

            </style>
            
            <div class=\"heading-logo\">
                <img class=\"left-img\" src=\"assets/images/indang_logo.png\">
                <img class=\"right-img\" src=\"assets/images/29243885_2343924225633094_5248052214366208000_n.png\">
            </div>
            <div class=\"heading text-center\">
                <span>Republic of the Philippines</span>
                <span class=\"text-uppercase\">Case Incident Report</span>
                <i>Indang Cavite</i>
                <h2>CERTIFICATE</h2>
            </div>
            <div class=\"incident-print-body\">
                <div class=\"incident-primary-info\">
                    <span class=\"text-uppercase\">FOR RECORD :</span> $incident_title <br>
                    <span class=\"\">Entry No.</span> $case_no <br>
                    <span class=\"\">Location :</span> $location <br>
                    <span>Date/Time Reported :</span> $date_reported  <br>
                </div>

                <hr>
                    $data_reporting_person
                <hr>
                    $data_offender
                <hr>
                <div class=\"narative\">
                    <h3 class=\"text-uppercase\">Narrative :</h3>
                    <p>$narrative</p>
                </div>
                <div class=\"doc-signatures\">
                    <table>
                        <tr>
                            <td>
                                <div class=\"text-center prepared-by\">
                                    <span>Prepared By</span>
                                </div>
                            </td>
                            <td>
                                <div class=\"text-center barangay-cap-sign\">
                                    <span>Barangay Captain<span>
                                </div>
                            </td>
                        </tr>

                        
                </div>
            </div>
            ";

$print->loadHtml($layout);
$print->setPaper('A4', 'portrait');
$print->render();
$print->stream("incident_case_no.'$case_no'");

?>