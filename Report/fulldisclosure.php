<?php
require('fpdf/fpdf.php');




class PDF extends FPDF
{
// Page header
    
function Header()
{
    require('process.php');
   


    // Move to the right

    
   
    // Title
     $this->SetFont('Arial','B',8);
    $this->Cell(10,5,"Barangay Full Disclosure Monitoring Form No. 3",0,0,'L');
    // Title
    $this->Ln(10);
        // Arial bold 15
    $this->SetFont('Arial','B',12);
    $this->Cell(336,5,"BARANGAY COMPLIANCE TO FULL DISCLOSURE POLICY",0,1,'C');
    $this->Cell(336,5,"(DILG MC NO. 2014-81)",0,1,'C');
    $this->Cell(336,5,"FOR THE 3rd QUARTER of CY 2017",0,1,'C');
    
    $this->SetFont('Times','B',12);
    $this->Cell(180,5,"Region: REGION IV-A (CALABARZON)",5,5,'L');
    $this->Cell(180,5,"Province: CAVITE",5,5,'L');
    $this->Cell(180,5,"Cluster C, 7th District, INDANG, CAVITE",5,5,'L');
    $this->Ln(3);   
    
    $this->SetFont('Arial','B',9);
    $this->Cell(25,35,"" ,1,0,'C');
    $this->Cell(20,35,"" ,1,0,'C');
    $this->Cell(90,35,"" ,1,0,'C');    
    $this->Cell(30,35,"" ,1,0,'C');
     $this->Cell(45,35,"" ,1,0,'C');  
    $this->Cell(60,35,"" ,1,0,'C');
     $this->Cell(50,35,"" ,1,0,'C');
    $this->Cell(1,0,"" ,0,1,'C');
    
    $this->Cell(45,35,"" ,1,0,'C');
    $this->Cell(90,5,"ANNUAL" ,1,0,'C');    
    $this->Cell(30,5,"QUARTERLY" ,1,0,'C');
     $this->Cell(45,5,"MONTHLY" ,1,0,'C');  
    $this->Cell(60,5,"No. of Barangays Complaint to FDP" ,1,0,'C');
     $this->Cell(50,40,"" ,1,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    
    $this->Cell(45,0,"" ,0,0,'C');    
    $this->Cell(15,30,"" ,1,0,'C');    
    $this->Cell(25,30,"" ,1,0,'C');    
    $this->Cell(25,30,"" ,1,0,'C');    
    $this->Cell(25,30,"" ,1,0,'C');    
    $this->Cell(30,30,"" ,1,0,'C');
     $this->Cell(45,7,"" ,1,0,'C'); 
    $this->Cell(20,30,"" ,1,0,'C');
      $this->Cell(20,30,"" ,1,0,'C');
      $this->Cell(20,30,"" ,1,0,'C');
    $this->Cell(1,0,"" ,0,1,'C');
    
     $this->Cell(165,0,"" ,0,0,'C');    
    $this->SetFont('Arial','',8);
     $this->Cell(45,4,"Itemized Monthly" ,0,0,'C'); 
       $this->Cell(1,3,"" ,0,1,'C');
       $this->Cell(165,0,"" ,0,0,'C');    
  
     $this->Cell(45,4,"Collection" ,0,0,'C'); 
       $this->Cell(1,4,"" ,0,1,'C');
    
     $this->Cell(165,0,"" ,0,0,'C');    
  
     $this->Cell(15,23,"" ,1,0,'C');
    $this->Cell(15,23,"" ,1,0,'C');
    $this->Cell(15,23,"" ,1,0,'C');
      $this->Cell(0,0,"" ,0,1,'C');
      $this->SetFont('Arial','',9);
    
    
    
    $this->Cell(25,3,"CITY/" ,0,0,'C');    
    $this->Cell(20,3,"NAME OF" ,0,0,'C');    
        $this->Cell(15,3,"" ,0,0,'C');    
    $this->Cell(25,3,"SUMMARY" ,0,0,'C');    
    $this->Cell(25,3,"20%" ,0,0,'C');    
    $this->Cell(25,3,"ANNUAL" ,0,0,'C');    
    $this->Cell(30,3,"LIST OF" ,0,0,'C');
         $this->Cell(105,3,"" ,0,0,'C');
     $this->Cell(50,3,"REMARKS" ,0,0,'C');
    $this->Cell(1,4,"" ,0,1,'C');
    
     $this->Cell(25,3,"MUNICIPALITY" ,0,0,'C');    
    $this->Cell(20,3,"BARANGAY" ,0,0,'C');    
      $this->SetFont('Arial','',7);
        $this->Cell(15,3,"BARANGAY" ,0,0,'C');
    $this->SetFont('Arial','',9);
    $this->Cell(25,3,"INCOME AND" ,0,0,'C');    
    $this->Cell(25,3,"COMPONENT" ,0,0,'C');    
    $this->Cell(25,3,"PROCUREMENT" ,0,0,'C');    
    $this->Cell(30,3,"NOTICES OF" ,0,0,'C');
    $this->Cell(45,3,"" ,0,0,'C');
    $this->Cell(20,3,"Full" ,0,0,'C');
    $this->Cell(20,3,"Parcial" ,0,0,'C');
    $this->Cell(20,3,"None" ,0,0,'C');
    $this->Cell(1,4,"" ,0,1,'C');
    
  
    $this->Cell(45,3,"" ,0,0,'C');    
        $this->Cell(15,3,"BUDGET" ,0,0,'C');   
    $this->SetFont('Arial','',8);
    $this->Cell(25,3,"EXPENDITURES" ,0,0,'C');  
    $this->SetFont('Arial','',9);
    $this->Cell(25,3,"IRA" ,0,0,'C');    
    $this->Cell(25,3,"PLAN OR" ,0,0,'C');    
    $this->Cell(30,3,"AWARD" ,0,0,'C');
    $this->Cell(15,3,"1st" ,0,0,'C');
    $this->Cell(15,3,"2nd" ,0,0,'C');
    $this->Cell(15,3,"3rd" ,0,0,'C');
    $this->Cell(20,3,"Compliance" ,0,0,'C');
    $this->Cell(1,3,"" ,0,1,'C');
    
    $this->Cell(45,3,"" ,0,0,'C');    
        $this->Cell(15,3,"(1)" ,0,0,'C'); 
    $this->Cell(25,3,"(2)" ,0,0,'C');  
    $this->Cell(25,3,"UTILIZATION" ,0,0,'C');    
    $this->Cell(25,3,"PROCUREMENT" ,0,0,'C');    
    $this->Cell(30,3,"(5)" ,0,0,'C');
    $this->Cell(15,3,"(___)" ,0,0,'C');
    $this->Cell(15,3,"(___)" ,0,0,'C');
    $this->Cell(15,3,"(___)" ,0,0,'C'); 
    $this->Cell(1,3,"" ,0,1,'C');
    
     $this->Cell(85,3,"" ,0,0,'C');    
        $this->Cell(25,3,"(3)" ,0,0,'C');    
    $this->Cell(25,3,"LIST (4)" ,0,0,'C');
    $this->Cell(1,9,"" ,0,1,'C');
 
    
    for($x=0;$x<8;$x++){
        
         $this->Cell(25,5,"" ,1,0,'C');
    $this->Cell(20,5,"" ,1,0,'C');
    $this->Cell(15,5,"" ,1,0,'C'); 
    $this->Cell(25,5,"" ,1,0,'C'); 
    $this->Cell(25,5,"" ,1,0,'C'); 
    $this->Cell(25,5,"" ,1,0,'C'); 
    $this->Cell(30,5,"" ,1,0,'C');
     $this->Cell(15,5,"" ,1,0,'C'); 
     $this->Cell(15,5,"" ,1,0,'C'); 
     $this->Cell(15,5,"" ,1,0,'C'); 
    $this->Cell(20,5,"" ,1,0,'C');
     $this->Cell(20,5,"" ,1,0,'C');
     $this->Cell(20,5,"" ,1,0,'C');
     $this->Cell(50,5,"" ,1,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    }
      
    
   /// $this->SetFont('Arial','B',12); 
   ///// $this->Cell(170,5,"Prepared by:" ,0,0);
   ////// $this->Cell(170,5,"Sumitted by:" ,0,0);
   ///////// $this->Cell(1,20,"" ,0,1,'C');
    

    
    
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