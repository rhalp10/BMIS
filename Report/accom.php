<?php
session_start();
?>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    function show_confirm() {
        var a = confirm("Are you sure you want to save this file?")
        if (a == true) {
            window.location = "covtodb.php"

        }

    }
    </script>
</head>

<body>

    <header>
        <h1 align='left'> <a href="cvalid.php"><button class='btn btn-success'> back </button></a></h1>
    </header>

    <section align='center'>


        <style>
        .btn-group-lg>.btn,
        .btn-lg {
            padding: 10px 25px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        </style>
        <p>
            <center>
                <font face="Gordana" size="4">Republic of the Philippines <br> Department of Interior and Local
                    Government <br>Province of Cavite <br> Municipality of Indang <br> <label> BARANGAY </label> <label
                        type="text" name="barangay" id="barangay" value="<?php echo $_SESSION['barangay'];?>">
                        <?php echo $_SESSION['barangay'];?></label></font>
        </p>
        <p>
            <br>
            <center>
                <font face="Gordana" size="4">OFFICE OF THE PUNONG BARANGAY</font>
                <hr>
                <br>
                <center>
                    <font face="Gordana" size="5">CERTIFICATE OF VALIDATION</font>
                    <br>
                    <br>
                    <br>
                    <label>
                        <center>
                            <font face="Times New Roman" size="3"> THIS IS TO CERTIFY that based on the Barangay Blotter
                                Book, <?php echo $_SESSION['covtotal']; ?><br><label> complaint was received/ handled by
                                    this Barangay for the period of 01 to &nbsp; <?php echo $_SESSION['covperiod']; ?>
                                    . </label></font>
        </p>

        <br>
        <br>
        <br>
        <br>


        <font face="Gordana" size="3"><input type="text" name="barangaychairman"
                value="<?php echo $_SESSION['captain']; ?>"><br>
            <label> BARANGAY CAPTAIN</label>
            </p>
            <br>
            <p class="text-center">
                <button onclick="show_confirm()" class="btn btn-primary btn-lg active" role="button">Save</button>
            </p>




    </section>

</body>

</html>