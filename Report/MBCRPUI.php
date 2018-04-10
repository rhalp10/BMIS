<?php 
session_start();
 ?> 
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
 
    </head>
    <style>
    .text-left {
    text-align: left;
    margin-left: 5%;
}
        .div.text-left1{
             text-align: left;
    margin-left: 15%;
        }
        .row {
    margin-right: -15px;
    margin-left: 10%;
}
        .table{
            background-color:#2980b9;
            width:70%;
            
        }
    
    
        .btn-group-lg>.btn, .btn-lg {
    padding: 10px;
    font-size: 20px;
    line-height: 1.3333333;
    border-radius: 6px;
}
    
    
    
    
    
    
    </style>
<body>
    
 <header>
    <h1 align='left'>   <a  href="viewreport.php"><button  class='btn btn-success'> back </button></a></h1>
    </header>
    
    
    <form target="_blank" action="mbcrp.php" method="POST">
    <div class="whole">
        
     <center>
      
         <font face="Gordana" size="3">MANILA BAY CLEAN UP,REHABILITATION AND PRESERVATION PROJECT <br>Quarter: <input type="text" name="quarter" size="5" required> Quarter Year: <input type="text" name="year" required ></font>
    <br> <br>
               <font face="Gordana" size="5"> <b> SOLID WASTE MANAGEMENT</b></font></center>
   <br>
      <p class="text-left" ><font face="Gordana" size="4">  <b>GENERAL INFORMATION</b></font> </p><br> 
        <div class="row">
    <div class="col-sm-6" >
       <label1 for="exampleInputName2">Name of Barangay:</label1>
        <input  class="form-control111" name="brgyname" type="text" required>
                 <br>
                <br>
                <label1 for="exampleInputName2">Provincial Location:Cavite</label1>
        
           <br>
           <br>
           <label1 for="exampleInputName2">Total Population:</label1>
           <input  class="form-control111" name="totalpup" type="text" required>
           
    </div>
    <div class="col-sm-6" >
      <label1 for="exampleInputName2">Municipality: INDANG</label1>
                
                 <br>
                <br>
                <label1 for="exampleInputName2">Regional Location:IV-A(CALABARZON)</label1>
        
           <br>
           <br>
           <label1 for="exampleInputName2">No. of Households:</label1>
           <input  class="form-control111" name="household" type="text" required>
            
    </div>
  </div>
    
             
       <p class="text-left" ><font face="Gordana" size="4" >  <b>MANDATORY SEGREGATION OF WASTES AT SOURCE</b></font> </p><br>      
      
  
         <p style="float:left; margin-left: 100px;"><b>12. Determine the compliance rate of the Barangay.</b></p>
<br><br><br>  
          <div class="row"> 
     <div class="col-sm-6" >
            <p> <b>3.1</b> Total number of households:
                     <input type="text" name="tnh" size="25" required></p>
      
  
             <p><b>3.2</b> Total number of compliant households:
                     <input type="text" name="tnc" size="25"></p>
      
             <p><b>3.3</b> Computed average*(Use Formula below
                     <input type="text" name="ca" size="25"></p>
           
              </div></div>

    <br>
    <p style="float:left; margin-left: 100px;"><b>13. Based on the computd average, is th Barangay compliant?</b></p>
<br><br><br>  
    <div class="row"> 
     <div class="col-sm-6" >
            <p> If average is 70% or higher, tick "Yes"</p> 
             <p> If average is 69% or lower, tick "No"</p>   
              <input type="checkbox" name="ch1" size="25"> YES 
              <input type="checkbox" name="ch2" size="25"> NO <br>

           
              </div></div>      
        
          <p style=" text-align:left; margin-left:100px;">*The Barangay much reach a minimum rate of 70% to be considered as compliant</p>
        <br> 
             
         <p class="text-left" ><font face="Gordana" size="4" >  <b>FUNCTIONAL MATERIALS RECOVERY FACILITY</b></font> </p><br>  
 
         <p style="text-align:left; margin-left:100px;"><b>14. Determine the compliance rate of the Barangay.</b></p><br>  
             
               
   <center>     
       <div class="table-responsive">
 <table class="table table-bordered"  >
      
    <tr>
    <th rowspan="1" style="color:white;text-align:left;">Is there an existing MRF servicing the Barangay, whether individual, cluster or municipal? (50%)</th>
        
         <th style="background-color:white" ><input type="number" name="a1" size="25"></th>
        
        <tr>
            <th rowspan="1"  style="color:white;text-align:left;">Does the existing MRF with an operational solid waste transfer station or sorting station, drop-off center, a composting facility and a recycling facility?(50%)</th>
          <th style="background-color:white" ><input type="number" name="a2" size="25"></th>
           </tr>
           
           
           <tr>
               <th rowspan="1"  style="color:white;text-align:left;">TOTAL</th>
          <th style="background-color:white" ><input type="text" name="barangaychairman" size="25" ></th>
           </tr>
               
     
   
         </table>
</div></center> 
         
        <br>
<p style="text-align:left; margin-left:100px;"><b>15. Based on the total is the LGU compliant?</b></p><br>  
             
<div class="row"> 
     <div class="col-sm-6" >
            <p><font face="verdana" size="3"> If score is 100% , tick "Yes"        </font>
</p> 
             <p> Otherwise, tick "No"</p>   
              <input type="checkbox" name="cch1" size="25" > YES 
              <input type="checkbox" name="cch2" size="25" > NO <br>
 
        <br>
              </div></div>  


 <p class="text-left" ><font face="Gordana" size="4" >  <b>NO-LITTERING AND RELATED ORDINANCE</b></font> </p><br> 

<p style="text-align:left; margin-left:100px;"><b>16.The Barangay has a No-Littering ordinance</b></p><br>
             
              <div class="row"> 
     <div class="col-sm-6" >
           <input type="checkbox" name="cc1" size="25" >YES 
              <input type="checkbox" name="cc2" size="25"> NO <br>
    
             
        <br>
        
              </div></div>  


<p style="text-align:left; margin-left:100px;"><b>17.If "Yes", is the ordinance strictly implemented? (conduct a random ocular inspection)</b></p><br>
<div class="row"> 
     <div class="col-sm-6" >
           <input type="checkbox" name="cc3" size="25" > YES 
              <input type="checkbox" name="cc4" size="25" > NO <br>

              </div></div>  
<br>


<p class="text-left" ><font face="Gordana" size="4" >  <b>NEXT STEPS</b></font> </p><br> 
     








<center>
  
<div class="table-responsive">
 <table class="table table-bordered" >

    
  <tr>
    <th style="color:white">KEY LEGAL PROVISION</th>
    <th style="color:white">LEGAL CONSEQUENCES</th> 
    <th style="color:white">REASON FOR LOW-COMPLIANCE</th>
    <th style="color:white">NEXT STEPS</th>
      
  </tr>
  <tr bgcolor="white">
     <th><input type="text" name="k1" size="25"  ></th>
    <th><input type="text" name="l1" size="25"  ></th>
    <th><input type="text" name="r1" size="25"  ></th>
    <th><input type="text" name="n1" size="25"  ></th>
  </tr>
  <tr bgcolor="white">
     <th><input type="text" name="k2" size="25"  ></th>
    <th><input type="text" name="l2" size="25"  ></th>
    <th><input type="text" name="r2" size="25"  ></th>
    <th><input type="text" name="n2" size="25"  ></th>
  </tr>
 <tr bgcolor="white">
     <th><input type="text" name="k3" size="25"  ></th>
    <th><input type="text" name="l3" size="25"  ></th>
    <th><input type="text" name="r3" size="25"  ></th>
    <th><input type="text" name="n3" size="25" ></th>
  </tr>
      <tr bgcolor="white">
     <th><input type="text" name="k4" size="25"  ></th>
    <th><input type="text" name="l4" size="25"  ></th>
    <th><input type="text" name="r4" size="25"  ></th>
    <th><input type="text" name="n4" size="25"  ></th>
  </tr>
    </table></div></center>
<br>
<p class="text-left" ><font face="Gordana" size="4" >  <b>ACCOMPLISHED BY:</b></font> </p><br>
<div class="row"> 
     <div class="col-sm-6" >
           <input type="text" name="com" size="40" required ><br>
                <label>  Committee Chairman on Environment</label><br>
        
        <br>
     
</div></div>
    
    
    
    
    <p class="text-left" ><font face="Gordana" size="4" >  <b>CERTIFIED TRUE AND CORRECT:</b></font> </p><br>   
<div class="row"> 
    
 
     <div class="col-sm-6" >
             <input type="text" name="cap" size="40" required ><br>
                <label>  Punong Barangay</label>
  </div></div>
        <br>
          
           
         
 

    <br>
    <br>
     
     <p class="text-center">
 <button>Save</button>
    </p>
       
</div>    
</form>
    </body>

</html>