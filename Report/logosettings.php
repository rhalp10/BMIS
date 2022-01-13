<?php 
session_start();
include('official.php');
include('checkposition.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="nf/css/bootstrap.min.css" rel="stylesheet">
    <link href="nf/css/css/mis.css" rel="stylesheet">
    <link href="nf/vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <link href="Style.css" type="text/css" rel="stylesheet">

    <style>
    table {
        border-collapse: collapse;
        width: 50%;
    }

    th,
    td {
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>





    <div class="container">
        <tr>
            <td>
                <h1><a href="viewreport.php"><button class='btn btn-success'> Back </button></a> &emsp;&emsp;&emsp;Logo
                    Settings</h1>
            </td>
        </tr>
        <br>
        <div class="table-responsive">

            <table class="table table-bordered" id="mytable">
                <?php
    include('dbcon.php');
					$sqlngbmis = "SELECT * FROM ref_logo";  
$resultngbmis = mysqli_query($db, $sqlngbmis); 
;
 	
	

					

					while($rowngbmis = mysqli_fetch_array($resultngbmis)){
						
						
                                echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($rowngbmis['logo_img'] ).'" height="100" width="100" class="img-circle img-responsive"/>  
                               </td>  
							   <td>'.$rowngbmis['logo_Name'].'</td>
							   <td class="btt"><a  href="changelogo.php?id='.$rowngbmis['logo_ID'].'"><button  class="btn btn-success"> CHANGE  </button></a></td>
                          </tr>  
                     ';
                                
                            
								
                        
							
							
							
						}
					
					?>


        </div>

    </div>


    <script src="nf/jquery/jquery-3.3.1.min.js"></script>
    <script src="nf/js/bootstrap.min.js"></script>
    <script src="nf/vendor/js/jquery.dataTables.min.js"></script>
    <script src="nf/vendor/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#mytable').removeAttr('width').DataTable();
    });
    </script>

    <script language="javascript">
    function deleteme(delid) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = 'delete.php?id=' + delid + '';
            return true;
        }
    }
    </script>
</body>

</html>