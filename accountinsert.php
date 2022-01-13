<?php

//add dbconnect
include("db.php");
include("db.php");

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$emailaddress = $_POST['emailaddress'];
$device_Id = $_POST['device_Id'];
$password = $_POST['password'];
$position = $_POST['position'];
$committee = $_POST['committee'];
$count = 0;

$squery = mysqli_query($db, "SELECT * FROM accounts WHERE Username = '$username'");
while($row1 = mysqli_fetch_assoc($squery))
{
	if ($row1['Username'] != null)
	{
		echo '<script> alert ("Username already in use")</script>';
		echo '<script> window.history.back();</script>';
		die();
	}
}


if ($position == 'Barangay Captain')
{
	$sql = mysqli_query($db, "SELECT * FROM accounts where Position = 'Barangay Captain'");
		while($row = mysqli_fetch_assoc($sql))
		{
			if ($row['Position'] != null)
			{
				echo '<script> alert ("Only 1 barangay Captain must be added")</script>';
				echo '<script> window.history.back();</script>';
				die();
			}
		}
				$query = "INSERT INTO accounts(Fullname ,Username, Emailaddress,device_Id,Password,Position,Committee) VALUES ('$fullname', '$username','$emailaddress','$device_Id', '$password', '$position', '$committee')";
				if ($db->query($query) === TRUE) 
				{
					echo '<script> alert ("Successful")</script>';	
					echo '<script> window.history.back();</script>';			
				}

}

else if ($position == 'Barangay Treasurer')
{
	$sql = mysqli_query($db, "SELECT * FROM accounts where Position = 'Barangay Treasurer'");
		while($row = mysqli_fetch_assoc($sql))
		{
			if ($row['Position'] != null)
			{
				echo '<script> alert ("Only 1 barangay Treasurer must be added")</script>';
				echo '<script> window.history.back();</script>';
				die();
			}
		}
				$query = "INSERT INTO accounts(Fullname, Username, Emailaddress,device_Id,Password,Position,Committee) VALUES ('$fullname', '$username','$emailaddress','$device_Id', '$password', '$position', '$committee')";
				if ($db->query($query) === TRUE) 
				{
					echo '<script> alert ("Successful")</script>';	
					echo '<script> window.history.back();</script>';			
				}

}


else if ($position == 'SK Chairman')
{
	$sql = mysqli_query($db, "SELECT * FROM accounts where Position = 'SK Chairman'");
		while($row = mysqli_fetch_assoc($sql))
		{
			if ($row['Position'] != null)
			{
				echo '<script> alert ("Only 1 barangay SK Chairman must be added")</script>';
				echo '<script> window.history.back();</script>';
				die();
			}
		}
				$query = "INSERT INTO accounts(Fullname, Username, Emailaddress,device_Id,Password,Position,Committee) VALUES ('$fullname', '$username','$emailaddress','$device_Id', '$password', '$position', '$committee')";
				if ($db->query($query) === TRUE) 
				{
					echo '<script> alert ("Successful")</script>';	
					echo '<script> window.history.back();</script>';			
				}

}

else if ($position == 'Barangay Councilor')
{
	$sql1 = mysqli_query($db, "SELECT * FROM accounts where Position = 'Barangay Councilor'");
		while($row = mysqli_fetch_assoc($sql1))
		{
			$row['Position'];
			$count = $count + 1;
		}

		if ($count >= 7)
		{
			echo '<script> alert ("Maximum input of Brangay Councilor")</script>';
			echo '<script> window.history.back();</script>';
			die();
		}

		$query = mysqli_query($db, "SELECT * from accounts WHERE Committee = '$committee'");
		while($row = mysqli_fetch_assoc($query))
		{
			if ($row['Committee'] != null)
			{
				echo '<script> alert ("Committee already exist")</script>';
				echo '<script> window.history.back();</script>';
				die();
			}				
		}

		$query = "INSERT INTO accounts(fullname, username, emailaddress,device_Id,password,position,committee) VALUES ('$fullname', '$username','$emailaddress','$device_Id', '$password', '$position', '$committee')";
		if ($db->query($query) === TRUE) 
		{
			echo '<script> alert ("Successful")</script>';	
			echo '<script> window.history.back();</script>';			
		}
}
else if ($position == 'Barangay Health Worker'){
				$query = "INSERT INTO accounts(Fullname, Username, Emailaddress,device_Id,Password,Position,Committee) VALUES ('$fullname', '$username','$emailaddress','$device_Id', '$password', '$position', '$committee')";
				if ($db->query($query) === TRUE) 
				{
					echo '<script> alert ("Successful")</script>';	
					echo '<script> window.history.back();</script>';
					echo '  <script> window.location = "account.php"</script>';			
				}

}


?>