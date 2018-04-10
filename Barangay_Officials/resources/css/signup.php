<html>
<head>
<title>Website Name</title>
<link rel="stylesheet" type="text/css" href="resources\css\bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="resources\css\custom_2.css">
<link rel="stylesheet" type="text/css" href="resources\css\bootstrap.min.css">
<script src="resources\js\jquery-1.12.3.min.js"></script>
<script src="resources\js\bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" id="brand">Barangay Officials</a>
		</div>
		<div>
		    <ul class="nav navbar-nav">
		        <li><a href="#">Home</a></li>
		        <li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
			   	 <ul class="dropdown-menu">
			        <li><a href="#">IPhone 5 Cover</a></li>
		            <li><a href="#">IPhone 6 Cover</a></li>
			        <li><a href="#">IPhone 7 Cover</a></li> 
			   	 </ul>
			   	 	<li><a href="#">About Us</a></li>
		            <li><a href="#">Contact Us</a></li>
			    </li>
			</ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		      </ul>
		</div>
	</nav>
</div>
<section>
<form role="form" style="align:center;">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</section>
</body>
</html>