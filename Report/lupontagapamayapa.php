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
    
    
   
    $this->Cell(10,5,"KP MONITORING FORM NO.1",0,0,'L');
    // Title
    $this->Ln(10);
    $this->Cell(336,5,"LUPON TAGAPAMAYAPA REPORT OF CASES FILED",0,1,'C');
    $this->Cell(336,5,"ACTION AND PROBLEMS ENCOUNTERED ON KP IMPLEMENTATION",0,1,'C');
    $this->Cell(336,5,"For the 3rd Quarter, 2017",0,1,'C');
    
    $this->SetFont('Times','',12);
    $this->Cell(180,5,"Province of Cavite",5,5,'L');
    $this->Cell(180,5,"Minicipality of Indang",5,5,'L');
    $this->Cell(180,5,"Barangay $brgy",5,5,'L');
    $this->Ln(5);
    $this->Cell(180,10,"PART 1: Nature of Cases and Action Taken ",5,5,'L');
    $this->Ln(3);
   
    
   $this->Cell(1,9,"" ,0,1,'C');
    $this->Cell(20,1,"" ,0,0,'C');
  
    $this->Cell(1,0,"" ,0,1,'C');
   


    
    $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(26,9,"Cases" ,1,0,'C');
    $this->Cell(26,9,"Date" ,1,0,'C');
    $this->Cell(26,9,"Complainant" ,1,0,'C');
    $this->Cell(26,9,"Respondent" ,1,0,'C');
    
    $this->Cell(106,9,"Nature of Cases" ,1,0,'C');
        $this->Cell(89,9,"Nature of Cases" ,1,0,'C');
    $this->Cell(90,9,"" ,0,1,'C');
    
  
    
    $this->Cell(1,1,"" ,0,1,'C');//epalka
    $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(27,10,"No." ,0,0,'C');
    $this->Cell(27,10,"Filed" ,0,0,'C');
    $this->Cell(27,10,"ET/AL" ,0,0,'C');
    $this->Cell(27,10,"ET/AL" ,0,0,'C');
    
  
  
    $this->Cell(20,10,"Criminal" ,0,0,'C');
    $this->Cell(20,10,"Civil" ,0,0,'C');
    $this->Cell(20,10,"Others" ,0,0,'C');
    $this->Cell(20,10,"Mediated" ,0,0,'C');
    $this->Cell(20,10,"Conciliated" ,0,0,'C');
       
    
    $this->Cell(20,10,"Arbitrated" ,0,0,'C');
    $this->Cell(20,10,"Arbitrated" ,0,0,'C');
    $this->Cell(20,10,"Dismiss" ,0,0,'C');
    $this->Cell(20,10,"Certified Case " ,0,0,'C');



   




    $this->Cell(1,9,"" ,0,1,'C');
    $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(26,10,"1a" ,0,0,'C');
    $this->Cell(26,10,"1b" ,0,0,'C');
    $this->Cell(26,10,"2" ,0,0,'C');
    $this->Cell(26,10,"3" ,0,0,'C');
    $this->Cell(22,10,"3a" ,0,0,'C');
    $this->Cell(22,10,"3b" ,0,0,'C');
    $this->Cell(22,10,"3c" ,0,0,'C');
    $this->Cell(15,10,"4a" ,0,0,'C');
    $this->Cell(20,10,"4b" ,0,0,'C');
    $this->Cell(15,10,"4a" ,0,0,'C');
    $this->Cell(20,10,"4b" ,0,0,'C');
    $this->Cell(15,10,"4c" ,0,0,'C');
    $this->Cell(20,10,"4d" ,0,0,'C');
    
    $this->Cell(1,11,"" ,0,1,'C');
    


    for($ychan=1;$ychan<=7;$ychan++){
        
        $this->Cell(20,1,"" ,0,0,'C');
        $this->Cell(52,10,"" ,1,0,'C');
        $this->Cell(52,10,"" ,1,0,'C');
        $this->Cell(53,10,"" ,1,0,'C');
        $this->Cell(53,10,"" ,1,0,'C');
        $this->Cell(40,10,"" ,1,0,'C');
        $this->Cell(49,10,"" ,1,0,'C');
        $this->Cell(1,10,"" ,0,1,'C');
        
    }
     
    
    
    $this->Cell(1,5,"" ,0,1,'C');
     
    
    
     
    
}

}

// Instanciation of inherited class

$pdf = new PDF('L','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>