<?php
 require('justify.php');

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);



   
    session_start();
    $brgy = strtoupper($_POST['barangay']);
    $month = $_POST['month'];
    $year = $_POST['Year'];
    $comt = $_POST['committee'];
    $nr = $_POST['narrativereport'];
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
     $pdf->Cell(200,5,"Municipality of Indang",0,1,'C');
      $pdf->Ln(2);
     $pdf->Cell(200,5,"BARANGAY $brgy",0,1,'C');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(200,15,"OFFICE OF THE SANGGUNIANG BARANGAY",0,1,'C');
    $pdf->Cell(190,0,"",1,1);
    $pdf->Ln(10);
     $pdf->SetFont('Arial','',12);
        $pdf->Cell(200,5,"ACCOMPLISHMENT REPORT FOR $month (MONTH), $year (YEAR)" ,0,1,'C');
    $pdf->Ln(5);
    $pdf->Cell(200,5,"Committee on $comt" ,0,0,'C');
      $pdf->Ln(15);
$pdf->Cell(40,2,"" ,0,0,'FJ');
    $pdf->MultiCell(140,6,"$nr" ,0,1,'FJ');
    


// Instanciation of inherited class


$pdf->Output();
?>