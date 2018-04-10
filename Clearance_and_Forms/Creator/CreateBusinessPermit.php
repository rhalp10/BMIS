<?php
  $ctc = $_GET['ctc'];
  $or = $_GET['or'];
  $busid = $_GET['res_ID'];
?>

<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Business Permit</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <script src="../js/jquery-2.1.3.js">
    </script>

  </head>

  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">Business Permit</div>
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
            <form action="../Clearances/BusinessPermit.php" method="POST">

              <div class = "perBox">
                  <div class="titele center borderNow">
                    Business Details
                  </div>
                  <div class="left">
                    <label for="busid">Applicant ID:</label>
                    <input type="text" name="busid" id="busid" readonly="readonly"/><br><br>
                  </div>
                  <div class="right">
                    <label for="businessName">:</label>
                    <input type="text" name="businessName" id="businessName" placeholder="Input Business Name"  /><br><br>
                  </div>
              </div>
              <div class = "perBox margint100">
                  <div class="titele center borderNow">
                    Business Address
                  </div>
                  <div class="left">
                    <label for="first">:</label>
                    <input type="text" name="houseNo" id="houseNo" placeholder="Input House Number"/><br><br>

                  </div>
                  <div class="right">
                    <label for="first">:</label>
                    <input type="text" name="street" id="street" placeholder="Input Street"/><br><br>
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
              <div class="btn paddingT150">
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
