<?php
   include("connection.php");
   
   		$category = $_POST['category'];
   
   		$res = mysqli_query($db, "SELECT * FROM sms_category WHERE category = '$category' GROUP BY category");
   		while($row = mysqli_fetch_assoc($res))
         	{
         		$category = $row['category'];
   			if ($category != null)
   			{
   				echo "<script>alert('The category is existing');</script>";
   				echo "<script>window.location=\"category_option.php\";</script>";
   				die();
   			}
   
   
   		}
   
   			$sql = "INSERT INTO sms_category(category) VALUES ('$category')" or die("Error");
   				if ($db->query($sql) === TRUE) 
   				{
   							echo "<script>alert('You successfully added a category');</script>";
   							echo "<script>window.location=\"index.php\";</script>";
   						
   				} 
   
   				else 
   				{
   						die("Error");
   				}
   
   ?>