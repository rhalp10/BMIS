<?php
$msg = "";
if (isset($post['upload'])) {
	$target = "images/".basename($_FILES['image']);

	$db = mysqli_connect("localhost", "root", "", "register");

	$image = $_FILES['image'];


	$sql= "INSERT INTO new_record (image) VALUES ('$image') ";
	mysqli_query($db, $sql);

if (move_uploaded_file($_FILES ['image'], $target)) {
	$msg = "Image uploaded succesfully";
}
else{
	$msg = "There was a problem uploading image";
}
 
}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Image upload</title>
</head>
<body>
	<div id="content">
		<form method="post" action="view.php" enctype="multipart/forms-data">
		<br/>
			<input type="file" name="image"/>
		<br/><br/>
			<input type="submit" name="upload" value="Upload Image"/>
	</form>
</body>
</html>