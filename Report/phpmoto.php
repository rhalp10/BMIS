 <!DOCTYPE html>
 <html>

 <head>
     <title>Webslesson Tutorial | Multiple Image Upload</title>
     <script src="js/jquery.min.js"></script>
 </head>

 <body>
     <br /><br />
     <div class="container" style="width:500px;">
         <form id="submit_form">
             <label>Name</label>
             <input type="text" name="name" id="name" class="form-control" />
             <br />
             <label>Message</label>
             <textarea name="message" id="message" class="form-control"></textarea>
             <br />
             <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
             <span id="error_message" class="text-danger"></span>
             <span id="success_message" class="text-success"></span>
         </form>
     </div>
 </body>

 </html>
 <script>
$(document).ready(function() {
    $('#submit').click(function() {
        var name = $('#name').val();
        var message = $('#message').val();
        if (name == '' || message == '') {
            $('#error_message').html("All Fields are required");
        } else {
            $('#error_message').html('');
            $.ajax({
                url: "phpinsert.php",
                method: "POST",
                data: {
                    name: name,
                    message: message
                },
                success: function(data) {
                    $("form").trigger("reset");
                    $('#success_message').fadeIn().html(data);
                    setTimeout(function() {
                        $('#success_message').fadeOut("Slow");
                    }, 2000);
                }
            });
        }
    });
});
 </script>