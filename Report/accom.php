<?php
session_start();
 $brgy = $_POST['barangay'];
 $fy = $_POST['fyear'];
 $fm = $_POST['fmonth'];
 $fd = $_POST['fday'];
$first = $fy."-".$fm."-".$fd;
      $fy1 = $_POST['syear'];
 $fm1 = $_POST['smonth'];
 $fd1 = $_POST['sday'];
$second = $fy1."-".$fm1."-".$fd1;

$con =  mysqli_connect("localhost", "root", "","bmis_db");
						$query = "SELECT COUNT(incident_id) as total FROM `ms_incident` WHERE `date_reported` BETWEEN '$first' AND '$second'";
						$res = mysqli_query($con,$query);
						$row=mysqli_fetch_array($res);
$total = $row['total'];
						if($total==0){
                            
                            $total = "no";
                        }

					
	$_SESSION['total'] = $total;	
$_SESSION['fd'] = $fd;	
$_SESSION['ff'] = $fd1."-".$fm1."-".$fy1;	

?> 
<html>
    <head>
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    </head>
<body>
 
    <header>
    <h1 align='left'>   <a  href="cvalid.php"><button  class='btn btn-success'> back </button></a></h1>
    </header>
    
    <section align='center'>
 
    
    <form target="_blank" action="certificateofvalidation.php" method="POST">
<style>
  .btn-group-lg>.btn, .btn-lg {
    padding: 10px 25px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;      
        
        </style>
        <p>
            <center>  <font face="Gordana" size="4">Republic of the Philippines <br> Department of Interior and Local Government <br>Province of Cavite <br> Municipality of Indang <br>  <label> BARANGAY </label>    <input type="text" name="barangay" value="<?php echo $brgy;?>"> </font>
        </p>
          <p>
            <br>
              <center>  <font face="Gordana" size="4">OFFICE OF THE PUNONG BARANGAY</font>
          <hr>
                  <br>
                  <center>  <font face="Gordana" size="5">CERTIFICATE OF VALIDATION</font>
        <br>
        <br>
           <br>     
        <label> <center>  <font face="Times New Roman" size="3"> THIS IS TO CERTIFY that based on the Barangay Blotter Book, <?php echo $total; ?>  <br><label> complaint was received/ handled by this Barangay for the period of 01 to &nbsp; <?php echo $second; ?>
           . </label></font>
        </p>
        
        <br>
        <br>
       <br>
    <br>
   
       
         <font face="Gordana" size="3"><input type="text" name="barangaychairman" value="<?php echo $_SESSION['captain']; ?>"><br>
             <label> BARANGAY CAPTAIN</label>
        </p>
         <br>
            <p class="text-center">
  <button class="btn btn-primary btn-lg active" role="button">Save</button></p> 
 
        
</form>
    
    </section>
 
    </body>

</html>