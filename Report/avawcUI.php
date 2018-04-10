<?php session_start();?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
<style>
    
    .form-control111 {
    display:    inline-block;
    width: 5%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    margin-bottom:3px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
     .form-control112 {
    display:    inline-block;
    width: 15%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    margin-bottom:3px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
     .form-control113 {
    display:   block;
    width: 20%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    margin-bottom:3px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
    label1 {
    /* display: inline-block; */
         display:   table-cell;
    max-width: 30%;
    margin-bottom: 2px;
    font-weight: 100;
}
    .btn-group-lg>.btn, .btn-lg {
    padding: 10px;
    font-size: 20px;
    line-height: 1.3333333;
    border-radius: 6px;
}
    
    
    </style>
</head>
<body>
     <header>
    <h1 align='left'>   <a  href="viewreport.php"><button  class='btn btn-success'> back </button></a></h1>
    </header>
 <center>  
     <form target="_blank" method="post" action="avawcform.php">

        <div class="whole">
        
     <center>  <font face="Gordana" size="4"> CONSOLIDATED QUARTERLY COMPLIANCE MONITORING REPORT RE: RA 9262 (AVAWC) <br>
     
         <label1 for="exampleInputName2">Period Covered:</label1>
        <input  class="form-control111" id="exampleInputName2" name="period" type="text">
          <label1 for="exampleInputName2">Quarter Year:</label1>
        <input class="form-control111" id="exampleInputName2" name="year" type="text"><br>
          <label1 for="exampleInputName2">As of:</label1>
        <input class="form-control111" id="exampleInputName2" name="asof" type="text"> 
            </font></center>
         <br>
        <p class="text-left"><font face="Gordana" size="4"> Municipality: INDANG</font></p><br>
         
<center>
  
<div class="table-responsive">
 <table class="table table-bordered" >
   

  <tr>
    <th><center>BARANGAY <br>(1)</center></th>
    <th><center>TOTAL<br>NO.OF<br>VAWC<br>CASES<br>(2)</center></th>
     <th colspan="4 "><center>NO.OF VAW CASES REPORTED<br>(3)</center></th> 
      <th><center> TOTAL<br> (4)</cente></th>
       <th colspan="4"><center>NO.OF CASES ACTED UPON<br>(5)</center></th> 
      <th><center> TOTAL NO. <br> OF VAWC<br> CASES<br> ACTED<br>UPON<br>(6)</center></th>
      <th colspan="2"><center>PROGRAMS/PROJ.<br> IMPLEMENTED<br> (7)</center></th>
     <th><center>FUNDS<br> ALLOCATED<br> (8)</center></th>
   
      <th>REMARKS<br>(9)</th>   
  </tr>
         
         
        <tr>
        <td></td>
        <td> </td>
        <th><center>Physical <br>Abuse<br> (a)</center></th>
        <th><center>Sexual<br> Abuse<br>(b)</center></th>
        <th><center>Psychological <br>Abuse <br>(c) </center></th>
        <th ><center> Economic <br>Abuse<br> (d)</center></th>
        <td></td>
    
            <th><center>Referred <br> to LSWDO <br> (a)</center></th>
        <th><center>Referred <br> to PNP <br> (b)</center></th>
         <th><center>Referred <br> to Court <br> (c)</center></th>
        <th><center>Referred <br> to Medical <br> (d)</center></th>
              <td></td>
              
            <th><center>Training<br> (a)</center></th>
        <th><center>IEC<br>(b)</center></th>
              
              <td></td>
              <td></td>
         
              
     </tr>
     
         <tr>
        
        <td></td>
        <td></td>
        <td></td>
        <td></td>    
        <td></td>
        <td></td>
        <td></td>
        <td></td>   
        <td></td>
        <td></td>
        <td></td>
        <td></td>    
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       
            
     </tr>
     

     
     
     
     
  
    <tr bgcolor=white >
   <td><input type="text" name="barangaychairman1" size="15"></td>
     <td><input type="text" name="barangaychairman2" size="15"></td>
    <td><input type="text" name="barangaychairman3" size="15"></td>
     <td><input type="text" name="barangaychairman4" size="15"></td>
      <td><input type="text" name="barangaychairman5" size="15"></td>
     <td><input type="text" name="barangaychairman6" size="15"></td>
    <td><input type="text" name="barangaychairman7" size="15"></td>
     <td><input type="text" name="barangaychairman8" size="15"></td>
      <td><input type="text" name="barangaychairman9" size="15"></td>
     <td><input type="text" name="barangaychairman10" size="15"></td>
    <td><input type="text" name="barangaychairman11" size="15"></td>
     <td><input type="text" name="barangaychairman12" size="15"></td>
      <td><input type="text" name="barangaychairman13" size="15"></td>
     <td><input type="text" name="barangaychairman14" size="15"></td>
    <td><input type="text" name="barangaychairman15" size="15"></td>
     <td><input type="text" name="barangaychairman16" size="15"></td> 
  
</tr>
   
   </table></div>
                    
</center>
      
                
    <br>
           <label1 for="exampleInputName2" >Prepared By:</label1>
        <input class="form-control113" id="exampleInputName2" name="desk" type="text" value="<?php echo $_SESSION['desk'];?>"> 
                <label1 for="exampleInputName2">VAWC Desk Officer</label1> <br>
             
             <label1>Submitted By:</label1>
        <input class="form-control113" type="text" name="cap" value="<?php echo $_SESSION['captain'];?>">
                 <label1 for="exampleInputName2">Punong Barangay</label1>
             
         
             </div>
         
    </div>
    <br>
    <br>
         
   <p class="text-center">
<button>GENERATE PDF</button>
    </p>
       
   
</form>
    </center> 
    </body>

</html>
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         