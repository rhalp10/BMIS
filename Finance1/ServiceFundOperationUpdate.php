<?php 
session_start();

    $id = $_GET['id'];


 ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal Services</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">

<div class="head"><font size="5">Personal Services Update</font></div>
<br><br>
		<section id="asd" class="asds">

	    <article>
            
			<center>
                <form method="post" action="ServiceFundOperationUpdateExec.php">
				
			<?php
				include('dbcon.php');
            $query1 = $con->query("SELECT * FROM finance_fundoperation_ps WHERE service_id = '$id'");
		$row1=mysqli_fetch_assoc($query1);
         
			?>
			
			
				<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>
				<td><div class="form-group col-md-4">
					<label for="service_id">Service ID</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required name="service_id" size="50"></td>
			</div>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="service_code">Account Code</label>
				<td><input type="number" class="form-control" value="<?php echo $row1["service_code"]; ?>" required name="service_code" size="50">
			</tr>
			<br>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="service_type">Service Type</label>
				<td><input type="text" class="form-control" value="<?php echo $row1["service_type"]; ?>" required name="service_type" size="50">
			</tr>
			<br>
	
</table>
		<button type="submit" value="Submit" class="btn btn-success">Submit</button>
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" required name="id">
                </form>

			</center>
		

            		

		</article>
        </section>
		
		
	</div>

</body>
</html>
		
							
							
							
		
