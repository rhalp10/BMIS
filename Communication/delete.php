<?php
   include ("connection.php");
   session_start();
   
   $id = $_GET['id'];
   $res = mysqli_query($db, "Delete from announce where announceId = '$id'");
   
   ?>	
<script type="text/javascript">
   alert("The announcement will be deleted")
   window.location =  ("index.php")    	
</script>
?>