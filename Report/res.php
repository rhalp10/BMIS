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
                <h1><a href="viewreport.php"><button class='btn btn-success'> Back </button></a>
                    &emsp;&emsp;&emsp;Report > Resident Information</h1>
            </td>
        </tr>
        <br>
        <div class="table-responsive">

            <form method="post" target="_blank" action="resident-export.php">
                <table class="table table-bordered" id="mytable">
                    <thead>

                        <tr>

                            <th Style="width:70%;" scope="col-2">Category</th>
                            <th Style="width:30%;" scope="col">Action</th>

                        </tr>


                    </thead>


                    <tr>
                        <td>All resident</td>
                        <td><button type="submit" name="resident"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button>
                            <button type="submit" name="residentpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>


                    <tr>
                        <td>Adult
                        </td>
                        <td><button type="submit" name="Adult"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="Adultpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Death
                        </td>
                        <td><button type="submit" name="death"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="deathpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Employed
                        </td>
                        <td><button type="submit" name="employed"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="employedpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Female
                        </td>
                        <td><button type="submit" name="female"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="femalepdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Infant
                        </td>
                        <td><button type="submit" name="Infant"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="Infantpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Male
                        </td>
                        <td><button type="submit" name="male"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="malepdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>


                    <tr>
                        <td>Minor
                        </td>
                        <td><button type="submit" name="Minor"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="Minorpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Pregnant
                        </td>
                        <td><button type="submit" name="preg"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="pregpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Senior
                        </td>
                        <td><button type="submit" name="Senior"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="Seniorpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>
                    <tr>
                        <td>Teenager
                        </td>
                        <td><button type="submit" name="Teen"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="Teenpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>

                    <tr>
                        <td>Unemployed
                        </td>
                        <td><button type="submit" name="unemployed"
                                class="btn btn-success">&emsp;&nbsp;&nbsp;Excel&emsp;&nbsp;&nbsp;&nbsp&nbsp</button><button
                                type="submit" name="unemployedpdf" class="btn btn-danger"
                                margin-top>&emsp;&emsp;Pdf&emsp;&emsp;&nbsp;</button></td>
                    </tr>




                </table>
            </form>
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


</body>

</html>