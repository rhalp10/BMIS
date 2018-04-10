<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
   
    // Logo
    $this->Ln(20);
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    
   
    // Title
    $this->Cell(50,5,"Republic of the Philippines",5,5,'C');
     $this->Cell(50,5,"Province of Cavite",5,5,'C');
    $this->Cell(50,5,"Municipality of Indang",5,5,'C');
      $this->Ln(3);
     $this->Cell(200,5,"BARANGAY $brgy",5,5,'C');
     $this->Ln(20);
     $this->Cell(200,5,"OFFICE OF THE BARANGAY CHAIRMAN",5,5,'C');
    // Line break
    $this->Ln(20);
    
        $this->Cell(220,5,"THIS IS TO CERTIFY that based on the Barangay Blotter" ,5,5,'C');
    $this->Ln(5);
     $this->Cell(196,5,"Book, no complaint was received/ handled by this  " ,5,5,'J');
    $this->Ln(5);
     $this->Cell(180,5,"Barangay for the period of ____________ to _________" ,5,5,'C');
     
    
    
     $this->Ln(25);
    $this->SetFont('Arial','BU',15);
         $this->Cell(300,5,"$name",5,5,'C');
    $this->Ln(5);
    $this->SetFont('Arial','B',15);
       $this->Cell(300,5,"BARANGAY CAPTAIN",5,5,'C');
    
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>