<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "bmis_db");  
 if(isset($_POST["name"]))  
 {  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      
      $sql = "INSERT INTO ref_blotter(blotterType_Name) VALUES ('".$name."')";  
      if(mysqli_query($connect, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
 ?>  