<!DOCTYPE html>
<html>
   <?php
      session_start();
      include("connection.php");
      
      $cate = $_POST['category'];
      $state = $_POST['statement'];
      $rece = $_POST['receiver'];
      $target_dir = "image/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      $_SESSION['receiver'] = $rece;
      
      
      $sql = "INSERT INTO announce(category, announcement, image, receiver) VALUES ('$cate', '$state', '$target_file', '$rece')" or die("Errors");
      if ($db->query($sql) === TRUE) 
      {
      	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
      	{}
      
      if ($rece == "Residents")
      {
      	$query = mysqli_query($db, "SELECT rd.res_fName , rd.res_mName , rd.res_lName , resc.contact_telnum FROM `resident_detail` rd INNER JOIN resident_contact resc ON rd.res_ID = resc.res_ID");
      	while($row = mysqli_fetch_assoc($query))
      	{
      		$number = $row['contact_telnum'];
      		$fname = $row['res_fName'];
      		$mname =  $row['res_mName'];
      		$lname = $row['res_lName'];
      		$_SESSION['receiver'] = $rece;
      
      		$sql = "INSERT INTO sms (mobileNo, message, receiver, position)  VALUES ('$number', '$state', '$fname $mname $lname', '$rece')" or die("Errors");
      		if ($db->query($sql) === TRUE) 
      		{
      			
      		}
      
      	}
      	
      	include("sms.php");
      	echo "<script>alert('You successfully added an announcement');</script>";
      	echo "<script>window.location=\"index.php\";</script>";
      	
      }
      
      
      else if ($rece != "Residents")
      {
      	$query = mysqli_query($db, "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rn.network_Name,rp.position_Name,rpp.position_Name,rc.contact_telnum FROM `brgy_official_detail` bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID LEFT JOIN resident_contact rc ON rd.res_ID = rc.res_ID LEFT JOIN ref_network rn ON rc.network_ID = rn.network_ID LEFT JOIN ref_position rpp ON bod.commitee_assignID = rpp.position_ID WHERE bod.visibility = 1 and rpp.position_Name='$rece' GROUP BY rc.contact_telnum");
      			while($row = mysqli_fetch_assoc($query))
      	{
      		$number = $row['contact_telnum'];
      		$fname = $row['res_fName'];
      		$mname =  $row['res_mName'];
      		$lname = $row['res_lName'];
      		
      
      		$sql = "INSERT INTO sms (mobileNo, message, receiver, position)  VALUES ('$number', '$state', '$fname $mname $lname', '$rece')" or die("Errors");
      		if ($db->query($sql) === TRUE) 
      		{
      			
      		}
      
      	}
      			include("sms.php");
      	echo "<script>alert('You successfully added an announcement');</script>";
      	echo "<script>window.location=\"index.php\";</script>";
      }
      
      
      }
      // if($rece == "")
      
      // 	
      // 	include("sms.php");
      // 	
      // }
      
      
      ?>
</html>