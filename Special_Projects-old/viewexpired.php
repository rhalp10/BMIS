<?php
if(isset($_POST['checkexpiry']))
{
	$ud = $_POST['userdate'];//get the date from the form
	$now = date("Y-m-d"); //get the current date
	$ud = date_create($ud); //convert the user selected date to date
	$now = date_create($now);//convert the current date to date
	
	
	if($ud<$now){ //if user date is less than current date or if the date is expired
	echo 'expired<br />';
	$ud=$ud->format('Y-m-d'); //convert the date back into string
	$now=$now->format('Y-m-d');//convert the date back into string
	echo $ud.'<br />'.$now;//display the dates

	}
	else
	{
	echo 'present or future<br />';
	$ud=$ud->format('Y-m-d');
	$now=$now->format('Y-m-d');
	echo $ud.'<br />'.$now;
	}
	exit();
	
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Date Expiration</title>
</head>

<body>
<form action="viewexpired.php" method="post">
<input type="date" name="userdate" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" /><!--min="<?php echo date("Y-m-d") ?>" -->
<input type="submit" name = "checkexpiry" value="Check"/>
</form>
</body>

</html>