<?php
   include ("smsGateway.php");
   
   
   
   // if (isset($_SESSION['receiver']) and isset($_SESSION['emailaddress']) and isset($_SESSION['password']) and isset($_SESSION['device_Id']))
   // {
     
   	// $device_Id = $_SESSION['device_Id'];
   	// $email = $_SESSION['email'];
   	// $password = $_SESSION['password'];
   $username = $_SESSION['USER'];
   $sql = mysqli_query($db, "SELECT * FROM accounts where Username = '$username'");
   while($row = mysqli_fetch_assoc($sql))
   {
   	$password = $row['Password'];
   	$email = $row['Emailaddress'];
   	$device_Id = $row['device_Id'];
   
   	$_SESSION['email'] = $row['Emailaddress'];
   	$_SESSION['password'] = $row['Password'];		
   
   }
   
   
   $receiver  = $_SESSION['receiver'];
   	$query = mysqli_query($db, "SELECT * FROM sms where position = '$receiver'");
       	 while($row1 = mysqli_fetch_assoc($query))
      	{	
      			$number = $row1['mobileNo'];
   			$message = $row1['message'];
   
   
   			
   
   			$smsGateway = new SmsGateway('$email', '$password');
   			$result = $smsGateway->sendMessageToNumber($number, $message, $device_Id);
   
   	}
   
   
   // if ($receiver == "Barangay Officials")
   // {	
   // 	$res = mysqli_query($db, "SELECT date, announcement, announceId, contact_telnum FROM brgy_official_detail, announce GROUP BY brgy_official_detail.contact_telnum, announce.announcement");
   //     	 while($row = mysqli_fetch_assoc($res))
   //    	{	
   //    			$announceId = $row['announceId'];
   //    			$number = $row['contact_telnum'];
   // 			$message = $row['announcement'];
   // 			$result = $smsGateway->sendMessageToNumber($number, $message, $device_Id);
   			
   // 			$sql = "INSERT INTO sms (mobileNo, message)  VALUES ('$number', '$message')" or die("Error");
   // 			if ($db->query($sql) === TRUE) 
   // 			{
   
   // 			}
   
   // 	}
   // }
   
   
   
   
   
   	
   // }	 
   ?>