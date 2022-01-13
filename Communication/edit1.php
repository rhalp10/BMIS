<?php
   include("connection.php");
   
   session_start();
   $announceId = $_SESSION['id'];
   
   
   $cate = $_POST['editCategory'];
   $state = $_POST['editStatement'];
   $rece = $_POST['editReceiver'];
   
   $sql = "UPDATE announce SET category = '$cate', announcement = '$state', receiver = '$rece' WHERE announceId = $announceId;";
   if ($db->query($sql) === TRUE) 
   {
   						echo "<script>alert('You successfully updated an announcement');</script>";
   						echo "<script>window.location=\"index.php\";</script>";
   						die();
   		
   }
   
   else
   {
   	?>
<script>
   alert("UnSuccessfull!!")
   // 
</script>
<?php
   }
   
   
   ?>