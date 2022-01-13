<?php  
    include('connections.php');
    $query ="SELECT COUNT(res_ID) AS total FROM resident_detail";  
    $result = mysqli_query($db, $query);  
    $row = mysqli_fetch_assoc( $result );
    $num_rows=$row['total'];


    $query11 = 0;
    $query111 = 0;
    $query1111111 = 0;
    $query1111 = 0;
    $query11111 = 0;
  
    $query1 ="SELECT res_Bday FROM resident_detail";  
    $result1 = mysqli_query($db, $query1);  
    $today = date('Y-m-d');
        
    while ($row=mysqli_fetch_array($result1)){
        $dob = $row['res_Bday'];

        $diff = date_diff(date_create($dob), date_create($today));
        
        $age= $diff->format('%y');
        if($age==0){
            $query11++; 
        }
        elseif($age>=1 && $age<12){
            $query1111111++; 
        }
        elseif($age>=13 && $age<=19){
            $query111++; 
        }
        elseif($age>=20 && $age<=59){
            $query1111++; 
        }
        else{
            $query11111++; 
        }
        
    }  
 ?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../js/loader1.js"></script>

</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <center>
                <h3 class="page-header">Resident Profiling Dashboard</h3>
            </center>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $num_rows; ?></div>
                            <div>Total Residents</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $query11; ?></div>
                            <div>Infants</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="col-md-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $query1111111; ?></div>
                            <div>Children</div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



        <div class=" col-md-4">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $query111; ?></div>
                            <div>Teens</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $query1111; ?></div>
                            <div>Adult</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">

                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $query11111; ?></div>
                            <div>Senior Citizen</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

    <div>


        <script src="../js/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],


                ['Infant', <?php echo $query11; ?>],
                ['Children', <?php echo $query1111111; ?>],
                ['Teens', <?php echo $query111; ?>],
                ['Adult', <?php echo $query1111; ?>],
                ['Senior Citizen', <?php echo $query11111; ?>]

            ]);

            var options = {
                title: 'Resident Population Graph'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
        </script>

        <body>
            <div id="piechart" style="width: 1200px; height: 800px;"></div>
        </body>
        <footer>
            <b>
                <p class="fl_right">Copyright &copy; 2018 - All Rights Reserved | De Guzman </p>
            </b>
        </footer>



    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>