<?php 
session_start();

    $iid = $_GET['id'];


 ?> 
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
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">

<div class="head"><font size="5">Clearance Price Update</font></div>
<br><br>
		<section id="asd" class="asds">

	    <article>
            
			<center>
                <form method="post" action="ClearanceSetUpdateExec.php">
				
			<?php
				include('dbcon.php');
				$query = $con->query("SELECT * FROM finance_clearance_set WHERE purpose_id = '$iid'");
		      $row=mysqli_fetch_assoc($query);
         
             $eto = $row['clearance_id'];
            $query1 = $con->query("SELECT * FROM finance_clearance_list WHERE clearance_id = '$eto'");
		$row1=mysqli_fetch_assoc($query1);
         
			?>
			
			
				<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>	
                <div class="form-group col-md-4">	
                <td>   
					<label for="clearance_form">Clearance Form</label>
                </td>
		        <td>
			
					
			<select name="clearance_id" class="form-control" readonly value="<?php echo $row["clearance_form"]; ?>" required name="clearance_form">
				<option value="<?php echo $iid; ?>"><?php echo $row1['clearance_form']; ?></option>
				
			</select>
		</td>
                </div>
	</tr>
	

			<br>
			<tr>
                <div class="form-group col-md-4">
                <td><label for="purpose">Purpose</label></td>
      			
				<td><input type="text" class="form-control"  readonly value="<?php echo $row["purpose"]; ?>" required name="purpose" method="POST"></td>
			</div>
			</tr>
			<br>

			<br>
			<tr>
                <td><div class="form-group col-md-4"><label for="price">Price</label></div></td>
                    <td><input type="number" class="form-control" value="<?php echo $row["price"]; ?>" required name="price"></td>
			</tr>
			<br>
	
</table>
		<button type="submit" value="Submit" class="btn btn-success">Submit</button>
                    <input type="hidden" class="form-control" value="<?php echo $iid; ?>" required name="iiid">
                </form>

			</center>
		

            		

		</article>
        </section>
		
		
	</div>

</body>
</html>
		
							
							
							
		
