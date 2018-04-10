<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    session_start();
    $month = $_POST['month'];
    $year = $_POST['year'];
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
    $sec = $_POST['sec'];
    $cap = $_POST['cap'];
    // Logo
    $this->Ln(0);
    // Arial bold 15
    $this->SetFont('Arial','',12);
    // Move to the right
    $this->Cell(80);
    
   
    // Title
    $this->Cell(200,5,"",0,1,'C');
    $this->Cell(60,5,"Dengue Monitoring Form",0,1,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(355,5,"LGU COMPLIANCE TO AKSYON BARANGAY KONTRA DENGUE (ABKD)",0,1,'C');
    $this->Cell(355,5,"(DILG MC NO.year - year)",0,1,'C');//////////////
    $this->Cell(355,5,"FOR $month CY $year",0,0,'C');//////////////
    $this->Ln(10);
    $this->Cell(20,5,"Region: ",0,0,'C');
    $this->Cell(67,5,"IV-A CALABARZON",0,1,'C');
    $this->Cell(23,5,"Province: ",0,0,'C');
    $this->Cell(35,5,"CAVITE",0,1,'C');
    $this->Cell(30,5,"Municipality: ",0,0,'C');
    $this->Cell(23,5,"INDANG",0,1,'C');
    $this->Ln(5); 
 
    
    
    $this->SetFont('Arial','B',10);
    
    
    
    $this->Cell(30,27,"BARANGAY   " ,1,0,'C');
    $this->Cell(80,7," Presence/ Absence (b) " ,1,0,'C');
    $this->Cell(142,7," Action/Strategies Undertaken to Intensity Anti-Denguw Campaign (c) " ,1,0,'C');
    $this->Cell(25,27," No. of  ",1,0,'C');
    $this->Cell(25,27," Remarks ",1,0,'C');
    $this->Ln(7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,20,"" ,0,0,'C');
    $this->Cell(20,20,"Ordinance  " ,1,0,'C');
    $this->Cell(30,20,"Fund Allocation  " ,1,0,'C');
    $this->Cell(30,20,"Distribution Center  " ,1,0,'C');
     $this->Cell(46,20,"Distribution of IEC Campaign " ,1,0,'C');
    $this->Cell(38,20,"Anti-Dengue Campaign  " ,1,0,'C');
    $this->Cell(25,20,"Clean-up Drive  " ,1,0,'C');
    $this->Cell(33,20,"OL-Trap  " ,1,0,'C');
     $this->Ln(5);
    $this->Cell(30,20,"(a) " ,0,0,'C');
    $this->Cell(20,20,"(b1) " ,0,0,'C');
    $this->Cell(30,20," (b2)" ,0,0,'C');
    $this->Cell(30,20," (b3)" ,0,0,'C');
  
    
    $this->Cell(46,20,"(c1)" ,0,0,'C');
    $this->Cell(38,20,"(c2) " ,0,0,'C');
    $this->Cell(25,20," (c3)" ,0,0,'C');
    $this->Cell(33,20,"System Application " ,0,0,'C');
    $this->Cell(25,15,"Dengue Cases " ,0,1,'C');
  
     $this->Cell(30,20,"$b1" ,1,0,'C');
    $this->Cell(20,20," $b2" ,1,0,'C');
    $this->Cell(30,20," $b3" ,1,0,'C');
    $this->Cell(30,20," $b4" ,1,0,'C');
 
    
    $this->Cell(46,20,"$b5" ,1,0,'C');
    $this->Cell(38,20," $b6" ,1,0,'C');
    $this->Cell(25,20," $b7" ,1,0,'C');
    $this->Cell(33,20,"$b8" ,1,0,'C');
    $this->Cell(25,20,"$b9" ,1,0,'C');
     $this->Cell(25,20,"$b10" ,1,0,'C');
   
    
    
    
    

     
 
  
 
   
  
    
    
    
    
    
    
    
    
    
    
    
    
    //list of brgy case no.
     
    $this->Ln(40);
    $this->SetFont('Arial','B',12);
    $this->Cell(55,5,"Prepared By: ",5,0,'C');
    $this->Cell(305,5,"Attested By: ",5,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','BU',13);
    $this->Cell(100,5,"$sec",5,0,'C');//name of kalihim
    $this->Cell(225,5,"$cap",5,0,'C');//name of chairman
    $this->Ln(5);
    $this->SetFont('Arial','',12);
    $this->Cell(100,5,"Barangay Secretary/ Lupon Secretary",5,0,'C');
    $this->Cell(225,5,"Punong Barangay",5,0,'C');
    
    
   
    
}

}

// Instanciation of inherited class
$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
?>