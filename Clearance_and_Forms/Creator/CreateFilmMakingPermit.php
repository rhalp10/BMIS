<?php
  $ctc = $_GET['crc'];
  $or = $_GET['or'];
?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Film Making Permit</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <script src="../js/jquery-2.1.3.js">
    </script>

  </head>

  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">Film Making Permit</div>
        <ul>
          <li class="dd">

            <div class="ddcontent">

            </div>
          </li>
          <li><a href="../index.php">Home</a></li>
        </ul>
      </nav>
      <section class="sec1">
        <div class="qwe">
          <div class="input-container">
            <form action="../Clearances/FilmMakingPermit.php" method="POST">
              <div class = "perBox">
                   <div class="titele center borderNow">
                     Applicant
                   </div>
                   <div class="left">
                     <label for="nameofProduction">Name of Production:</label>
                     <input type="text" name="nameofProduction" id="nameofProduction" /><br><br>
                   </div>
                   <div class="right">
                     <label for="title">Title of Film:</label>
                     <input type="text" name="title" id="title" /><br><br>
                   </div>
               </div>
               <div class = "perBox margint120">
                    <div class="titele center borderNow">
                      Duration
                    </div>
                    <div class="left">
                      <label for="noofDay">No. of Days Shooting:</label>
                      <input type="text" name="noofDay" id="noofDay" /><br><br>
                    </div>
                    <div class="right">

                    </div>
                </div>
                <div class = "perBox margint100">
                     <div class="titele center borderNow">
                       Application Reference
                     </div>
                     <div class="left">

                       <label for="first">CTC No.:</label>
                       <input type="text" name="ctcNo" id="ctcNo" readonly="readonly"/><br><br>
                     </div>
                     <div class="right">
                       <label for="first">O.R No:</label>
                       <input type="text" name="orNo" id="orNo" readonly="readonly"/><br><br>
                     </div>
                 </div>
              <div class="btn paddingT200">
                <button type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <section class="content">

      </section>
    </div>
    <script>
      document.getElementById("ctcNo").value = <?php echo $ctc; ?>;
      document.getElementById("orNo").value = <?php echo $or; ?>;
    </script>
  </body>


</html>
