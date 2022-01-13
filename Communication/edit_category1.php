<?php
   session_start();
   
   	include("connection.php");
   	
   	$cate = $_POST['editCategory'];
   	$id = $_SESSION['id'];
   
   	$sql = "UPDATE sms_category SET category = '$cate' WHERE id = '$id'";
   	if ($db->query($sql) === TRUE) 
   	{
   							echo "<script>alert('You successfully updated a category');</script>";
   							echo "<script>window.location=\"category_option.php\";</script>";
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