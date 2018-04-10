<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    session_start();
   
    $b1 = $_POST['barangaychairman1'];
    $b2 = $_POST['barangaychairman2'];
    $b3 = $_POST['barangaychairman3'];
    $b4 = $_POST['barangaychairman4'];
    $b5 = $_POST['barangaychairman5'];
   $b6 = $_POST['barangaychairman6'];
     $b7 = $_POST['barangaychairman7'];
    $b8 = $_POST['barangaychairman8'];
    $b9 = $_POST['barangaychairman9'];
    $b10 = $_POST['barangaychairman10'];
    $b11 = $_POST['barangaychairman11'];
   $b12 = $_POST['barangaychairman12'];
     $b13 = $_POST['barangaychairman13'];
    $b14 = $_POST['barangaychairman14'];
    $b15 = $_POST['barangaychairman15'];
   $b16 = $_POST['barangaychairman16'];
    $p = $_POST['period'];
     $y = $_POST['year'];
     $a = $_POST['asof'];
   


    // Move to the right

    
   
    // Title
     $this->SetFont('Arial','B',8);
    $this->Cell(10,5,"DILG VAWC Form 1-B",0,0,'L');
    // Title
    $this->Ln(10);
        // Arial bold 15
    $this->SetFont('Arial','B',12);
    $this->Cell(336,5,"CONSOLIDATED QUARTERLY COMPLIANCE MONITORING REPORT RE: RA 9262 (AVAWC)",0,1,'C');
    $this->Cell(336,5,"Period Covered: $p   QUARTER $y ",0,1,'C');
    $this->Cell(336,5,"As of $a ",0,1,'C');
    
    $this->SetFont('Times','',12);
    $this->Cell(180,5,"Municipality: INDANG",5,5,'L');
    $this->Ln(3);   
    
    $this->SetFont('Arial','B',9);
    $this->Cell(25,30,"" ,1,0,'C');
    $this->Cell(20,30,"" ,1,0,'C');
    $this->Cell(70,15,"" ,1,0,'C');    
    $this->Cell(20,30,"" ,1,0,'C');
     $this->Cell(80,15,"" ,1,0,'C');  
    $this->Cell(25,30,"" ,1,0,'C');
     $this->Cell(50,15,"" ,1,0,'C');
    $this->Cell(20,30,"" ,1,0,'C');
    $this->Cell(25,30,"" ,1,0,'C');
    $this->Cell(1,0,"" ,0,1,'C');
    
    
  
     $this->Cell(215,15,"" ,0,0,'C');  
    $this->Cell(25,7,"TOTAL NO." ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    
    $this->Cell(25,10,"" ,0,0,'C');
    $this->Cell(20,5,"TOTAL" ,0,0,'C');
    $this->Cell(70,5,"NO. OF VAW CASES REPORTED" ,0,0,'C');    
    $this->Cell(20,30,"" ,0,0,'C');
     $this->Cell(80,5,"NO. OF CASES ACTED UPON" ,0,0,'C');  
    $this->Cell(25,5,"OF VAWC " ,0,0,'C');
     $this->Cell(50,5,"PROGRAMS/PROJ." ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    
    
    $this->Cell(25,5,"BARANGAY" ,0,0,'C');
    $this->Cell(20,5,"NO. OF" ,0,0,'C');
    $this->Cell(70,5,"(3)" ,0,0,'C');    
    $this->Cell(20,5,"TOTAL" ,0,0,'C');
     $this->Cell(80,5,"(5)" ,0,0,'C');  
    $this->Cell(25,5,"CASES" ,0,0,'C');
     $this->Cell(50,5,"IMPLEMENTED" ,0,0,'C');
    $this->Cell(20,5,"FUNDS" ,0,0,'C');
    $this->Cell(25,5,"REMARKS" ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    
    $this->Cell(45,30,"" ,0,0,'C');
    $this->Cell(15,15,"" ,1,0,'C');
    $this->Cell(15,15,"" ,1,0,'C');
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(20,30,"" ,0,0,'C');
    
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(20,15,"" ,1,0,'C');
    $this->Cell(25,30,"" ,0,0,'C');
     $this->Cell(25,15,"" ,1,0,'C');
    $this->Cell(25,15,"" ,1,0,'C');
    $this->Cell(35,30,"" ,0,0,'C');
    $this->Cell(1,0,"" ,0,1,'C');
    
    $this->Cell(25,5,"(1)" ,0,0,'C');
    $this->Cell(20,5,"VAWC" ,0,0,'C');
    
    $this->SetFont('Arial','B',8);
   $this->Cell(15,5,"Physical" ,0,0,'C');
    $this->Cell(15,5,"Sexual" ,0,0,'C');
    $this->Cell(20,5,"Psychological" ,0,0,'C');
    $this->Cell(20,5,"Economic" ,0,0,'C');   
         $this->Cell(20,5,"(4)" ,0,0,'C');
     $this->Cell(20,5,"Referred" ,0,0,'C');
    $this->Cell(20,5,"Referred" ,0,0,'C');
    $this->Cell(20,5,"Referred" ,0,0,'C');
    $this->Cell(20,5,"Referred" ,0,0,'C'); 
    $this->Cell(25,5,"ACTED" ,0,0,'C');
    
     $this->Cell(25,5,"(7)" ,0,0,'C');
    $this->Cell(25,5,"" ,0,0,'C');
    $this->Cell(20,5,"ALLOCATED" ,0,0,'C');
    $this->Cell(25,5,"(9)" ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    
    
     $this->Cell(25,5,"" ,0,0,'C');
    $this->Cell(20,5,"CASES" ,0,0,'C');
    
    $this->SetFont('Arial','B',8);
   $this->Cell(15,5,"Abuse" ,0,0,'C');
    $this->Cell(15,5,"Abuse" ,0,0,'C');
    $this->Cell(20,5,"Abuse" ,0,0,'C');
    $this->Cell(20,5,"Abuse" ,0,0,'C');   
         $this->Cell(20,5,"" ,0,0,'C');
     $this->Cell(20,5,"to LSWDO" ,0,0,'C');
    $this->Cell(20,5,"to PNP" ,0,0,'C');
    $this->Cell(20,5,"to Court" ,0,0,'C');
    $this->Cell(20,5,"to Medical" ,0,0,'C'); 
    $this->Cell(25,5,"UPON" ,0,0,'C');
    
     $this->Cell(25,5,"Training" ,0,0,'C');
    $this->Cell(25,5,"IEC" ,0,0,'C');
    $this->Cell(20,5,"(8)" ,0,0,'C');
    $this->Cell(25,5,"" ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
     $this->Cell(25,5,"" ,0,0,'C');
    $this->Cell(20,5,"(2)" ,0,0,'C');
    
    $this->SetFont('Arial','B',8);
   $this->Cell(15,5,"(a)" ,0,0,'C');
    $this->Cell(15,5,"(b)" ,0,0,'C');
    $this->Cell(20,5,"(c)" ,0,0,'C');
    $this->Cell(20,5,"(d)" ,0,0,'C');   
         $this->Cell(20,5,"" ,0,0,'C');
     $this->Cell(20,5,"(a)" ,0,0,'C');
    $this->Cell(20,5,"(b)" ,0,0,'C');
    $this->Cell(20,5,"(c)" ,0,0,'C');
    $this->Cell(20,5,"(d)" ,0,0,'C'); 
    $this->Cell(25,5,"(6)" ,0,0,'C');
    
     $this->Cell(25,5,"(a)" ,0,0,'C');
    $this->Cell(25,5,"(b)" ,0,0,'C');
    $this->Cell(20,5,"" ,0,0,'C');
    $this->Cell(25,5,"" ,0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    
     $this->Cell(25,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');
   $this->Cell(15,60,"" ,1,0,'C');
    $this->Cell(15,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');   
         $this->Cell(20,60,"" ,1,0,'C');
     $this->Cell(20,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C'); 
    $this->Cell(25,60,"" ,1,0,'C');
    
     $this->Cell(25,60,"" ,1,0,'C');
    $this->Cell(25,60,"" ,1,0,'C');
    $this->Cell(20,60,"" ,1,0,'C');
    $this->Cell(25,60,"" ,1,0,'C');
    $this->Cell(1,4,"" ,0,1,'C');
    
     $this->SetFont('Arial','B',10);
    
    $this->Cell(25,0,"$b1" ,0,0,'C');
    $this->Cell(20,0,"$b2" ,0,0,'C');
   $this->Cell(15,0,"$b3" ,0,0,'C');
    $this->Cell(15,0,"$b4" ,0,0,'C');
    $this->Cell(20,0,"$b5" ,0,0,'C');
    $this->Cell(20,0,"$b6" ,0,0,'C');   
    $this->Cell(20,0,"$b7" ,0,0,'C');
     $this->Cell(20,0,"$b8" ,0,0,'C');
    $this->Cell(20,0,"$b9" ,0,0,'C');
    $this->Cell(20,0,"$b10" ,0,0,'C');
    $this->Cell(20,0,"$b11" ,0,0,'C'); 
    $this->Cell(25,0,"$b12" ,0,0,'C');
     $this->Cell(25,0,"$b13" ,0,0,'C');
    $this->Cell(25,0,"$b14" ,0,0,'C');
    $this->Cell(20,0,"$b15" ,0,0,'C');
    $this->Cell(25,0,"$b16  " ,0,0,'C');
    $this->Cell(1,70,"" ,0,1,'C');
    
    
    
    
    $this->SetFont('Arial','B',12); 
    $this->Cell(170,5,"Prepared by:" ,0,0);
    $this->Cell(170,5,"Sumitted by:" ,0,0);
    $this->Cell(1,20,"" ,0,1,'C');
    $this->SetFont('Arial','BU',12); 
    $cap=$_POST['cap'];
    $desk=$_POST['desk'];
$this->Cell(170,5,"  $desk  " ,0,0);
    $this->Cell(170,5,"   $cap  " ,0,0);
    $this->Cell(1,6,"" ,0,1,'C');

    $this->SetFont('Arial','',12); 
  $this->Cell(170,5,"VAWC Desk Officer" ,0,0);
    $this->Cell(170,5,"Punong Barangay" ,0,0);
    $this->Cell(1,7,"" ,0,1,'C');
    
    ////////////////////
    
    ////// $this->Cell(18,15,"" ,1,0,'C');
  //////////// $this->Cell(15,15,"" ,1,0,'C');
     
    
    
     
    
}

}

// Instanciation of inherited class

$pdf = new PDF('L','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>