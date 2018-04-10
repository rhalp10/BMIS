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

<div class="head"><font size="5">Non-Office Expenditure Update</font></div>
<br><br>
		<section id="asd" class="asds">

	    <article>
            
			<center>
                <form method="post" action="NOEFundOperationSetUpdateExec.php">
				
			<?php
				include('dbcon.php');
            $query1 = $con->query("SELECT finance_fundoperation_noe.noe_type,finance_fundoperation_noe.noe_code, finance_fundoperation_noeset.noe_amount, finance_fundoperation_noeset.noe_year FROM finance_fundoperation_noe INNER JOIN finance_fundoperation_noeset
							WHERE finance_fundoperation_noeset.noe_setid='$id'");
			$row1=mysqli_fetch_assoc($query1);

			?>
			
			
				<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>
				<td><div class="form-group col-md-4">
					<label for="noe_id">Non-Office Expenditure ID</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required name="noe_id" size="50"></td>
			</div>
			</tr>

			<tr>	
                <div class="form-group col-md-4">	
                <td>   
					<label for="noe_type">Non-Office Expenditure Type</label>
                </td>
		        <td>
			
					
			<select name="noe_type" class="form-control" readonly value="<?php echo $row2["noe_type"]; ?>" required>
				<option value="<?php echo $id; ?>"><?php echo $row1["noe_type"]; ?></option>
				
			</select>
		</td>
                </div>
	</tr>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="noe_code">Account Code</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $row1["noe_code"]; ?>" required name="noe_code" size="50">
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="noe_amount">Amount</label>
				<td><input type="number" class="form-control" value="<?php echo $row1["noe_amount"]; ?>" required name="noe_amount" size="50">
			</tr>

			<tr>
				<td><div class="form-group col-md-4">
      			<label for="noe_year">Year</label>
				<td><input type="number" class="form-control" value="<?php echo $row1["noe_year"]; ?>" required name="noe_year" size="50">
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
		
							
							
							
		
