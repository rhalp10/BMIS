

<html>
    <head>
        <meta charset="utf-8"/>
        <title>REPORT MODULE</title>
        <link rel="stylesheet" href="css/firstview.css" type="text/css" />
        <style>
          .btn {
            border-radius: 8px;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 4px 10px;
    text-align: center;
    text-decoration: none;
    display:    inline-block
    font-size: 16px;
    margin: 0px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
     
}


.btn-success:hover {
    background-color: #008CBA;
    color: white;
}
            </style>
    </head>
    
       
    <body>
        <a  href="viewreport.php"><button  class='btn btn-success'> back </button><center></a><h1>UPLOAD FILE</h1></center>
        <br><br>
        
       
<?php
        session_start();
        $id=$_GET['id'];
        $pID= $_SESSION['positionID'];
        $dbh = new PDO("mysql:host=localhost;dbname=bmis_db","root", "");
        if(isset($_POST['btn'])){
            $title = $_POST['title'];
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $data = file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt = $dbh->prepare("insert into `report_data` ( `position_ID`, `report_ID`, `reportdata_date`, `Title`, `reportdata_type`,`reportdata_use`) values( '$pID',$id, NOW(), '$title', ?, ?)");
            $stmt->bindParam(1,$type);
            $stmt->bindParam(2,$data);
            $stmt->execute();
          echo "<script type='text/javascript'> alert('Successful'); </script>";
            header("location: view.php?id=$id");
        }
?>
<center>
   <form method="post" enctype="multipart/form-data">
	<input type="file" name="myfile"/>
    <input type="text" name="title"/>
	<button name="btn"> IMPORT </button>
</form>      
        </center>

        
        
    
    
    
    </body>

</html>