 <?php 
 session_start();
 ?>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/jquery.min.js"></script>


     <script type="text/javascript">
     $(document).ready(function() {
         $('#save').on('click', function() {
             var m = $('#month').val();
             var y = $('#fyear').val();
             var n = $('#narrativereport').val();
             if (m == '' || y == '' || n == '') {
                 alert('Please provide data in blank fields. Thank you!');
             } else {
                 var a = confirm('Saved?');
                 if (a == true) {
                     $.ajax({
                         type: 'POST',
                         url: 'accomtodb.php',
                         data: {
                             m: m,
                             y: y,
                             n: n
                         },
                         success: function(html) {
                             alert('File : ' + html + '');
                             $("form").trigger("reset");


                         }
                     });
                 }
             }

         });
     });
     </script>







     <style>
     textarea {
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         width: 80%;
     }


     button {
         padding: 5px;
         background-color: #284089;

     }
     </style>


 </head>

 <body>

     <header>
         <h1 align='left'> <a href="viewreport.php"><button class='btn btn-success'> back </button></a></h1>
     </header>

     <form>


         <div class="whole"></div>
         <center>
             <p>
                 <center>
                     <font face="Gordana" size="4">Republic of the Philippines <br>
                         Province of Cavite <br>
                         Municipality of Indang <br>
                         <label> BARANGAY <?php echo $_SESSION['barangay']; ?></label> <br>
                         <br>
                         <font face="Gordana" size="6"><b>OFFICE OF THE SANGGUNIANG BARANGAY</b></font><br>
                     </font>
                 </center>
             </p>
             <hr>

             <font face="Gordana" size="4">ACCOMPLISHMENT REPORT FOR <select id="month" required>
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
                 </select>,
                 <select id="fyear" required>
                     <option value="">Year</option>
                     <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
                     <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                     <?php } ?>
                 </select><br>
             </font>
             <?php if($_SESSION['position_ID']!=3){
				 echo '<font face="Gordana" size="4">Committee on '.$_SESSION['committee'].'<br></font></center>';
			 }
			 ?>


             <br>
             <center> <textarea id="narrativereport" rows="30" cols="150" required>     </textarea></center>

             <br>

             <p class="text-center">
                 <input onClick="deleteme()" readonly class="btn btn-primary btn-lg active" id="save" value="Save">
             </p>
             </p>



             </div>
     </form>

 </body>

 </html>