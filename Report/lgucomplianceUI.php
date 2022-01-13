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
    function chk() {
        function chk() {
            var waw = "";
            var chb = ['0', '0', '0', '0', '0', '0', '0'];
            var chh = document.getElementByClassName('barangaychairman');
            for (1 = 0; 1 < 7; i++) {
                if (chh[i].checked === true) {
                    chb[i] = 1;
                } else {
                    chb[i] = 1;
                }
                waw += '' + chb[i] + '';
            }
            document.getElementById('wow').value = "fuck";
        }
        document.getElementById('wow').value = "fuck";
    }
    </script>


    <center>
        <style>
        input[type=text],
        select {
            width: 45%;
            padding: 12px 20px;

            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=texttable],
        select {
            width: 60%;



            border: 1px;
            border-radius: 0px;
            box-sizing: border-box;

        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;

        }

        .btn-group-lg>.btn,
        .btn-lg {
            padding: 10px 25px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        </style>
</head>

<body>

    <header>
        <h1 align='left'> <a href="viewreport.php"><button class='btn btn-success'> back </button></a></h1>
    </header>




    <form>


        <left>
            <p>
            <h5>
                <font face="Times new roman"><b>Dengue Monitoring Form</b></font>
            </h5>
            </p>
        </left>

        <center>

            <font face="Times new roman">
                <h4>LGU COMPLIANCE TO AKSYON BARANGAY KONTRA DENGUE (ABKD)<br>DILG MC NO.2017 - 2018<br>FOR <input
                        style="width: 30%; " type="text" name="month" placeholder="Enter month" required> CY <input
                        style="width: 30%; " type="text" name="year" placeholder="Enter year" required></h4>
            </font>
        </center>
        <br>

        <left>
            <p><b>
                    <h4>Region: IV-A CALABARZON <br>
                        Province: CAVITE <br>
                        Municipality: INDANG
                </b></h4>

            </p>
        </left>







        <center>
            <br>
            <br>
            <table border="1">
                <tr>
                    <th>BARANGAY (a)</th>
                    <enter>
                        <th colspan="3">Presence/Absence (b)</th>
                        <th colspan="4">Action/Strategies Undertaken to Intensity Anti-Dengue Campaign (c)</th>
                        <th>No. of Dengue Cases</th>
                        <th>Remarks</th>

                </tr>



                <tr style="text-align:center;">

                    <td></td>
                    <th>Ordinance (b1)</th>
                    <th>Fund Allocation (b2)</th>
                    <th>Distribution Center (b3)</th>
                    <th>Distribution of IEC Campaign (c1)</th>
                    <th>Anti- Dengue Campaign (c2)</th>
                    <th>Clean-up Drive (c3)</th>
                    <th>OL-Trap System Application</th>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td><input type="text" name="barangaychairman1" required></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="checkbox" class="barangaychairman[]" value="1"></td>
                    <td><input type="text" name="barangaychairman9"></td>
                    <td><input type="text" name="barangaychairman10"></td>

                </tr>















            </table>






        </center>
        <br>


        <b>
            <label1 for="exampleInputName2">Prepared By:</label1><br>
        </b>
        <input name="sec" type="text" readonly value="<?php echo $_SESSION['secretary']; ?>"> <br>
        <label1 for="exampleInputName2">Barangay Secretary/Lupon Secretary</label1> <br><br>



        <b>
            <label1 for="exampleInputName2">Attested By:</label1><br>
        </b>
        <input name="capt" type="text" readonly value="<?php echo $_SESSION['captain']; ?>"> <br>
        <label1 for="exampleInputName2">Punong Barangay</label1> <br><br>


        <center>
            <br>

            <p class="text-center">
                <input type="submit" value="Submit" onclick="chk()" name="submit" class="btn btn-primary btn-lg active">
            </p>
            <input type="text" id="wow">
            </section>

    </form>



</body>

</html>