<?php 
ob_start();

    function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
	$semyear= $_COOKIE['semyear'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="3;url= http://localhost/cnsc/test/sumeval.php"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Load Error</title>
</head>

<body>
<?php do_alert("Currently incomplete details."); ?>

<p><h4>Please wait. Page will automatically redirect. If not, click <a href = "<?php echo "http://".$_SERVER['HTTP_HOST']."/cnsc/test/sumeval.php"; ?>">here.</a></h4></p>
<p></p>
</body>
</html>
<?php 
ob_flush();
?>