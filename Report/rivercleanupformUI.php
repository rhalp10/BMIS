<?php 
include('process.php');
 ?> 
<html>
<body>
        
    <header>
    <h1 align='center'></h1>
    </header>
    
               
               
                     
                  <form action="rivercleanupform.php" method="POST">
        <center>
        <p>
              <h4>REPUBLIC OF THE PHILIPPINES <br> Province of Cavite <br> Municipality of Indang <br> <label> BARANGAY </label>    <input type="text" name="barangay" value=<?php echo $brgy;?> > </h4>
        </p>
        
          <p>
          
        
         <h3>RIVER CLEAN-UP DATA CAPTURE FORM</h3></center>
                      
  <style>
table {
    width:80%;
    height: 8%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
 </style>
<center>
    
    
 <table >
     
  <tr>
    <th colspan=1 >LGU </th>
    <th>NAME OF RIVER SYSTEM</th>
     
     <th>DATE CONDUCTED</th> 
      <th>QUARTER LENGTH CLEANED</th> 
      <th>VOLUME OF GARBAGE COLLECTED</th> 
      <th>REMARKS</th>   
  </tr>
<tr >
    <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th>
    <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th>
     
     <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th> 
      <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th> 
      <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th> 
      <th><input type="text" name="barangaychairman" value=<?php echo $name;?>></th>   
</tr>

</table>
     
     

     


    
    
           
    
    
    
    
                     
                     
</center>
                       
                       
                       
                       
                       
                       
                       
                       
    <br>
       
       <p> Prepared By: <br>
        <input type="text" name="barangaychairman" value=<?php echo $name;?>><br>
             <label> Barangay Secretary</label>
        </p>
   
        <p> Noted By: <br>
        <input type="text" name="barangaychairman" value=<?php echo $name;?>><br>
             <label> Barangay Captain</label>
        </p>
   
        
       <center> <p>
        <input type="submit" value="GET PDF" name="submit"/>
        <input type="submit" value="SAVE PDF" name="submit"/>     
        </p>
</section>
        
</form>
    
   
 
    </body>

</html>