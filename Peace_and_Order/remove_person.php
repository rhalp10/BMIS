<?php

include_once('lib/init.php');
if(isset($_GET['id']) && $_GET['id'] != "" ){

    $person_type = $_GET['person_type'];
    $id = $_GET['id'];
    $db = new database();
    if($person_type == 'complainant'){
        $query = "Delete from ms_reporting_person where person_id = $id";
    }elseif($person_type == 'offender'){
        $query = "Delete from ms_incident_offender where offender_id = $id";
    }
    $db->delete($query);

    echo "<script>alert('Data deleted successfully!')</script>";
    header('Location: incident.php');
}

?>