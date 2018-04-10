<?php

require_once('class.database.php');
require_once('class.function.php');

if(isset($_POST['function'])){
    switch ($_POST['function']) {
        case 'checkPerson':
                $systems = new allfunctions();
                $data = array(
                        'case_id' => $_POST['case_id'],
                        'resident_id' => $_POST['resident_id'],
                );
                $systems->checkPerson($data);
                break;
        case 'insertIncident':
                $systems = new allfunctions();
                $data = array(
                        'blotter_type' => $_POST['blotter_type'],
                        'resident_id' => $_POST['resident_id'],
                        'resident_idOffender' => $_POST['resident_idOffender'],
                        'complianantType' => $_POST['complianantType'],
                        'complianantTypeOffender'=> $_POST['complianantOffender'],

                        'name' => $_POST['name'], 
                        'contact_number' => $_POST['contact_number'],
                        'gender' => $_POST['gender'],
                        'birthday' => $_POST['birthday'],
                        'address' => $_POST['address'],
                        'offender_name' => $_POST['offender_name'],
                        'offender_gender' => $_POST['offender_gender'],
                        'offender_address' => $_POST['offender_address'],
                        'offender_description' => $_POST['offender_description'],
                        'incident_title' => $_POST['incident_title'],
                        'incident_type' => $_POST['incident_type'],
                        'date' => $_POST['date'],
                        'time' => $_POST['time'],
                        'incident_location' => $_POST['incident_location'],
                        'narrative' => $_POST['narrative'],
                );
                $systems->insertIncident($data);
            break;
        case 'incidentReport':
                // print json_encode('Hello World!');
                $systems = new allfunctions();
                $systems->getIncidentReport();
            break;
        case 'getResidentDetails':
                $db = new database();
                $systems = new allfunctions();
                $result = $systems->getResidentDetails($_POST['resident_id']);
                print json_encode($result);
            break;
        case 'getViolation':
                $systems = new allfunctions();
                $systems->getViolation();
            break;
        case 'addOffender':
                $systems = new allfunctions();
                $data = array(
                        'case_id' => $_POST['case_id'],
                        'resident_idOffender' => $_POST['resident_idOffender'],
                        'complianantTypeOffender'=> $_POST['complianantOffender'],
                        'offender_name' => $_POST['offender_name'],
                        'offender_gender' => $_POST['offender_gender'],
                        'offender_address' => $_POST['offender_address'],
                        'offender_description' => $_POST['offender_description'],
                );
                $systems->addOffender($data);
                break;
        case 'addComplainant':
                $systems = new allfunctions();
                $db = new database();

                $data = array(
                        'case_id' => $_POST['case_id'],
                        'resident_id' => $_POST['resident_id'],
                        'complianantType' => $_POST['complianantType'],                        
                        'name' => $_POST['name'], 
                        'contact_number' => $_POST['contact_number'],
                        'gender' => $_POST['gender'],
                        'birthday' => $_POST['birthday'],
                        'address' => $_POST['address'],
                );
                $systems->addComplainant($data);
                break;
        case 'updateOffender':
                $systems = new allfunctions();
                $data = array(
                        'id' => $_POST['offender_id'],
                        'case_id' => $_POST['case_id'],
                        'resident_idOffender' => $_POST['resident_idOffender'],
                        'complianantTypeOffender'=> $_POST['complianantOffender'],
                        'offender_name' => $_POST['offender_name'],
                        'offender_gender' => $_POST['offender_gender'],
                        'offender_address' => $_POST['offender_address'],
                        'offender_description' => $_POST['offender_description'],
                );
                $systems->updateOffender($data);
                break;
        case 'updateComplainant':
                $systems = new allfunctions();
                $db = new database();

                $data = array(
                        'id' => $_POST['person_id'],
                        'case_id' => $_POST['case_id'],
                        'resident_id' => $_POST['resident_id'],
                        'complianantType' => $_POST['complianantType'],                        
                        'name' => $_POST['name'], 
                        'contact_number' => $_POST['contact_number'],
                        'gender' => $_POST['gender'],
                        'birthday' => $_POST['birthday'],
                        'address' => $_POST['address'],
                );
                $systems->updateComplainant($data);
                break;
        case 'updateIncident':
                $systems = new allfunctions();
                $db = new database();

                $data = array(
                    'blotter_type' => $_POST['blotter_type'],
                    'resident_id' => $_POST['resident_id'],
                        'resident_idOffender' => $_POST['resident_idOffender'],
                        'complianantType' => $_POST['complianantType'],
                        'complianantTypeOffender'=> $_POST['complianantOffender'],
                        
                        'name' => $_POST['name'], 
                        'contact_number' => $_POST['contact_number'],
                        'gender' => $_POST['gender'],
                        'birthday' => $_POST['birthday'],
                        'address' => $_POST['address'],
                        'offender_name' => $_POST['offender_name'],
                        'offender_gender' => $_POST['offender_gender'],
                        'offender_address' => $_POST['offender_address'],
                        'offender_description' => $_POST['offender_description'],
                        'incident_title' => $_POST['incident_title'],
                        'incident_type' => $_POST['incident_type'],
                        'date' => $_POST['date'],
                        'time' => $_POST['time'],
                        'incident_location' => $_POST['incident_location'],
                        'narrative' => $_POST['narrative'],
                    
                    'id' => $_POST['data_id'],
                    'status' => $_POST['status'],
                );
                $systems->updateIncident($data);
            break;
        default:
            # code...
            break;
    }
}

?>