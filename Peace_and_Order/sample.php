<html>
<style>
body {
	font-family: calibri;
	margin: 0; padding: 0;
} 
.label {
	background-color: #141414;
	width:100%;
	height:auto;
	padding-left: 3px;
	padding-top:3px;
	padding-bottom: 3px;
	color: white;
	top: 0;

}
.nav {
	background-color: #444444;
	margin-left:1%;
	margin-top:1%;
	margin-right:1%;
	border: none;
	width:98%;
	position: relative;
	overflow: hidden;
	text-transform: uppercase;
	font-family: calibri; 	
}
.nav a {
    	float: left;
	display: block;
	color: #f2f2f2;
    	text-align: center;
    	padding: 14px 16px;
    	text-decoration: none;
}
.nav a:hover {
    	background: #14aa6c;
    	color: white;
} 
.container {
	background-color: white;
	border: black solid;
	height:auto;
	width: 97%;
	margin-top: 1%;
	margin-left: 1%;
	margin-right: 1%;
	margin-bottom: 1%;
	overflow: hidden;
	
}

.left { 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 47%;
	margin-top: 1%;
	margin-left: 1%;
	float:left;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
}
.right{ 
	background-color: white;
	overflow: hidden;
	height:auto;
	width: 47%;
	margin-top: 1%;
	margin-right: 1%;
	float:right;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
}
.down{ 
	background-color: white;
	height:auto;
	width: 98%;
	margin-top: 1%;
	margin-right: 1%;
	float:right;
	border: #444444 solid;
	border-width: 1px;
	font-family: calibri;
	margin-bottom: 2%;
}
 .banner {
	width: auto;
  	height: 30px;
	padding-top: 8px;
	padding-bottom: 8px;
    	font-size: 20px;
    	text-align: center;
    	color: WHITE;
    	font-weight: bold;
    	background: #14aa6c;
    	border: #14aa6c solid 1px;
    	font-family: calibri
	padding-bottom: 2%;
	
}
input[type=text]{
	text-align:left;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color: #dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=password]{
	text-align:left;
	width: 50%;
	padding: 12px 6px;
	color: #444444;
	border:  #2a992c;
	background-color:#dddddd;
	margin-top:5px;
	margin-left:5px;
	margin-right:5px;
	font-family: calibri;
}
input[type=text]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;
}
input[type=submit]:hover {
	background-color: #14aa6c;
	border: none;
	color: white;
	-webkit-transition:background 0.5s ease-in-out;
	-moz-transition:background 0.5s ease-in-out;
	transition:background-color 0.5s ease-in-out;
}
input[type=submit] {
	background-color: #444444;
	border: none;
	padding: none;
	color: white;	
	width:98%;
	height: 45px;
	margin-top:5%;
	margin-left:1%;
	margin-right:1%;
	border-radius: 7px;
}
input[type=password]:focus {
	cursor:pointer;
	background-color: white;
	border-color:#14aa6c;
	border-style: solid;

}
</style>
<body>
<div class="label">(Insert name ng module niyo except dun sa word na dashboard + name ng link) ex: Dashboard / Health and Sanitation / Drug Inventory
</div>
<div class="nav">
	<a href="sample.php">drug inventory</a>
	<a href="">LINK 2 </a>
	<a href="">LINK 3</a>
	<a href="">LINK 4</a>
</div>

	<section class="left">
		<div class="banner">
		add
		</div>
		<form method="POST">
			Example Label<input type="text" name="" required autofocus placeholder="ENTER PLACEHOLDER HERE!" size="50"> </br>
	Example Label<input type="text" name="" required autofocus placeholder="ENTER PLACEHOLDER HERE!"> </br>
	Example Label<input type="text" name="" required autofocus placeholder="ENTER PLACEHOLDER HERE!">
</br></br>
<font color=" reD"> palitan nyo na lang yung size ng mga input depende na sa inyo yon (yung code ng size nasa tabi ng place holder :) </font> </br>

<font color=" reD"> palitan nyo na lang yung size ng mga input depende na sa inyo yon (yung code ng size nasa tabi ng place holder :) </font> </br>

<font color=" reD"> palitan nyo na lang yung size ng mga input depende na sa inyo yon (yung code ng size nasa tabi ng place holder :) </font> </br>

<font color=" reD"> palitan nyo na lang yung size ng mga input depende na sa inyo yon (yung code ng size nasa tabi ng place holder :) </font> </br>


<font color=" blue"> dinamihan ko to pra mkita nyong overflow (jargon meaning : pwedeng iscroll) ang container.BURAHIN NYO N LNG TONG NOTICE NA TO AFTER NYO MABASA</font> </br>
			<input type="Submit" name="submit" value="SUBMIT">
	
		</form>
	</section>
	<section class="right">
		<div class="banner">
		edit
		</div> </BR>
	<form method="POST">
	<font color=" RED"> KAYO NA PO BAHALA DITO THANKS!</font> </br>
	<input type="Submit" name="submit" value="SUBMIT"> </br>
	</form>
	</section>

	<section class="down">
		<div class="banner">
		VIEW
		</div>
	<font color =" red">KAYO NA DIN BAHALA DITO</font>
	</section>
</body>
</html>