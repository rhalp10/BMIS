<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
   

    // Arial bold 15
    $this->SetFont('Times','B',12);
    // Move to the right
    
    
    
    $this->Cell(80);
    
   
    // Title
    $this->Cell(400,5,"",0,1,'C');
    $this->Cell(200,5,"Republic of the Philippines",0,1,'C');
    $this->Image('logo.png',10,6,30);
    $this->Image('logo.png',170,6,30);
    $this->Cell(200,5,"Province of Cavite",0,1,'C');
    $this->Cell(200,5,"Municipal of Indang",0,1,'C');
     $this->Cell(200,5,"BARANGAY ",0,0,'C');
      $this->Cell(200,5,"$brgy ",0,0,'C');
    
    $this->SetFont('Times','B',12);
    $this->Ln(10);
    $this->Cell(200,5,"ITEMIZED MONTHLY COLLECTION AND DISBURSEMENT ",0,1,'C');
    $this->Cell(200,5,"For the month of  ",0,0,'C');
    $this->Cell(200,5,"month, FY year  ",0,0,'C');
    $this->Ln(15);
    
    $this->SetFont('Times','B',10);
     $this->Cell(100,5,"COLLECTION" ,1,0,'C');
    $this->Cell(100,5,"DISBURSEMENT" ,1,1,'C');
    
    $this->Cell(25,5,"DATE" ,1,0,'C');
     $this->Cell(50,5,"PARTICULARS" ,1,0,'C');
     $this->Cell(25,5,"AMOUNT" ,1,0,'C');
     $this->Cell(25,5,"DATE" ,1,0,'C');
     $this->Cell(50,5,"PARTICULARS" ,1,0,'C');
     $this->Cell(25,5,"AMOUNT" ,1,1,'C');
    
    
    for($ychan=1;$ychan<=29;$ychan++){
        
        $this->Cell(25,5,"" ,1,0,'C');
     $this->Cell(50,5,"" ,1,0,'C');
     $this->Cell(25,5,"" ,1,0,'C');
     $this->Cell(25,5,"" ,1,0,'C');
     $this->Cell(50,5,"" ,1,0,'C');
     $this->Cell(25,5,"" ,1,1,'C');
        
    }
     
     $this->Cell(75,5,"TOTAL COLLECTION" ,1,0,'C');
     $this->Cell(25,5,"" ,1,0,'C');
     $this->Cell(75,5,"TOTAL EXPENSES" ,1,0,'C');
     $this->Cell(25,5,"" ,1,1,'C');
    
    $this->Ln(30);
    
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
    

    
    
    
    
    
    
    
    
}}
    
   
 
// Instanciation of inherited class

$pdf = new PDF('P','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>