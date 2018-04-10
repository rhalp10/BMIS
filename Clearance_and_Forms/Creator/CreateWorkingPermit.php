<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Working Permit</title>
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
        <div class="logo">Working Permit</div>
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
            <form action="../Clearances/WorkingPermit.php" method="POST" enctype="multipart/form-data">
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

                                  <label for="bPlace">Birth Place:</label>
                                  <input type="text" name="bPlace" id="bPlace" /><br><br>

                                  <label for="birthdate">Birth Date:</label>
                                  <input type="date" name="birthdate" id="birthdate" /><br><br>
                                </div>
                              </div>
                              <div class="perBox margint">
                                <div class="titele center borderNow">
                                  Basic Information
                                </div>
                                <div class="left">
                                  <label for="first">Civil status:</label>
                                  <input type="text" name="civilStatus" id="civilStatus" /><br><br>

                                  <label for="educ">Educational Attainment:</label>
                                  <input type="text" name="educ" id="educ" /><br><br>

                                  <label for="religion">Religion:</label>
                                  <input type="text" name="religion" id="religion" /><br><br>

                                </div>
                                <div class="right">
                                  <label for="height">Height:</label>
                                  <input type="text" name="height" id="height" /><br><br>

                                  <label for="weight">Weight:</label>
                                  <input type="text" name="weight" id="weight" /><br><br>

                                </div>
                              </div>
                              <div class="perBox margint">
                                <div class="titele center borderNow">
                                  Father--------Parents--------Mother
                                </div>
                                <div class="left">
                                  <label for="fa_fName">First Name:</label>
                                  <input type="text" name="fa_fName" id="fa_fName" /><br><br>

                                  <label for="fa_mName">Middle Name:</label>
                                  <input type="text" name="fa_mName" id="fa_mName" /><br><br>

                                  <label for="fa_lName">Last Name:</label>
                                  <input type="text" name="fa_lName" id="fa_lName" /><br><br>

                                </div>
                                <div class="right">
                                  <label for="mo_fName">First Name:</label>
                                  <input type="text" name="mo_fName" id="mo_fName" /><br><br>

                                  <label for="fa_mName">Middle Name:</label>
                                  <input type="text" name="mo_mName" id="mo_mName" /><br><br>

                                  <label for="fa_lName">Last Name:</label>
                                  <input type="text" name="mo_lName" id="mo_lName" /><br><br>

                                </div>
                              </div>
                              <div class="perBox margint200">
                                <div class="titele center borderNow">
                                  Address
                                </div>
                                <div class = "left">
                                  <label for="houseNo">House No.:</label>
                                  <input type="text" name="houseNo" id="houseNo" /><br><br>

                                </div>
                                <div class="right">
                                  <label for="street">Street:</label>
                                  <input type="text" name="street" id="street" /><br><br>
                                </div>
                              </div>
                            <div class = "perBox margint70">
                              <div class="titele center borderNow">
                                Employer
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
                            <div class = "perBox margint70">
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


                  <div class="btn paddingT80">
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
  </body>
</html>
