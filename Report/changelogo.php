<html>

<head>
    <meta charset="utf-8" />
    <title>REPORT MODULE</title>
    <link rel="stylesheet" href="css/firstview.css" type="text/css" />
    <style>
    .btn {
        border-radius: 8px;
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 4px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 0px;
        -webkit-transition-duration: 0.4s;
        /* Safari */
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
    <a href="logosettings.php"><button class='btn btn-success'> BACK </button></a>
    <br><br>


    <?php
       session_start();
	   $ieto = $_GET['id'];
        // $dbh = new PDO("mysql:host=localhost;dbname=bmis_db","root", "",3307);
        include('dbcon.php');
        if(isset($_POST['btn'])){
         
            $name = $_FILES['myfile']['name'];
            $type = $_FILES['myfile']['type'];
            $data = file_get_contents($_FILES['myfile']['tmp_name']);
			if($type=="image/jpg"||$type=="image/PNG"){
				// $stmt = $dbh->prepare("UPDATE `ref_logo` SET `logo_img` = ? WHERE `logo_ID` = '$ieto'");

                include('dbcon.php');
                $query = "UPDATE `ref_logo` SET `logo_img` = ? WHERE `logo_ID` = '$ieto'";
                $res = mysqli_query($db,$query);

                // $stmt->bindParam(1,$data);
                // $stmt->execute();
                echo "<script type='text/javascript'> alert('Successful'); </script>";
                header("location: logosettings.php");
			}
            else{
				echo "<script type='text/javascript'> alert('Please select PNG/png file only.'); </script>";
			}
           
        }
?>
    <center>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile" class='btn btn-success' />
            <button name='btn'> REPLACE </button>
        </form>
    </center>






</body>

</html>