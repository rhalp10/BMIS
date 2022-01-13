<?php  
 //insert.php  
 include('dbcon.php');
 if(isset($_POST["name"]))  
 {  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      
      $sql = "INSERT INTO ref_blotter(blotterType_Name) VALUES ('".$name."')";  
      if(mysqli_query($db, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
 ?>  