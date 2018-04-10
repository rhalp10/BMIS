
<?php
  $or = $_GET['or'];
  $ctc = $_GET['ctc'];
  $datedate = date('Y-m-d H:i:s');
?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Transient Information</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
  </head>
  <body>
    <div class="wrapper">
      <nav>
        <div class="logo">Transient Information</div>
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
            <form action="../Clearances/TransientInformation.php" method="POST" enctype="multipart/form-data">
                              <div class = "perBox">
                                  <div class="titele center borderNow">
                                    Picture
                                  </div>
                                  <div class="ss">
                                  <input type="file" name="picpic">
                                  </div>
                              </div>
                              <div class="perBox">
                                <div class="titele center borderNow">
                                  APPLICANT
                                </div>
                                <div class="left">
                                  <label for="first">First name:</label>
                                  <input type="text" name="first" id="first" /><br><br>

                                  <label for="middleName">Middle name:</label>
                                  <input type="text" name="middleName" id="middleName" /><br><br>

                                  <label for="lastName">Last name:</label>
                                  <input type="text" name="lastName" id="lastName" /><br><br>
                                </div>
                                <div class="right">
                                  <label for="gender">Gender:</label>
                                  <input type="text" name="gender" id="gender" /><br><br>

                                  <label for="bPlace">Birth Place:</label>
                                  <input type="text" name="bPlace" id="bPlace" /><br><br>

                                  <label for="birthdate">Birth Date:</label>
                                  <input type="date" name="birthdate" id="birthdate" /><br><br>
                                </div>
                              </div>
                              <div class="perBox margint200">
                                <div class="titele center borderNow">
                                  Basic Information
                                </div>
                                <div class="left">
                                  <label for="first">Civil status:</label>
                                  <input type="text" name="civilStatus" id="civilStatus" /><br><br>

                                  <label for="educ">Educational Attainment:</label>
                                  <input type="text" name="educ" id="educ" /><br><br>

                                </div>
                                <div class="right">

                                  <label for="citi">Citizenship:</label>
                                  <input type="text" name="citi" id="citi" /><br><br>
                                </div>
                              </div>
                              <div class="perBox margint200">
                                <div class="titele center borderNow">
                                  Main Address
                                </div>
                                <div class = "left">
                                  <label for="houseNo">House No.:</label>
                                  <input type="text" name="houseNo" id="houseNo" /><br><br>

                                  <label for="street">Street:</label>
                                  <input type="text" name="street" id="street" /><br><br>

                                  <label for="barangay">Barangay:</label>
                                  <input type="text" name="barangay" id="barangay" /><br><br>
                                </div>
                                <div class="right">
                                  <label for="municipality">Municipality:</label>
                                  <input type="text" name="municipality" id="municipality" /><br><br>

                                  <label for="province">Province:</label>
                                  <input type="text" name="province" id="province" /><br><br>
                                </div>
                              </div>
                              <div class = "perBox margint200">
                                <div class="titele center borderNow">
                                  Address within the Barangay
                                </div>
                                <div class = "left">
                                  <label for="temp_houseNo">House No.:</label>
                                  <input type="text" name="temp_houseNo" id="temp_houseNo" /><br><br>

                                  <label for="temp_street">Street:</label>
                                  <input type="text" name="temp_street" id="temp_street" /><br><br>

                                </div>
                                <div class="right">
                                  <label for="temp_barangay">Barangay:</label>
                                  <input type="text" name="temp_barangay" id="temp_barangay" /><br><br>
                                </div>
                              </div>
                              <div class = "perBox margint120">
                                <div class="titele center borderNow">
                                  Spouse (if Married)
                                </div>
                                <div class = "left">
                                  <label for="spouse_first">First Name:</label>
                                  <input type="text" name="spouse_first" id="spouse_first" /><br><br>

                                  <label for="spouse_middleName">Middle Name:</label>
                                  <input type="text" name="spouse_middleName" id="spouse_middleName" /><br><br>

                                  <label for="spouse_lName">Last Name:</label>
                                  <input type="text" name="spouse_lName" id="spouse_lName" /><br><br>

                                </div>
                                <div class="right">

                                  <label for="spouse_bPlace">Birth Place:</label>
                                  <input type="text" name="spouse_bPlace" id="spouse_bPlace" /><br><br>

                                  <label for="spouse_bDate">Birth Date:</label>
                                  <input type="date" name="spouse_bDate" id="spouse_bDate" /><br><br>
                              </div>
                            </div>
                            <div class = "perBox margint200">
                              <div class="titele center borderNow">
                                Employer (if employed)
                              </div>
                              <div class = "left">
                                <label for="emp_name">Name:</label>
                                <input type="text" name="emp_name" id="emp_name" /><br><br>
                              </div>
                              <div class="right">
                                <label for="work">Occupation:</label>
                                <input type="text" name="work" id="work" /><br><br>
                              </div>
                            </div>
                            <div class = "perBox margint120">
                              <div class="titele center borderNow">
                                Reference
                              </div>
                              <div class = "left">
                                <label for="reference_name">Name:</label>
                                <input type="text" name="reference_name" id="reference_name" /><br><br>
                              </div>
                              <div class="right">
                                <label for="con_Num">Contact #:</label>
                                <input type="text" name="con_Num" id="con_Num" /><br><br>
                              </div>
                            </div>
                            <div class = "perBox margint120">
                                <div class="titele center borderNow">
                                  Application Reference
                                </div>
                                <div class="left">
                                  <label for="ctcNo">CTC No.:</label>
                                  <input type="text" name="ctcNo" id="ctcNo" readonly="readonly"/><br><br>

                                  <label for="orNo">O.R No.:</label>
                                  <input type="text" name="orNo" id="orNo" readonly="readonly"/><br><br>

                                </div>
                                <div class="right">
                                  <label for="date_trans">Date Transferred:</label>
                                  <input type="date" name="date_trans" id="date_trans" /><br><br>

                                  <label for="reason">Reason for Transfer:</label>
                                  <input type="text" name="reason" id="reason" /><br><br>
                                </div>
                            </div>

                  <div class="btn paddingT230">
                    <button type="submit" name="submit" value="upload">Submit</button>
                  </div>
          </form>
          <?php
          if (isset($_POST['submit'])) {
            $picpic = addslashes(file_get_contents($_FILES['picpic']['tmp_name']));
            $picss = "transient";
            $sqlpicpic = "UPDATE `temp_pic_holder` SET pic_holder='$picpic' WHERE pic_Name='$picss';";
            if (mysqli_query($conn, $sqlpicpic)) {

            }
          }
          ?>
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
