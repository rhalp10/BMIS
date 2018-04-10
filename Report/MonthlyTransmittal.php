<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
   
    // Logo
    $this->Ln(0);
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(80);
    
   
    // Title
    $this->Cell(200,5,"",0,1,'C');
    $this->Cell(200,5,"Republic of the Philippines",0,1,'C');
    $this->Cell(200,5,"Province of Cavite",0,1,'C');
    $this->Cell(200,5,"Municipality of Indang",0,1,'C');
    $this->Cell(200,5,"OFFICE OF THE LUPON TAGAPAMAYAPA",0,1,'C');
    $this->Cell(200,5,"OFFICE OF THE PUNONG BARANGAY",0,1,'C');
    $this->Cell(200,5,"BARANGAY $brgy",0,1,'C');
    $this->Ln(10); 
    $this->Ln(10);
    $this->Cell(200,5,"Monthly Transmittal of Final Reports",0,1,'C');
    $this->Ln(10);
    $this->Cell(60,5,"To : MUNICIPAL JUDGE",0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(65,5,"   : Municipality of Indang",0,1,'C');
    $this->Ln(10);
    
        $this->Cell(200,5,"Enclosed herewith are final reports of a settlement of disputes and arbitration awards made by the Punong " ,0,1,'C');
        
        
        $this->Cell(110,5,"Barangay/Pangkat Tagapagkasundo in th following cases:" ,0,1,'C');
        $this->Ln(5);
    
    
    
    $this->Cell(60,7,"  " ,1,0,'C');
    $this->Cell(130,7,"Title  " ,1,0,'C');
    $this->Ln(7);
    $this->Cell(60,7,"Barangay Case No." ,1,0,'C');
    $this->Cell(130,7,"(Complainant et al vs. Respondents, et al)  " ,1,1,'C');
    //list of brgy case no.
     
    $this->Ln(90);
    $this->Cell(55,5,"Prepared By: ",5,0,'C');
    $this->Cell(135,5,"Noted By: ",5,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','BU',12);
    $this->Cell(80,5,"$name",5,0,'C');//name of kalihim
    $this->Cell(145,5,"$name",5,0,'C');//name of chairman
    $this->Ln(5);
    $this->SetFont('Arial','',12);
    $this->Cell(80,5,"Lupon/Pangkat Kalihim",5,0,'C');
    $this->Cell(145,5,"Punong Barangay/Pangkat Chairman",5,0,'C');
    
    $this->Ln(30);
    $this->Cell(255,5,"Received By: ",5,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','BU',12);
    $this->Cell(300,5,"$name",5,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',12);
    $this->Cell(300,5,"(Clerk of Court)",0,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',10);
     $this->Cell(55,5,"IMPORTANT:" ,0,0,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(117,5,"Lupon/Pangkat Scretary shall transmit not later that the First Five days of each month the final  " ,0,1,'C');
        $this->Cell(127,5,"reports for the preceding month" ,0,1,'C');
        $this->Ln(5);
   
    
}

}

// Instanciation of inherited class
$pdf = new PDF('P','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>