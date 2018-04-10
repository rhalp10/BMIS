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
    <title>Maintenance and Other Operating Expense</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">

<div class="head"><font size="5">Maintenance Fun Operation Update</font></div>
<br><br>
		<section id="asd" class="asds">

	    <article>
            
			<center>
                <form method="post" action="MOOEFundOperationSetUpdateExec.php">
				
			<?php
				include('dbcon.php');
            $query1 = $con->query("SELECT finance_fundoperation_mooe.mooe_type,
							finance_fundoperation_mooe.mooe_code, finance_fundoperation_mooeset.mooe_amount, finance_fundoperation_mooeset.mooe_year,finance_fundoperation_mooeset.mooe_setid FROM finance_fundoperation_mooe INNER JOIN finance_fundoperation_mooeset
							WHERE finance_fundoperation_mooeset.mooe_setid='$id'");
			$row1=mysqli_fetch_assoc($query1);

			?>
			
			
				<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>
				<td><div class="form-group col-md-4">
					<label for="mooe_id">Maintenance ID</label>
				<td><input type="text" class="form-control" readonly value="<?php echo $id; ?>" required name="mooe_id" size="50" disabled></td>
			</div>
			</tr>

			<tr>	
                <div class="form-group col-md-4">	
                <td>   
					<label for="mooe_type">Maintenance Type</label>
                </td>
		        <td>
			
					
			<select name="mooe_type" class="form-control" value="<?php echo $row2["mooe_type"]; ?>" required disabled>
				<option value="<?php echo $id; ?>"><?php echo $row1["mooe_type"]; ?></option>
				
			</select>
		</td>
                </div>
	</tr>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="mooe_code">Account Code</label>
				<td><input type="text" class="form-control" value="<?php echo $row1["mooe_code"]; ?>" required name="mooe_code" size="50" disabled>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="mooe_amount">Amount</label>
				<td><input type="text" class="form-control" value="<?php echo $row1["mooe_amount"]; ?>" required name="mooe_amount" size="50">
			</tr>

			<tr>
				<td><div class="form-group col-md-4">
      			<label for="mooe_year">Year</label>
				<td><input type="text" class="form-control" value="<?php echo $row1["mooe_year"]; ?>" required name="mooe_year" size="50">
			</tr>

	
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
		
							
							
							
		
