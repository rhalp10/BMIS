
<?php
include("connections.php");
 
$death="";
                           $rowSQL = mysqli_query($db, "SELECT COUNT( res_id ) AS death FROM `resident_death`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $death = $row['death'];
                                    
                               

                                  
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
          ['Total Population',  11],
          ['Deaths',  5],
          ['Teens',  2],
          ['Infant', 2],
          ['Deaths', 7]
        ]);

        var options = {
          title: 'Resident Population Report'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
    <div id="piechart" style="width: 120%; height: 120%;"></div>
  </body>
</html>