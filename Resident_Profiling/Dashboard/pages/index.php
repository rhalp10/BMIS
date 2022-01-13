<?php 
include('connections.php'); 
 $query ="SELECT COUNT(res_ID) AS total FROM resident_detail";  
 $result = mysqli_query($db, $query);  
     $row = mysqli_fetch_assoc( $result );
$num_rows=$row['total'];


$query11 = 0;
$query111 = 0;
$query1111 = 0;
$query11111 = 0;
  
 $query1 ="SELECT res_Bday FROM resident_detail";  
 $result1 = mysqli_query($db, $query1);  
  while ($row=mysqli_fetch_array($result1))
      {
      
      $today = date('Y-m-d');
      
      $dob = $row['res_Bday'];
         $age = $today-$dob;
     
            if($age==0){
                
               $query11++; 
            }
      elseif($age<0 && $age>13){
           $query111++; 
      }
       
      elseif($age>60){
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



 </head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">DASHBOARD</a>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                           
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Resident Graph<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="sample.php">Flot Charts</a>
                                </li>
                         </ul>
                            
                        </li>
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i> Residents</a>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Add Resident</a>
                        </li>
                        
                        
                    </ul>
                </div>
                
            </div>
         
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    
                                </div>
                               
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><label><?php echo $num_rows; ?></label></div>
                                    <div>Total Resident</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 <div class="col-lg-2 col-md-6">
                    <div class="panel panel-yellow">
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
                  <div class="col-lg-2 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $query111; ?></div>
                                    <div>Junior</div>
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
                 <div class="col-lg-2 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $query1111; ?></div>
                                    <div>Teens</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
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

   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          
        
          ['Infant', <?php echo $query11; ?>],
          ['Junior', <?php echo $query111; ?>],
            ['Teens', <?php echo $query1111; ?>],
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
    <b><p>Copyright 2018 || Barangay Management Information System</p></b>
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
