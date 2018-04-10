 
<html>
    <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style>
textarea {	
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;	
width: 80%;}
        
        
        button{
            padding: 5px;
            background-color: #284089;
            
        }
</style>
    
    
    </head>
    
<body>
        
 <header>
    <h1 align='left'>   <a  href="viewreport.php"><button  class='btn btn-success'> back </button></a></h1>
    </header>
    
   <form target="_blank" method="post" action="accomplishment.php">
 
    
    <div class="whole"></div>
        <center>
        <p>
              <center> <font face="Gordana" size="4">Republic of the Philippines <br> 
                  Province of Cavite <br> 
                  Municipality of Indang <br>
                  <label > BARANGAY </label>   <input type="text" name="barangay" placeholder="Type your brgy here" required><br> 
                  <br> <font face="Gordana" size="6" ><b>OFFICE OF THE SANGGUNIANG BARANGAY</b></font><br></font></center>
        </p>
        <hr >
        
         <font face="Gordana" size="4">ACCOMPLISHMENT REPORT FOR <select name="month" required>
             <option value="">Select month</option>
             <option value="JANUARY">JANUARY</option>
              <option value="FEBRUARY">FEBRUARY</option>
              <option value="MARCH">MARCH</option>
              <option value="APRIL">APRIL</option>
              <option value="MAY">MAY</option>
              <option value="JUNE">JUNE</option>
              <option value="JULY">JULY</option>
              <option value="AUGUST">AUGUST</option>
              <option value="SEPTEMBER">SEPTEMBER</option>
              <option value="OCTOBER">OCTOBER</option>
              <option value="NOVEMBER">NOVEMBER</option>
              <option value="DECEMBER">DECEMBER</option>
             </select>, <input type="text" name="Year" placeholder="Enter year" required><br></font>
    <font face="Gordana" size="4">Committee on <input type="text" name="committee" placeholder="Type of committee" required><br></font></center>
    
    <br>
    <center> <textarea name="narrativereport" rows="30" cols="150" required>     </textarea></center>
   
        <br>
       
       <p class="text-center">
           <button>Save</button>
    </p>
    </form>
        

    
   
 
    </body>

</html>