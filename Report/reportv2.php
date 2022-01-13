<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management Information System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
    <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">



</head>

<body style="font-family: calibri; font-size: 20px; ">



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="width:800px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"
                        style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT
                        INFORMATION</h4>
                </div>

                <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars("PHP_SELF");?>">


                    <div class="modal-body">
                        <br>
                        <br>

                        <h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">PERSONAL
                            INFORMATION</h4>
                        <br>
                        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                        <style type="text/css">
                        .thumb-image {
                            float: left;
                            width: 250px;
                            height: 200px;
                            position: relative;
                            padding: 5px;
                        }
                        </style>
                        <div class="col-lg-offset-4" id="image-holder">
                        </div>
                        <div class="clearfix"></div>



                        <script>
                        function numbersOnly(input) {
                            var regex = /[^0-9]/gi;
                            input.value = input.value.replace(regex, "");
                        }
                        </script>
                        <?php  
         include('dbcon.php');  
         $query ="SELECT rd.res_ID ,
         rd.res_fName ,
         rd.res_mName ,
         rd.res_lName ,
         sfx.suffix,
         rd.res_Bday ,
         rms.marital_Name,
         rg.gender_Name,
         rr.religion_Name,
         rc.country_nationality,
         rc.country_citizenship,
         ro.occupation_Name,
         ros.occuStat_Name,
         rd.res_Date_Record FROM resident_detail rd 
         LEFT JOIN ref_suffixname sfx ON rd.suffix_ID = sfx.suffix_ID 
         LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
         LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
         LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
         LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
         LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
         LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID";  
         $result = mysqli_query($db, $query);  
         ?>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="mytable">
                                    <thead>
                                        <tr>
                                            <th scope="col-2">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Citizenship</th>
                                            <th scope="col">Occupation</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php  
                  while($row = mysqli_fetch_array($result))  
                       {  
                          ?>
                                    <tr>

                                        <td><?php echo $row["res_fName"]?> <?php echo $row["res_mName"]?>
                                            <?php echo $row["res_lName"]?> <?php echo $row["suffix"]?></td>
                                        <td><?php echo $row["gender_Name"]?></td>
                                        <td><?php echo $row["country_citizenship"]?></td>
                                        <td><?php echo $row["occupation_Name"]?></td>
                                        <td><?php echo $row["occuStat_Name"]?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="profile-final.php?id=<?php echo $row['res_ID'] ?>"
                                                    class="btn btn-primary btn-xs">View</a>
                                                <?php if($_SESSION['position']!="Barangay Captain"){ echo '<a href="edit.php?id='.$row['res_ID'].'" class="btn btn-info btn-xs">Edit</a>';} ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                  }
                  ?>
                                    <tfoot>
                                        <tr>
                                            <th scope="col-2">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Citizenship</th>
                                            <th scope="col">Occupation</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <br>


                        <script>
                        $('#image').bind('change', function() {
                            var filename = $("#image").val();
                            if (/^\s*$/.test(filename)) {
                                $(".file-upload").removeClass('active');
                                $("#noFile").text("No file chosen...");
                            } else {
                                $(".file-upload").addClass('active');
                                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
                            }
                        });
                        </script>

                        <script type="text/javascript">
                        function getAge() {
                            var dob = document.getElementById('res_bdate').value;
                            dob = new Date(dob);
                            var today = new Date();
                            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                            document.getElementById('res_age').value = age;
                        }
                        </script>


                        <script src="jquery/jquery-3.3.1.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="vendor/js/jquery.dataTables.min.js"></script>
                        <script src="vendor/js/dataTables.bootstrap.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            var table = $('#mytable').removeAttr('width').DataTable();
                        });
                        </script>


                        <script>
                        $(document).ready(function() {
                            $('#insert').click(function() {
                                var image_name = $('#image').val();
                                if (image_name == '') {
                                    alert("Please Select Image");
                                    return false;
                                } else {
                                    var extension = $('#image').val().split('.').pop().toLowerCase();
                                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -
                                        1) {
                                        alert('Invalid Image File');
                                        $('#image').val('');
                                        return false;
                                    }
                                }
                            });
                        });
                        </script>
                        <script type="text/javascript">
                        var uploadField = document.getElementById("image");

                        uploadField.onchange = function() {
                            if (this.files[0].size > 307200) {
                                alert("File is too big! Choose picture with less than 300 kb size.");
                                this.value = "";
                            };
                        };
                        </script>
                        <script>
                        $(document).ready(function() {
                            $("#image").on('change', function() {
                                //Get count of selected files
                                var countFiles = $(this)[0].files.length;
                                var imgPath = $(this)[0].value;
                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1)
                            .toLowerCase();
                                var image_holder = $("#image-holder");
                                image_holder.empty();
                                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                    if (typeof(FileReader) != "undefined") {
                                        //loop for each file selected for uploaded.
                                        for (var i = 0; i < countFiles; i++) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                $("<img />", {
                                                    "src": e.target.result,
                                                    "class": "thumb-image"
                                                }).appendTo(image_holder);
                                            }
                                            image_holder.show();
                                            reader.readAsDataURL($(this)[0].files[i]);
                                        }
                                    } else {
                                        alert("This browser does not support FileReader.");
                                    }
                                } else {
                                    alert("Pls select only images");
                                }
                            });
                        });
                        </script>

</body>

</html>