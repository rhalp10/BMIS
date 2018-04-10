<?php

 
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Special Project Plan</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<script src="js/skel.min.js">
		{
			prefix: 'css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			grid: { gutters: 30 },
			breakpoints: {
				wide: { range: '1200-', containers: 1140, grid: { gutters: 50 } },
				narrow: { range: '481-1199', containers: 1300 },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
		<script>
			$(function() {

				// Note: make sure you call dropotron on the top level <ul>
				$('#main-nav > ul').dropotron({ 
					offsetY: -10 // Nudge up submenus by 10px to account for padding
				});

			});
		</script>
		<script>
			// DOM ready
			$(function() {
    
			// Create the dropdown base
			$("<select />").appendTo("nav");
   
			// Create default option "Go to..."
			$("<option />", {
				"selected": "selected",
				"value"   : "",
				"text"    : "Menu"
			}).appendTo("nav select");
   
			// Populate dropdown with menu items
			$("nav a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("nav select");
			});
   
			// To make dropdown actually work
			// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
			$("nav select").change(function() {
				window.location = $(this).find("option:selected").val();
			});
  
			});
		</script>	
</head>
<body>
<div id="header_container">		
		    <div class="container">
			<!-- Header -->
				<div id="header" class="row">
					<div class="8u">
						<div class="box">
							<h1><a href="index.php">Barangay <span class="header_colour">  Special Project Plan</span></a></h1>
							
					    </div>
					</div>
<nav id="main-nav" class="1u">
						
					</nav>
				</div>
			</div>	
        </div>	

       
					<nav id="main-nav" class="11u">

						<ul>
    <form action="search.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
<li><a href="index.php">Home</a></li>

<li><a href="">Insert New Record</a>
<ul>
<li><a href="insert_annual.php">Insert Annual Barangay Youth Investment Plan</a></li>
<li><a href="insert_procurement.php">Insert Annual Procurement Plan</a></li>
<li><a href="insert_youth.php">Insert Youth Investment Plan</a></li>

</ul>
</li>
<li>
<a href="">View</a>			
									<ul>
<li><a href="view2.php"> Annual Procurement Plan</a></li>
<li><a href="viewsk2.php"> Barangay Youth Investment Plan</a></li>
<li><a href="view.php"> Annual Barangay Fund</a></li>
<li><a href="viewbdf.php">Barangay Development Funds</a></li>
<li><a href="viewbdrrmc.php">Barangay Disaster Risk Reduction Management Fund</a></li>
<li><a href="viewBCPC.php">Barangay Council For the Protection of Children Fund</a></li>
<li><a href="viewsenior.php">Senior Citizen Persons with Disability Fund</a></li>
<li><a href="view_sk.php">Sangguniang Kabataan Funds</a></li>
</ul>
</li>
</ul>


					</nav>
				</div>
			</div>	
    
					<section class="6u">
						<a href="#" class="image" ><img src="images/content.jpg" alt="image"/></a>
					</section>	

</div>
</body>
</html>
