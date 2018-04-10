<?php include('inc/header.php');?>

<aside class="main-sidebar">
    <div class="user-panel clearfix">
        <div class="user-image col-md-12">
            <img class="img-circle" src="assets/images/profile.jpg">
        </div>
        <div class="user-info">
            <h5 class="text-center">Anonymous</h5>
            <h6 class="text-center"><small>Admin</small></h6>
        </div>
    </div>
    <nav class="navbar-toggleable-md navbar-light bg-faded">
        <div class="navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="header"><small><b>MAIN NAVIGATION</b></small></li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="ti-bar-chart" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="incident.php">
                        <i class="ti-shield" aria-hidden="true"></i>
                        Peace and Order
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

<div id="content-wrapper" class="content-wrapper">
    <section class="content-header">
        <h4 class="text-uppercase">Dashboard</h4>    
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Incident Report
                    </div>
                    <div class="card-body">
                        <canvas id="incident_report"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
<?php include('inc/footer.php');?>