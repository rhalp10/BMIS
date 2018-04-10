<?php
class allfunctions extends database{

    protected $db; 

    public function __construct(){
        $this->db = new database();

    }

    public function getIncidentList(){
        $query = 'SELECT * from ms_incident as mi';
        $query .= ' LEFT JOIN ms_reporting_person as rp on rp.incident_id = mi.incident_id group by mi.incident_id';
        // var_dump($query);
        $incidents = $this->db->select($query);
        return $incidents;
    }

    public function getResidentList(){
        $query = 'SELECT * from resident_detail left join ref_suffixname on ref_suffixname.suffix_ID = resident_detail.suffix_ID';
        // var_dump($query);
        $residents = $this->db->select($query);
        return $residents;
    }
	
	public function getResidentList2($case){
        $query = 'SELECT * from resident_detail left join ref_suffixname on ref_suffixname.suffix_ID = resident_detail.suffix_ID WHERE res_ID NOT IN (SELECT res_ID FROM ms_reporting_person WHERE incident_id="'.$case.'" AND res_ID!="")';
        // var_dump($query);
        $residents = $this->db->select($query);
        return $residents;
    }

    public function getResidentDetails($id){
        $query = 'SELECT  address_Unit_Room_Floor_num ,res_lName, res_fName, res_mName, ref_suffixname.suffix, ref_gender.gender_Name, res_Bday, resident_address.address_BuildingName, resident_address.address_Street_Name, resident_address.address_Unit_Room_Floor_num, resident_address.address_Lot_No, resident_address.address_Block_No, resident_address.address_House_No, resident_address.address_Phase_No, resident_address.address_Subdivision, resident_contact.contact_telnum from resident_detail left join ref_suffixname on ref_suffixname.suffix_ID = resident_detail.suffix_ID left join resident_address on resident_address.res_ID = resident_detail.res_ID left join ref_gender on ref_gender.gender_ID = resident_detail.gender_ID left join resident_contact ON resident_contact.res_ID=resident_detail.res_ID where resident_detail.res_ID = '.$id.'';
        $residentsDetails = $this->db->rawData($query);

        // var_dump($residentsDetails);
        return $residentsDetails;
    }

    public function insertIncident($data){
        $dateNow = date('Y-m-d h:i:s');

        $query = 'INSERT into ms_incident (blotterType_id,date_incident, case_incident, time_incident, location,  narrative, incident_title, date_reported) values ("'.$data['blotter_type'].'","'.$data['date'].'","'.$data['incident_type'].'","'.$data['time'].'","'.$data['incident_location'].'","'.$data['narrative'].'","'.$data['incident_title'].'","'.$dateNow.'")';
        $last_insert_id = $this->db->insert($query);

        if($data['complianantTypeOffender'] == 1){
            $query2 = 'INSERT into ms_incident_offender (incident_id, res_ID, description, complainantType_ID) values ("'.$last_insert_id.'","'.$data['resident_idOffender'].'","'.$data['offender_description'].'" ,"'.$data['complianantTypeOffender'].'")';
        }
        else{
            $query2 = 'INSERT into ms_incident_offender (incident_id, offender_name, offender_gender,offender_address, description, complainantType_ID) values ("'.$last_insert_id.'","'.$data['offender_name'].'","'.$data['offender_gender'].'","'.$data['offender_address'].'","'.$data['offender_description'].'","'.$data['complianantTypeOffender'].'")';
        }

        if($data['complianantType'] == 1){
            $query3 = 'INSERT into ms_reporting_person (incident_id, res_ID, complainantType_ID) values ("'.$last_insert_id.'","'.$data['resident_id'].'","'.$data['complianantType'].'")';
        }else{
            $query3 = 'INSERT into ms_reporting_person (incident_id, name, gender, phone_number, address, complainantType_ID) values ("'.$last_insert_id.'","'.$data['name'].'","'.$data['gender'].'","'.$data['contact_number'].'","'.$data['address'].'","'.$data['complianantType'].'")';
        }
        $this->db->insert($query2);
        $this->db->insert($query3);      
        print json_encode('success');
    }

    public function addComplainant($data){
        if($data['complianantType'] == 1){
            $query = 'INSERT into ms_reporting_person (incident_id, res_ID, complainantType_ID) values ("'.$data['case_id'].'","'.$data['resident_id'].'","'.$data['complianantType'].'")';
        }else{
            $query = 'INSERT into ms_reporting_person (incident_id, name, gender, phone_number, address, complainantType_ID) values ("'.$data['case_id'].'","'.$data['name'].'","'.$data['gender'].'","'.$data['contact_number'].'","'.$data['address'].'","'.$data['complianantType'].'")';
        } 
        $this->db->insert($query);     
        print json_encode('success');       
    }

    public function addOffender($data){
        if($data['complianantTypeOffender'] == 1){
            $query = 'INSERT into ms_incident_offender (incident_id, res_ID, description, complainantType_ID) values ("'.$data['case_id'].'","'.$data['resident_idOffender'].'","'.$data['offender_description'].'" ,"'.$data['complianantTypeOffender'].'")';
        }
        else{
            $query = 'INSERT into ms_incident_offender (incident_id, offender_name, offender_gender,offender_address, description, complainantType_ID) values ("'.$data['case_id'].'","'.$data['offender_name'].'","'.$data['offender_gender'].'","'.$data['offender_address'].'","'.$data['offender_description'].'","'.$data['complianantTypeOffender'].'")';
        }
        $this->db->insert($query);     
        print json_encode('success');       

    }

    public function updateComplainant($data){
        if($data['complianantType'] == 2){
            $query = "UPDATE ms_reporting_person SET res_ID = null , name = '".$data['name']."', gender = '".$data['gender']."', phone_number = '".$data['contact_number']."' ,birthday = '".$data['birthday']."', address = '".$data['address']."', complainantType_ID = '".$data['complianantType']."'  WHERE person_id = '".$data['id']."' ";
        }else{
            $query = "UPDATE ms_reporting_person SET name = null, gender = null, phone_number = null ,birthday = null, address = null ,res_ID = '".$data['resident_id']."' , complainantType_ID = '".$data['complianantType']."'  WHERE person_id = '".$data['id']."' ";
        } 

        // var_dump($query);
        $this->db->update($query);     
        print json_encode('success');       
    }

    public function updateOffender($data){
        if($data['complianantTypeOffender'] == 2){
            $query = "UPDATE ms_incident_offender  SET res_ID = null , offender_name = '".$data['offender_name']."', offender_gender = '".$data['offender_gender']."', offender_address = '".$data['offender_address']."', description = '".$data['offender_description']."', complainantType_ID = '".$data['complianantTypeOffender']."'  WHERE offender_id = '".$data['id']."' ";
        }else{
            $query = "UPDATE ms_incident_offender  SET offender_name = null, offender_gender = null, offender_address = null, res_ID = '".$data['resident_idOffender']."', description = '".$data['offender_description']."', complainantType_ID = '".$data['complianantTypeOffender']."'  WHERE offender_id = '".$data['id']."' ";
        }
        $this->db->update($query);    
        print json_encode('success');       

    }

    public function checkPerson($data){
        $query = "SELECT * from ms_incident_offender where incident_id = '".$data['case_id']."' and res_ID =  '".$data['resident_id']."'";        
        $match = $this->db->select($query);
        if($match){
            $row_count = mysqli_num_rows($match);
            if($row_count > 0){
                print json_encode('offender'); 
            }    
        }else{
            $query2 = "SELECT * from ms_reporting_person where incident_id = '".$data['case_id']."' and res_ID =  '".$data['resident_id']."'";        
            $match2 = $this->db->select($query2);
            if($match2){
                $row_count = mysqli_num_rows($match2);
                if($row_count > 0){
                    print json_encode('complainant'); 
                }
            }else{
                print json_encode('no result');
            }
        }

    }




    public function updateIncident($data){
        $dateNow = date('Y-m-d h:i:s');
        $query = "UPDATE ms_incident SET case_incident = '".$data['incident_type']."', blotterType_id = '".$data['blotter_type']."', status = '".$data['status']."', date_incident = '".$data['date']."', time_incident = '".$data['time']."', location = '".$data['incident_location']."',  narrative = '".$data['narrative']."', incident_title = '".$data['incident_title']."', date_reported = '".$dateNow."' WHERE incident_id = '".$data['id']."' ";
        // $query = "UPDATE ms_incident SET date_incident = '".$data['date']."', time_incident = '".$data['time']."', location = '".$data['incident_location']."',  narrative = '".$data['narrative']."', incident_title = '".$data['incident_title']."', date_reported = '".$dateNow."' WHERE incident_id = '".$data['id']."' ";
        $this->db->update($query);
        if($data['complianantTypeOffender'] == 2){
            $query2 = "UPDATE ms_incident_offender  SET res_ID = null ,offender_name = '".$data['offender_name']."', offender_gender = '".$data['offender_gender']."', offender_address = '".$data['offender_address']."', description = '".$data['offender_description']."', complainantType_ID = '".$data['complianantTypeOffender']."'  WHERE incident_id = '".$data['id']."' ";
            $this->db->update($query2);
        }else{
            $query2 = "UPDATE ms_incident_offender  SET offender_name = null, offender_gender = null, offender_address = null, res_ID = '".$data['resident_idOffender']."', description = '".$data['offender_description']."', complainantType_ID = '".$data['complianantTypeOffender']."'  WHERE incident_id = '".$data['id']."' ";
            $this->db->update($query2);
        }

        if($data['complianantType'] == 2){
            $query3 = "UPDATE ms_reporting_person SET res_ID = null , name = '".$data['name']."', gender = '".$data['gender']."', phone_number = '".$data['contact_number']."' ,birthday = '".$data['birthday']."', address = '".$data['address']."', complainantType_ID = '".$data['complianantType']."'  WHERE incident_id = '".$data['id']."' ";
            $this->db->update($query3);
        }else{
            $query3 = "UPDATE ms_reporting_person SET name = null, gender = null, phone_number = null ,birthday = null, address = null ,res_ID = '".$data['resident_id']."' , complainantType_ID = '".$data['complianantType']."'  WHERE incident_id = '".$data['id']."' ";
            $this->db->update($query3);
        }
        print json_encode('success');
    }

    public function getIncidentReport(){
        $query = 'SELECT YEAR(date_reported) as year, count(incident_id) as count from ms_incident GROUP BY YEAR(date_reported)';
        $data_report = $this->db->rawData($query);
        print json_encode($data_report);
    }

    public function getViolation(){
        $query = 'SELECT * from ref_violation';
        $violation = $this->db->rawData($query);
        print json_encode($violation);
    }
     public function getViolationList(){
        $query = 'SELECT * from ref_violation';
        // var_dump($query);
        $residents = $this->db->select($query);
        return $residents;
    }

    public function getData($id){
        // $query = "SELECT ms_incident_offender.res_ID as off_res_ID, ms_incident_offender.offender_name, ms_incident_offender.offender_address, ms_incident_offender.offender_gender, ms_incident_offender.description, ms_incident_offender.complainantType_ID as off_complainantType, ms_incident.*, ms_reporting_person.* from ms_incident LEFT JOIN ms_incident_offender on ms_incident_offender.incident_id = ms_incident.incident_id LEFT JOIN ms_reporting_person on ms_reporting_person.incident_id = ms_incident.incident_id where ms_incident.incident_id = $id";
        $query = 'SELECT ms_incident.* from ms_incident where ms_incident.incident_id = '.$id.' ';
        $incident = $this->db->select($query);
        return $incident;
    }

    public function getOffender($id,$limit = false){
        $query = "SELECT ms_incident_offender.offender_id,ms_incident_offender.res_ID as off_res_ID, ms_incident_offender.offender_name, ms_incident_offender.offender_address, ms_incident_offender.offender_gender, ms_incident_offender.description, ms_incident_offender.complainantType_ID as off_complainantType from ms_incident_offender where incident_id = $id";
        if($limit == true){
            $query .= ' limit 1';
        }
        $incident = $this->db->select($query);
        return $incident;
    }

    public function getOffenderDetails($id,$limit = false){
        $query = "SELECT ms_incident_offender.offender_id,ms_incident_offender.res_ID as off_res_ID, ms_incident_offender.offender_name, ms_incident_offender.offender_address, ms_incident_offender.offender_gender, ms_incident_offender.description, ms_incident_offender.complainantType_ID as off_complainantType from ms_incident_offender where offender_id = $id";
        if($limit == true){
            $query .= ' limit 1';
        }
        // var_dump($query);
        $incident = $this->db->select($query);
        return $incident;
    }

    public function getComplainant($id,$limit = false){
        $query = "SELECT * from ms_reporting_person where incident_id = $id";
        if($limit == true){
            $query .= ' limit 1';
        }
        $incident = $this->db->select($query);
        return $incident;
    }

    public function getComplainantDetails($id,$limit = false){
        $query = "SELECT * from ms_reporting_person where person_id = $id";
        if($limit == true){
            $query .= ' limit 1';
        }
        $incident = $this->db->select($query);
        return $incident;
    }

}


?>