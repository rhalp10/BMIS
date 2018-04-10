<?php
  $ctc = $_GET['ctc'];
  $or = $_GET['or'];
  $busid = $_GET['res_ID'];
?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Building Permit</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <script src="../js/jquery-2.1.3.js">
    </script>
    <script type="text/JavaScript">
      $(window).on('scroll', function(){
        if ($(window).scrollTop()){
          $('nav').addClass('black');
        }
        else{
          $('nav').removeClass('black');
        }
      })
    </script>
  </head>

  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">Building Permit</div>
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
            <form action="../Clearances/BuildingPermit.php" method="POST">
              <div class = "perBox">
                  <div class="titele center borderNow">
                    Applicant
                  </div>
                  <div class="left">

                    <label for="middleName">ID_No.:</label>
                    <input type="text" name="busid" id="busid" readonly="readonly"/><br><br>

                  </div>
                  <div class="right">


                  </div>
              </div>
              <div class = "perBox margint70">
                  <div class="titele center borderNow">
                    Address
                  </div>
                  <div class="left">
                    <label for="houseNo">House No.:</label>
                    <input type="text" name="houseNo" id="houseNo" /><br><br>

                    <label for="lot">Lot No.:</label>
                    <input type="text" name="lot" id="lot" /><br><br>
                  </div>
                  <div class="right">
                    <label for="first">Street:</label>
                    <input type="text" name="street" id="street" /><br><br>

                    <label for="phase">Phase:</label>
                    <input type="text" name="phase" id="phase" /><br><br>
                  </div>
              </div>
              <div class = "perBox margint120">
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
              <div class="btn paddingT170">
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
      document.getElementById("busid").value = <?php echo $busid; ?>;
    </script>
  </body>
</html>
