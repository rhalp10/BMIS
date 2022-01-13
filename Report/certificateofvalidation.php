<?php
  session_start();
include('dbcon.php');
$id=$_GET['id'];
 $query = "SELECT * FROM report_cov WHERE cov_ID = '$id'";
						$res = mysqli_query($db,$query);
					$row = mysqli_fetch_array($res);
					$t = $row['num_of_complain'];
					$l = $row['period'];
					$cap = $row['barangay_captain'];
 require('justify.php');


    

  
  
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
   
	
							
							
		 
    $pdf->Image($picngbmis, 14, 10, 35, 30, 'png');						
		
 $pdf->Image($picngbmis1, 160, 10, 33, 28, 'png'); 					
							
							
				


					$brgy =strtoupper($_SESSION['barangay']);

    // Logo
    $pdf->Ln(3);
    
    // Arial bold 15
    $pdf->SetFont('Arial','',15);
 
    // Title
    $pdf->Cell(185,6,"Republic of the Philippines",0,5,'C');
     $pdf->Cell(190,6,"Department of Interior & Local Government",5,5,'C');
     $pdf->Cell(185,6,"Province of Cavite",5,5,'C');
$pdf->SetFont('Arial','B',15);
      $pdf->Ln(3);
     $pdf->Cell(190,5,"BARANGAY $brgy",5,5,'C');
     $pdf->Ln(20);
     $pdf->Cell(200,10,"OFFICE OF THE BARANGAY CHAIRMAN",5,5,'C');
$pdf->Cell(10,0,"",0,0);
$pdf->Cell(170,0,"",1,0);
$pdf->Cell(1,0.5,"",0,1);
;
$pdf->Cell(10,0,"",0,0);
$pdf->Cell(170,0,"",1,0);
     $pdf->Ln(20);
     $pdf->Cell(200,5,"CERTIFICATE OF VALIDATION",5,5,'C');
    // Line break
    $pdf->Ln(20);
    $pdf->Cell(40,0,"",0,0);
$pdf->SetFont('Arial','B',15);
        $pdf->Cell(60,5,"THIS IS TO CERTIFY" ,0,0,'FJ');
$pdf->SetFont('Arial','',15);
$pdf->Cell(80,5," that based on the Barangay" ,0,5,'FJ');
    $pdf->Ln(5);
$pdf->Cell(20,0,"",0,0);
     $pdf->Cell(170,5," Blotter Book, $t complaint was received/ handled by this  " ,5,5,'FJ');
    $pdf->Ln(5);
$pdf->Cell(24,0,"",0,0);
     $pdf->Cell(130,5,"Barangay for the period of 01 to $l." ,5,5,'FJ');
     
    
    
     $pdf->Ln(30);
    $pdf->SetFont('Arial','BU',15);
         $pdf->Cell(300,7,"$cap",5,5,'C');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','',15);
       $pdf->Cell(300,5,"BARANGAY CAPTAIN",5,5,'C');
    





$pdf->Output();
?>