<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
   

    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    
   
    // Title
    $this->Cell(400,5,"",0,1,'C');
    $this->Cell(300,6,"Barangay Budget Preparation Form No. 454",0,1,'C');
    $this->Cell(320,6,"Page 2 of 2",0,1,'C');
    $this->Cell(20,6,"Barangay ",0,0,'C');
     $this->Cell(29,6,":",0,0,'C');
    $this->Cell(25,6,"$brgy",0,1,'C');
     $this->Cell(30,6,"Municipality of ",0,0,'C');
    $this->Cell(9,6,":",0,0,'C');
    $this->Cell(28,6,"Indang",0,1,'C');
    $this->Cell(24,6,"Province of ",0,0,'C');
    $this->Cell(21,6,":",0,0,'C');
    $this->Cell(15,6,"Cavite",0,1,'C');
    
    
    
    
    
    $this->Ln(10);
    
    
    
    
    
    $this->Cell(200,10,"STATEMENT OF FUND OPERATION ",0,1,'C');
    $this->Cell(200,10,"CY ",0,1,'C');
   //$this->Cell(200,10,"$year ",0,1,'C');
   
    
   
    $this->Cell(95,10,"PARTICULARS" ,1,0,'C');
    $this->Cell(50,10,"ACCOUNT CODE" ,1,0,'C');
    $this->Cell(50,10,"AMOUNT" ,1,0,'C');
    
    
    
    
    $this->Ln(220);
    
  
    $this->SetFont('Arial','B',12);
    $this->Cell(100,5,"Prepared by:",0,0,'L');
    $this->Cell(60,5,"Approved by:",0,0,'R');
    $this->Ln(20);
    $this->SetFont('Arial','BU',15);
   // $this->Cell(300,5,"$secname",5,0,'L');
   // $this->Cell(36,5,"$name",5,1,'R');
    $this->Ln(3);
    $this->SetFont('Arial','',13);
    $this->Cell(60,5,"Barangay Treasurer",0,0,'L');
    $this->Cell(110,5,"Punong Barangay",0,0,'R');
    
    

    
}
       

}


// Instanciation of inherited class

$pdf = new PDF('P','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>