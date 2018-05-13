<?php
	
	$position = $_SESSION['position'];
	$posID = 0;
	if($position == "Barangay Secretary"){
		$posID = 3;
	}else if($position == "Barangay Captain"){
		$posID = 2;
	}else if($position == "Barangay Treasurer"){
		$posID = 4;
	}else if($position == "Barangay Councilor"){
		if($_SESSION['committee'] == "Peace and Order"){
			$posID = 9;
		}else if($_SESSION['committee'] == "Health and Sanitation"){
			$posID = 12;
		}else if($position == "Agriculture"){
			$posID = 11;
		}else if($position == "Infrastructure"){
			$posID = 15;
		}else if($position == "Finance"){
			$posID = 14;
		}else if($position == "Education"){
			$posID = 10	;
		}	
	}
	$_SESSION['position_ID'] = $posID;
?>