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
            var k1 = document.f.k1.value;
            var k2 = document.f.k2.value;
            var k3 = document.f.k3.value;
            var k4 = document.f.k4.value;

            var l1 = document.f.l1.value;
            var l2 = document.f.l2.value;
            var l3 = document.f.l3.value;
            var l4 = document.f.l4.value;

            var r1 = document.f.r1.value;
            var r2 = document.f.r2.value;
            var r3 = document.f.r3.value;
            var r4 = document.f.r4.value;

            var n1 = document.f.n1.value;
            var n2 = document.f.n2.value;
            var n3 = document.f.n3.value;
            var n4 = document.f.n4.value;

            var q = document.f.quarter.value;
            var f = $('#fyear').val();
            var t = document.f.tnc.value;
            var ca = document.f.ca.value;
            var ch = "";
            if (document.f.ch1[0].checked) {
                ch = "YES";
            } else if (document.f.ch1[1].checked) {
                ch = "NO";
            }
            var a = document.f.a1.value;
            var aa = document.f.a2.value;
            var ta = document.f.barangaychairman.value;
            var cch = "";
            if (document.f.cch1[0].checked) {
                cch = "YES";
            } else if (document.f.cch1[1].checked) {
                cch = "NO";
            }
            var cc = "";
            if (document.f.cc1[0].checked) {
                cc = "YES";
            } else if (document.f.cc1[1].checked) {
                cc = "NO";
            }
            var ccc = "";
            if (document.f.cc3[0].checked) {
                ccc = "YES";
            } else if (document.f.cc3[1].checked) {
                ccc = "NO";
            }
            var c = document.f.com.value;
            if (q == '' || f == '' || t == '' || ca == '' || ch == '' || a == '' || aa == '' || ta ==
                '' || cch == '' || cc == '' || ccc == '' || c == '') {

                alert('Please provide data in blank fields. Thank you!' + k1 + '');

            } else {

                var aconfirm = confirm('Saved?');

                if (aconfirm == true) {
                    $.ajax({
                        type: 'POST',
                        url: 'manilatodb.php',
                        data: {
                            q: q,
                            f: f,
                            t: t,
                            ca: ca,
                            ch: ch,
                            a: a,
                            aa: aa,
                            ta: ta,
                            cch: cch,
                            cc: cc,
                            ccc: ccc,
                            c: c,
                            k1: k1,
                            k2: k2,
                            k3: k3,
                            k4: k4,
                            l1: l1,
                            l2: l2,
                            l3: l3,
                            l4: l4,
                            r1: r1,
                            r2: r2,
                            r3: r3,
                            r4: r4,
                            n1: n1,
                            n2: n2,
                            n3: n3,
                            n4: n4
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
</head>
<style>
.text-left {
    text-align: left;
    margin-left: 5%;
}

.div.text-left1 {
    text-align: left;
    margin-left: 15%;
}

.row {
    margin-right: -15px;
    margin-left: 10%;
}

.table {
    background-color: #2980b9;
    width: 70%;

}


.btn-group-lg>.btn,
.btn-lg {
    padding: 10px;
    font-size: 20px;
    line-height: 1.3333333;
    border-radius: 6px;
}
</style>

<body>

    <header>
        <h1 align='left'> <a href="viewreport.php"><button class='btn btn-success'> back </button></a></h1>
    </header>


    <form name="f">
        <div class="whole">

            <center>

                <font face="Gordana" size="3">MANILA BAY CLEAN UP,REHABILITATION AND PRESERVATION PROJECT <br>Quarter:
                    <select name="quarter" required>
                        <option value="">Select quarter</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                    </select>
                    Quarter Year: <select id="fyear" required>
                        <option value="">Year</option>
                        <?php for ($year = date('Y'); $year > date('Y')-100; $year--) { ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <?php } ?>
                    </select>
                </font>
                <br> <br>
                <font face="Gordana" size="5"> <b> SOLID WASTE MANAGEMENT</b></font>
            </center>
            <br>
            <p class="text-left">
                <font face="Gordana" size="4"> <b>GENERAL INFORMATION</b></font>
            </p><br>
            <div class="row">
                <div class="col-sm-6">
                    <label1 for="exampleInputName2">Name of Barangay:</label1>
                    <?php echo $_SESSION['barangay']; ?>
                    <br>
                    <br>
                    <label1 for="exampleInputName2">Provincial Location:Cavite</label1>

                    <br>
                    <br>
                    <?php
				 include('dbcon.php');  
 $query ="SELECT COUNT(res_ID) AS total FROM resident_detail";  
 $result = mysqli_query($db, $query);  
     $row = mysqli_fetch_assoc( $result );
$num_rows=$row['total'];
		   $_SESSION['totalpopulation'] = $num_rows;
		   
		   
		   
		   ?>
                    <label1 for="exampleInputName2">Total Population: <?php echo $num_rows;?></label1>


                </div>
                <div class="col-sm-6">
                    <label1 for="exampleInputName2">Municipality: INDANG</label1>

                    <br>
                    <br>
                    <label1 for="exampleInputName2">Regional Location:IV-A(CALABARZON)</label1>

                    <br>
                    <br><?php
 $query1 ="SELECT COUNT(DISTINCT address_House_No) as total FROM `resident_address`";  
 $result1 = mysqli_query($db, $query1);  
     $row1 = mysqli_fetch_assoc( $result1 );
$num_rows1=$row1['total'];
		   $_SESSION['totalhousehold'] = $num_rows1;
		   
		   
		   
		   
		   ?>
                    <label1 for="exampleInputName2">No. of Households: <?php echo $num_rows1;?></label1>

                </div>
            </div>


            <p class="text-left">
                <font face="Gordana" size="4"> <b>MANDATORY SEGREGATION OF WASTES AT SOURCE</b></font>
            </p><br>


            <p style="float:left; margin-left: 100px;"><b>12. Determine the compliance rate of the Barangay.</b></p>
            <br><br><br>
            <div class="row">
                <div class="col-sm-6">
                    <p> <b>3.1</b> Total number of households:
                        <?php echo $num_rows1;?></p>


                    <p><b>3.2</b> Total number of compliant households:
                        <input type="text" name="tnc" size="25" required>
                    </p>

                    <p><b>3.3</b> Computed average*(Use Formula below
                        <input type="text" name="ca" required size="25">
                    </p>

                </div>
            </div>

            <br>
            <p style="float:left; margin-left: 100px;"><b>13. Based on the computd average, is th Barangay
                    compliant?</b></p>
            <br><br><br>
            <div class="row">
                <div class="col-sm-6">
                    <p> If average is 70% or higher, tick "Yes"</p>
                    <p> If average is 69% or lower, tick "No"</p>
                    <input type="radio" name="ch1" value="1"> YES
                    <input type="radio" name="ch1" value="0"> NO <br>


                </div>
            </div>

            <p style=" text-align:left; margin-left:100px;">*The Barangay much reach a minimum rate of 70% to be
                considered as compliant</p>
            <br>

            <p class="text-left">
                <font face="Gordana" size="4"> <b>FUNCTIONAL MATERIALS RECOVERY FACILITY</b></font>
            </p><br>

            <p style="text-align:left; margin-left:100px;"><b>14. Determine the compliance rate of the Barangay.</b></p>
            <br>


            <center>
                <div class="table-responsive">
                    <table class="table table-bordered">

                        <tr>
                            <th rowspan="1" style="color:white;text-align:left;">Is there an existing MRF servicing the
                                Barangay, whether individual, cluster or municipal? (50%)</th>

                            <th style="background-color:white"><input type="number" required name="a1" size="25"></th>

                        <tr>
                            <th rowspan="1" style="color:white;text-align:left;">Does the existing MRF with an
                                operational solid waste transfer station or sorting station, drop-off center, a
                                composting facility and a recycling facility?(50%)</th>
                            <th style="background-color:white"><input type="number" name="a2" required size="25"></th>
                        </tr>


                        <tr>
                            <th rowspan="1" style="color:white;text-align:left;">TOTAL</th>
                            <th style="background-color:white"><input type="text" required name="barangaychairman"
                                    size="25"></th>
                        </tr>



                    </table>
                </div>
            </center>

            <br>
            <p style="text-align:left; margin-left:100px;"><b>15. Based on the total is the LGU compliant?</b></p><br>

            <div class="row">
                <div class="col-sm-6">
                    <p>
                        <font face="verdana" size="3"> If score is 100% , tick "Yes" </font>
                    </p>
                    <p> Otherwise, tick "No"</p>
                    <input type="radio" name="cch1" value="1"> YES
                    <input type="radio" name="cch1" value="0"> NO <br>

                    <br>
                </div>
            </div>


            <p class="text-left">
                <font face="Gordana" size="4"> <b>NO-LITTERING AND RELATED ORDINANCE</b></font>
            </p><br>

            <p style="text-align:left; margin-left:100px;"><b>16.The Barangay has a No-Littering ordinance</b></p><br>

            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" name="cc1" value="1">YES
                    <input type="radio" name="cc1" value="0"> NO <br>


                    <br>

                </div>
            </div>


            <p style="text-align:left; margin-left:100px;"><b>17.If "Yes", is the ordinance strictly implemented?
                    (conduct a random ocular inspection)</b></p><br>
            <div class="row">
                <div class="col-sm-6">
                    <input type="radio" name="cc3" value="1"> YES
                    <input type="radio" name="cc3" value="0"> NO <br>

                </div>
            </div>
            <br>


            <p class="text-left">
                <font face="Gordana" size="4"> <b>NEXT STEPS</b></font>
            </p><br>









            <center>

                <div class="table-responsive">
                    <table class="table table-bordered">


                        <tr>
                            <th style="color:white">KEY LEGAL PROVISION</th>
                            <th style="color:white">LEGAL CONSEQUENCES</th>
                            <th style="color:white">REASON FOR LOW-COMPLIANCE</th>
                            <th style="color:white">NEXT STEPS</th>

                        </tr>
                        <tr bgcolor="white">
                            <th><input type="text" name="k1" size="25"></th>
                            <th><input type="text" name="l1" size="25"></th>
                            <th><input type="text" name="r1" size="25"></th>
                            <th><input type="text" name="n1" size="25"></th>
                        </tr>
                        <tr bgcolor="white">
                            <th><input type="text" name="k2" size="25"></th>
                            <th><input type="text" name="l2" size="25"></th>
                            <th><input type="text" name="r2" size="25"></th>
                            <th><input type="text" name="n2" size="25"></th>
                        </tr>
                        <tr bgcolor="white">
                            <th><input type="text" name="k3" size="25"></th>
                            <th><input type="text" name="l3" size="25"></th>
                            <th><input type="text" name="r3" size="25"></th>
                            <th><input type="text" name="n3" size="25"></th>
                        </tr>
                        <tr bgcolor="white">
                            <th><input type="text" name="k4" size="25"></th>
                            <th><input type="text" name="l4" size="25"></th>
                            <th><input type="text" name="r4" size="25"></th>
                            <th><input type="text" name="n4" size="25"></th>
                        </tr>
                    </table>
                </div>
            </center>
            <br>
            <p class="text-left">
                <font face="Gordana" size="4"> <b>ACCOMPLISHED BY:</b></font>
            </p><br>
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="com" size="40" required><br>
                    <label> Committee Chairman on Environment</label><br>

                    <br>

                </div>
            </div>




            <p class="text-left">
                <font face="Gordana" size="4"> <b>CERTIFIED TRUE AND CORRECT:</b></font>
            </p><br>
            <div class="row">


                <div class="col-sm-6">
                    <?php echo $_SESSION['captain'];?><br>
                    <label> Punong Barangay</label>
                </div>
            </div>
            <br>





            <br>
            <br>

            <p class="text-center">
                <input readonly class="btn btn-primary btn-lg active" id="save" value="Save">
            </p>

        </div>
    </form>
</body>

</html>