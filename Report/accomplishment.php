<?php
 session_start();
$id = $_GET['id']; 
 include('dbcon.php');
 $query = "SELECT * FROM report_accomplishsment WHERE accom_ID = '$id'";
						$res = mysqli_query($db,$query);
					$row = mysqli_fetch_array($res);
 
 
 
 
 require('justify.php');

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

 $pdf->Image($picngbmis, 12, 10, 35, 30, 'png');

 $pdf->Image($picngbmis1, 160, 10, 33, 28, 'png'); 
   
   
    $brgy = strtoupper($_SESSION['barangay']);
    $month = $row['month'];
    $year = $row['year'];
    $comt = $row['committee'];
    $nr = $row['narrative'];
    // Logo
    $pdf->Ln(3);
    // Arial bold 15
    $pdf->SetFont('Arial','',12);
    // Move to the right
    $pdf->Cell(80);
    
   
    // Title
     $pdf->Cell(200,5,"",0,1,'C');
    $pdf->Cell(200,5,"Republic of the Philippines",0,1,'C');
     $pdf->Cell(200,5,"Province of Cavite",0,1,'C');
     $pdf->Cell(200,5,"City of General Trias",0,1,'C');
      $pdf->Ln(2);
     $pdf->Cell(200,5,"BARANGAY $brgy",0,1,'C');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(200,15,"OFFICE OF THE SANGGUNIANG BARANGAY",0,1,'C');
    $pdf->Cell(190,0,"",1,1);
    $pdf->Ln(10);
     $pdf->SetFont('Arial','',12);
        $pdf->Cell(200,5,"ACCOMPLISHMENT REPORT FOR $month, $year " ,0,1,'C');
    $pdf->Ln(5);
	if($comt!="None"){
		
    $pdf->Cell(200,5,"Committee on $comt" ,0,0,'C');
   
	}   $pdf->Ln(15);
$pdf->Cell(10,2,"" ,0,0,'FJ');
    $pdf->MultiCell(170,6,"$nr" ,0,1,'FJ');
    


// Instanciation of inherited class


$pdf->Output();
?>