<?php
session_start();
?>

<ul class="nav navbar-nav">

			<li><a href="index.php" style="color: #f2f2f2;">Home</a></li>
<?php 
if ($_SESSION['position']=='Barangay Secretary')
echo'
            <li><a href="chart.php" style="color: #f2f2f2;">Officials</a></li>
            <li><a href="add.php" style="color: #f2f2f2;">Add</a></li>';?>
          </li>
      </ul>