<?php 
include('process.php');
 ?> 
<html>
    <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <style>
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
<body>
        <form action="monthlytransmittal.php" method="POST">
        <center>
      <br>
            <br>
            <font face="Gordana" size="4"> Republic of the Philippines <br> Province of Cavite <br> Municipality of Indang <br>OFFICE OF THE LUPON TAGAPAMAYAPA<br>OFFICE OF THE PUNONG BARANGAY<br>  <label> BARANGAY </label>    <input1 type="text" name="barangay" value="<?php echo $brgy;?>"> </font>
  
          <hr width=50%>
        
          <p class="font-weight-bold">  <font face="Gordana" size="6" > Monthly Transmittal of Final Reports</font></p>
        </center>
        <br>
                     
                     
                     
                     

        
       <p class="text-left"><font face="Times new roman" size="4"> To: MUNICIPAL JUDGE<br>  Municipality of Indang</p></left>
        
        
        <br>
        <p class="text-justify"><font face="Times new roman" size="4">   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Enclosed herewith are final reports of a settlement of disputes and arbitration awards made by the Punong Barangay/Pangkat Tagapagkasundo in th following cases:</p>
        </p>
        <br>
    <center>
      <div class="table-responsive">
        
 <table class="table table-bordered" >
  <tr>
    <th></th>
    <th>Title</th> 
  </tr>
 
    <tr>
    <td>Barangay Case No.</td>
    <td>Complainant et al vs. Respondents, et al</td>
           </tr>
        </table></center>
        
        <br>
    <br><center>
            <label1 for="exampleInputName2" ><b>Prepared By:</b></label1>
        <input class="form-control113" id="exampleInputName2" type="text"> 
                <label1 for="exampleInputName2">Lupo/Pangkat Kalihim</label1> <br>
             
             <label1 for="exampleInputName2"><b>Noted By:</b></label1>
        <input class="form-control113" id="exampleInputName2" type="text">
                 <label1 for="exampleInputName2">Punong Barangay/Pangkat Chairman</label1><br>
        
        <label1 for="exampleInputName2"><b>Recieved By:</b></label1>
        <input class="form-control113" id="exampleInputName2" type="text">
                 <label1 for="exampleInputName2">(Clerk of Court)</label1><br>
        </center> 
       <br><br>
        <p class="text-justify"><font face="Times new roman" size="4">   <b>IMPORTANT:</b> Lupon/Pangkat Secretary shall transmit not later that the First Five days of each month the final reports for the preceding month.</p>
            <br><br>
        <p class="text-center">
  <a href="monthlytransmittal.php" class="btn btn-primary btn-lg active" role="button">Save</a>
    </p>
</form>
    
   
 
    </body>

</html>