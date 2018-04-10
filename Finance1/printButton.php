<!DOCTYPE html>
<html>
<head>
<link href="Style.css" style="text/css" rel="stylesheet">
  
</head>
<body><br>

</div>
<br>
<div class="head"><font size="5">Print Records</font></div>
<br><br>
<center>



<h3><div class="fontstyle">Fund Operation</div></h3>
	<form action="printFundOperation.php" target="_blank" method="GET">
<input type="text" name="year" placeholder="Enter year">
	<input type="submit" name="submit" value="print" target="_blank">

</form>

<h3><div class="fontstyle">Itemized Monthly Collection and Disbursement</div></h3>

	<form action="printCollectionDisbursement.php" target="_blank" method="GET">
<input type="number" name="year" placeholder="Enter year">
<select name="month">
	<option selected value="">-select month-</option>
						<option value="01">January
						</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
</select>

	<input type="submit" name="submit" value="print" target="_blank">

</form>
</center>


</body>
</html>