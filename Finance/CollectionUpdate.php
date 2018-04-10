<?php 
session_start();
 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Collection Update</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css/mis.css" rel="stylesheet">
      <link href="vendor/css/dataTables.bootstrap.min.css" rel="stylesheet">
      </head>
  <body> 
<link href="Style.css" style="text/css" rel="stylesheet">
 
<br>

<div class="head"><font size="5">Collection Update</font></div>
<br><br>


		<section id="asd" class="asds">

	    <article>
				
			
			
			<center>
			<form method="post" action="CollectionUpdateExec.php">
				<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tbody>
							
							
		<?php
			include('dbcon.php');
			$id = $_GET["id"];
			$query =mysqli_query($con, "SELECT * FROM finance_collection WHERE collection_id = '$id'");
			$row=mysqli_fetch_assoc($query);
		?>



			<tr>
				<td><div class="form-group col-md-4">
					<label for="collection_id">Collection ID</label>
				<td><input type="number" class="form-control" readonly value="<?php echo $id; ?>" required name="collection_id" size="50"></td>
			</div>
			</tr>

			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="collection_date">Date</label>
				<td><input type="date" class="form-control" readonly value="<?php echo $row["collection_date"]; ?>" required name="collection_date" size="50">
			</tr>
			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="collection_particular">Particular</label>
				<td><input type="text" class="form-control" value="<?php echo $row["collection_particular"]; ?>" required name="collection_particular"size="50"></td>
			</tr>
			<br>
			<tr>
				<td><div class="form-group col-md-4">
      			<label for="collection_amount">Amount</label>
				<td><input type="number" class="form-control" value="<?php echo $row["collection_amount"]; ?>" required name="collection_amount"size="50"></td>
			</tr>
			<br>

				<td></td>
				<td><input type="submit" value="Update"class="btn btn-success"></td>
			</tr>
		</table>	
	</form>	
</font>		
			</center>
		

            		

		</article>
        </section>
		
		
	</div>

</body>
</html>
		
							
							
							
		
