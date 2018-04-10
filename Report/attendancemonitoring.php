<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    session_start();
    $qua = $_POST['quarter'];
    $b1 = $_POST['barangaychairman1'];
    $b2 = $_POST['barangaychairman2'];
    $b3 = $_POST['barangaychairman3'];
    $b4 = $_POST['barangaychairman4'];
    $b5 = $_POST['barangaychairman5'];
   $b6 = $_POST['barangaychairman6'];
    $b7 = $_POST['mayor'];

    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right

    
   
    // Title
    $this->Cell(335,15,"PERSONNEL ATTENDANCE MONITORING",0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    $this->Cell(336,20,"Attendance Monitoring Form 1A",0,0,'C');
    $this->Cell(1,10,"" ,0,1,'C');
    $this->Cell(336,14,"For The $qua Quarter",0,1,'C');
    $this->Cell(1,9,"" ,0,1,'C');
    $this->Cell(20,1,"" ,0,0,'C');
  
    $this->Cell(1,0,"" ,0,1,'C');
    
    $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(52,30,"" ,1,0,'C');
    $this->Cell(52,30,"" ,1,0,'C');
    $this->Cell(106,30,"" ,1,0,'C');
    $this->Cell(40,30,"" ,1,0,'C');
    $this->Cell(49,30,"" ,1,0,'C');
      $this->Cell(1,0,"" ,0,1,'C');
    
     $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(52,9,"LGU (Province, City," ,0,0,'C');
    $this->Cell(52,9,"Name of Non-" ,0,0,'C');
    $this->Cell(106,9,"Nature of Non-Compliance(3)" ,1,0,'C');
    $this->Cell(90,9,"" ,0,1,'C');
    
      $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(52,10,"Municipality, Barangay" ,0,0,'C');
    $this->Cell(52,10,"Compliant Personnel" ,0,0,'C');
    $this->Cell(53,21,"" ,1,0,'C');
    $this->Cell(53,10,"Habitual" ,0,0,'C');
    $this->Cell(40,10,"Station" ,0,0,'C');
    $this->Cell(49,10,"Position/Designation" ,0,0,'C');
    $this->Cell(1,1,"" ,0,1,'C');
    
    
   $this->Cell(124,9,"" ,0,0,'C');
    $this->Cell(53,9,"Habitual" ,0,0,'C');
      $this->Cell(139,10,"" ,0,0,'C');
    $this->Cell(1,9,"" ,0,1,'C');

    
    $this->Cell(20,1,"" ,0,0,'C');
    $this->Cell(52,10,"(1)" ,0,0,'C');
    $this->Cell(52,10,"(2)" ,0,0,'C');
    $this->Cell(53,10,"Absenteeism" ,0,0,'C');
    $this->Cell(53,10,"Tardiness" ,0,0,'C');
    $this->Cell(40,10,"(4)" ,0,0,'C');
    $this->Cell(49,10,"(5)" ,0,0,'C');
    $this->Cell(1,11,"" ,0,1,'C');
    
    
    $this->Cell(20,1,"" ,0,0,'C');
        $this->Cell(52,10,"$b1" ,1,0,'C');
        $this->Cell(52,10,"$b2" ,1,0,'C');
        $this->Cell(53,10,"$b3" ,1,0,'C');
        $this->Cell(53,10,"$b4" ,1,0,'C');
        $this->Cell(40,10,"$b5" ,1,0,'C');
        $this->Cell(49,10,"$b6" ,1,0,'C');
        $this->Cell(1,10,"" ,0,1,'C');
    
    for($ychan=1;$ychan<=5;$ychan++){
        
        $this->Cell(20,1,"" ,0,0,'C');
        $this->Cell(52,10,"" ,1,0,'C');
        $this->Cell(52,10,"" ,1,0,'C');
        $this->Cell(53,10,"" ,1,0,'C');
        $this->Cell(53,10,"" ,1,0,'C');
        $this->Cell(40,10,"" ,1,0,'C');
        $this->Cell(49,10,"" ,1,0,'C');
        $this->Cell(1,10,"" ,0,1,'C');
        
    }
     

    $this->Ln(4);
    $this->Cell(20,5,"" ,0,0,'C');
      $this->Cell(170,0,"Prepared by:" ,0,0);
    $this->Cell(150,0,"Submitted by:" ,0,0);
    
    $cap = $_SESSION['captain'];
    $sec = $_SESSION['secretary'];
    
    
    $this->SetFont('Arial','BU',12);
     $this->Ln(15);
    $this->Cell(20,5,"" ,0,0,'C');
      $this->Cell(170,0,"$sec" ,0,0);
    $this->Cell(150,0,"$cap" ,0,0);
     $this->SetFont('Arial','',12);
     $this->Ln(6);
    $this->Cell(20,5,"" ,0,0,'C');
      $this->Cell(170,0,"Kalihim" ,0,0);
    $this->Cell(150,0,"Punong Barangay" ,0,0);
        $this->SetFont('Arial','BU',12);
    $this->Cell(20,25,"" ,0,1,'C');
      $this->Cell(300,10,"$b7" ,0,1,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(300,0,"Mayor" ,0,1,'C');
    
}

}

// Instanciation of inherited class

$pdf = new PDF('L','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>