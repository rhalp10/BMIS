
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
	background-color: #14aa6c;
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
<div class="label">Dashboard / Peace & Order /File blotter/incident case
</div>
<div class="nav">
	<a href="opening.php">Peace & Order</a>
	<a href="fileblotter.php">File blotter/incident case  </a>
	<a href="view.php">View blotter/incident case  </a>
</div>

	<section class="left">
		<div class="banner">
		New Blotter case
		</div>
		<form method="POST">
		<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
  <h5><font size="5">PEACE & ORDER (Add Incident) </h5></font>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                             
                    </div>
                    <form id="validateForm" action="" name="" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>
                                       <font size="4"> Reporting Person/Complainant
                                        <a href="" data-toggle="modal" data-target="#residentList">                    
                                            <span id="show-resident" class="float-right text-danger">
                                                Show Resident List&nbsp&nbsp&nbsp<i class="ti-arrow-circle-down"></i>
                                            </span>
                                        </a>
										</font>
                                    </h6>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complainant Type</label>
                                        <select class="form-control" id="complainanttype">
                                            <option value="resident">Resident</option>
                                            <option value="outsider">Outsider</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="residentId" value="">
                                        <input type="hidden" name="residentIdOffender" value="">
                                        
                                        <!-- 2 = outsider (default) -->
                                        <!-- 1 = resident of barangay -->
                                        <input type="hidden" name="complainantType" value="2">
                                        <input type="hidden" name="complainantTypeOffender" value="2">
                                        <input type="text" class="form-control" name="name" id="fullName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="contact_number" id="contactNumber">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="text" class="form-control" name="birthday" id="birthday">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12">
                                    <h6 style="margin-top:30px;">
                                       <font size="4"> Offenders
                                        <a href="" data-toggle="modal" data-target="#residentListOffender">                    
                                            <span id="show-off-resident" class="float-right text-danger">
                                                Show Resident List&nbsp&nbsp&nbsp<i class="ti-arrow-circle-down"></i>
                                            </span>
                                        </a>
										 </font>
                                    </h6>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Offender Type</label>
                                        <select class="form-control" id="offendertype">
                                            <option value="resident">Resident</option>
                                            <option value="outsider">Outsider</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="offender_name" id="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="offender_gender" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="offender_address" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea style="height:150px!important;" class="form-control" name="offender_description" id=""></textarea>
                                    </div>       
                                </div>

                                <div class="col-md-12">
                                    <h6 style="margin-top:30px;"> <font size="4">Incident Reported</h6></font>
                                    <hr>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Incident title</label>
                                        <input type="text" class="form-control" name="incident_title" id="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Incident Type/Violation</label>
                                        <select id="violation" type="text" class="form-control" name="violation">
                                            <option value="">-- Select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Date of Incident</label>
                                        <input type="text" class="form-control" id="incidentDate"  name="date">
                                    </div>       
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Time of Incident</label>
                                        <input type="text" class="form-control" name="time" id="incidentTime">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Location of Incident</label>
                                        <input type="text" class="form-control" name="incident_location" id="">
                                    </div>       
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Narrative</label>
                                        <textarea style="height:250px !important;" class="form-control" name="narrative" id=""></textarea>
                                    </div>       
                                </div>
                            </div>  
                        </div>
</br></br>

			<input type="Submit" name="submit" value="insert" class="btn btn-success"value="SUBMIT">
	
	
		</form>
	</section>
	</section>
	
	
</body>
</html>