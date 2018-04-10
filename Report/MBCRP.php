<?php    
require("fpdf/fpdf.php");  
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("ARIAL", "B","12");
$pdf->Cell(50,5,"MBCRP Form 2.2",5,5,'');  
$pdf->Cell(50,5,"",5,5,'C');  
$pdf->Cell(200,5,"MANILA BAY CLEAN UP, REHABILITATION AND PRESERVTION PROJECT", 5,5,'C');
$quat=$_POST['quarter'];
$year=$_POST['year'];
$pdf->Cell(200,5,"Quarter: $quat quarter Year:$year", 5,5,'C');
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(200,5,"SOLID WASTE MANAGEMENT",5,5,'C'); 
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(50,5,"GENERAL INFORMATION",5,5,''); 
$pdf->Cell(50,5,"",5,5,'C'); 
$brgyname=$_POST['brgyname'];
$pdf->Cell(50,5,"Name of Barangay: $brgyname                                                Municipality:INDANG ",5,5,'');
    

$pdf->Cell(50,5,"Provincial location: CAVITE                                    Regional location:IV-A (CALABARZON) ",5,5,'');
$totalpup=$_POST['totalpup'];
$household=$_POST['household'];
$pdf->Cell(50,5,"Total Population: $totalpup                                                    No: of Household:$household ",5,5,'');



$pdf->SetFont("ARIAL", "BU","14");
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(50,5,"MANDATORY SEGRAGATION OF WASTE AT SOURCE ",5,5,'');
$pdf->SetFont("ARIAL", "","14");

$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(100,5,"12. Determinne the compliance rate of the barangay. ",5,5,'');
$tnh=$_POST['tnh'];
$tnc=$_POST['tnc'];
$pdf->Cell(100,5,"3.1.Total number of households:$tnh ",5,5,'');
$pdf->Cell(100,5,"3.2.Total number of compliant of households:$tnc ",5,5,'');
$ca=$_POST['ca'];
$pdf->Cell(100,5,"3.3.Computed average Use formula blow $ca ",5,5,'');
$pdf->Cell(50,5,"",5,5,'C'); 

$pdf->Cell(100,5,"_____x100",5,5,'C');

$pdf->Cell(50,5,"",5,5,'C'); 


$pdf->Cell(100,5,"13.Based on the computed average, is the Barangay compliat?  ",5,5,'');
$pdf->Cell(100,5,"if average is 70% or higher, tick yes",5,5,'');
$pdf->Cell(100,5,"if average is 69% or higher, tick yes",5,5,'');

$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(100,5,"_____yes           _____No  ",5,5,'C');

$pdf->SetFont("ARIAL", "B","10");
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(100,5,"*The barangay must reach a maximum rate of 70% to be considered as complaint",5,5,'');
        
$pdf->Cell(50,5,"_________________________________________________________________________________________________________________________________________________________________________________",5,5,'C'); 
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->SetFont("ARIAL", "B","14");
$pdf->Cell(50,5,"FUNCTIONAL MATERIALS RECOVERY FACILITY ",5,5,'');
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->SetFont("ARIAL", "B","12");
$pdf->Cell(50,20,"14. Determine the compliance rate of the Barangay ",0,1,'');
$a1=$_POST['a1'];
$a2=$_POST['a2'];
$pdf->Cell(175,15,"",1,0,'C'); 
$pdf->Cell(20,15,"$a1",1,0,'C'); 
$pdf->Cell(0,0,"",0,1,'C'); 

$pdf->Cell(175,7,"Is there an existing MRF service the Barangay, whether Individual, cluster or    ",0,0); 
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(175,7,"municipal? (50%)",0,0); 
$pdf->Cell(0,8,"",0,1);
$pdf->Cell(175,15,"",1,0,'C'); 
$pdf->Cell(20,15,"$a2",1,0,'C'); 
$pdf->Cell(0,0,"",0,1,'C'); 

$pdf->Cell(175,7,"Does the existing MRF with an operational solid waste transfer station or sorting    ",0,0); 
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(175,7,"station, drop off center, a composting facility and a recyling facility? (50%)",0,0); 
$pdf->Cell(0,8,"",0,1);
$pdf->Cell(175,7,"",1,0,'C'); 
$pdf->Cell(20,7,"",1,0,'C'); 
$pdf->Cell(0,0,"",0,1,'C'); 
$pdf->Cell(175,7,"TOTAL",0,0); 
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(100,20,"15. Based on the total score is the LGU complaint? ",0,1,'');
$pdf->Cell(100,20,"   if score is 100%, tick yes",0,1,'');
$pdf->Cell(50,20,"   otherwise tick No, tick yes",0,1,'');

$pdf->Cell(100,20,"______Yes       _____ No",0,1,'');

$pdf->Cell(50,5,"_________________________________________________________________________________________________________________________________________________________________________________",5,5,'C'); 
$pdf->SetFont("ARIAL", "B","14");
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(50,5,"NO- LITTERING AND RELATED ORDINANCES ",5,5,'');
$pdf->Cell(0,7,"",0,1);
$pdf->SetFont("ARIAL", "B","12");
$pdf->Cell(50,5,"16. The Brangay has a No-Littering Ordinance  ",5,5,'');
$pdf->Cell(100,20,"______Yes       _____ No",0,1,'');
$pdf->Cell(50,5,"17. If yes, is the ordinance strictly implemented? conduct a radom oscular inspection ",5,5,'');
$pdf->Cell(100,20,"______Yes       _____ No",0,1,'');
$pdf->Cell(50,5,"_________________________________________________________________________________________________________________________________________________________________________________",5,5,'C'); 
   

 


$pdf->SetFont("ARIAL", "BU","14");
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(50,5,"NEXT STEPS",5,5,'');
$pdf->Ln(5);

 
$pdf->SetFont("ARIAL", "B","12");
$pdf->Cell(45,15,"",1,0,'L'); 
$pdf->Cell(50,15,"",1,0,'L'); 
$pdf->Cell(55,15,"",1,0,'L'); 
$pdf->Cell(40,15,"",1,0,'L'); 
$pdf->Cell(0,0,"",0,1,'L'); 

$pdf->Cell(45,7,"KEY LEGAL",0,0,'L'); 
$pdf->Cell(50,7,"LEGAL",0,0,'L'); 
$pdf->Cell(55,7,"REASON FOR LOW-",0,0,'L'); 
$pdf->Cell(40,7,"NEXT STEPS",0,0,'L'); 
$pdf->Cell(0,7,"",0,1);

$pdf->Cell(45,7,"PROVISION",0,0,'L'); 
$pdf->Cell(50,7,"CONSEQUENCES",0,0,'L'); 
$pdf->Cell(55,7,"COMPLIANCE",0,0,'L'); 
$k1=$_POST['k1'];
$k2=$_POST['k2'];
$k3=$_POST['k3'];
$k4=$_POST['k4'];
$l1=$_POST['l1'];
$l2=$_POST['l2'];
$l3=$_POST['l3'];
$l4=$_POST['l4'];
$r1=$_POST['r1'];
$r2=$_POST['r2'];
$r3=$_POST['r3'];
$r4=$_POST['r4'];
$n1=$_POST['n1'];
$n2=$_POST['n2'];
$n3=$_POST['n3'];
$n4=$_POST['n4'];
$pdf->Cell(0,8,"",0,1);
$pdf->Cell(45,7,"$k1",1,0,'L'); 
$pdf->Cell(50,7,"$l1",1,0,'L');
$pdf->Cell(55,7,"$r1",1,0,'L'); 
$pdf->Cell(40,7,"$n1",1,0,'L'); 
$pdf->Cell(0,0,"",0,1,'L'); 

$pdf->Cell(0,7,"",0,1);
$pdf->Cell(45,7,"$k2",1,0,'L'); 
$pdf->Cell(50,7,"$l2",1,0,'L');
$pdf->Cell(55,7,"$r2",1,0,'L'); 
$pdf->Cell(40,7,"$n2",1,0,'L'); 
$pdf->Cell(0,0,"",0,1,'L'); 

$pdf->Cell(0,7,"",0,1);
$pdf->Cell(45,7,"$k3",1,0,'L'); 
$pdf->Cell(50,7,"$l3",1,0,'L');
$pdf->Cell(55,7,"$r3",1,0,'L'); 
$pdf->Cell(40,7,"$n3",1,0,'L'); 
$pdf->Cell(0,0,"",0,1,'L'); 

$pdf->Cell(0,7,"",0,1);
$pdf->Cell(45,7,"$k4",1,0,'L'); 
$pdf->Cell(50,7,"$l4",1,0,'L');
$pdf->Cell(55,7,"$r4",1,0,'L'); 
$pdf->Cell(40,7,"$n4",1,0,'L'); 
$pdf->Cell(0,0,"",0,1,'L'); 
 
   
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"",5,3,'C'); 
$pdf->SetFont('Arial','B',12);
    $pdf->Cell(300,5,"ACCOMPLISHED BY:",5,0,'L');
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"NO- LITTERING AND RELATED ORDINANCES ",5,5,'');
    $pdf->Cell(0,1,"",0,1);


$name = $_POST['com'];
$name1 = $_POST['cap'];

    $pdf->SetFont('Arial','BU',12);
    $pdf->Cell(80,5,"$name",5,1,'C');
    
   $date = date('Y-M-d');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"Committee Chairman on Environment",5,0,'C');
$pdf->Cell(140,5,"$date",5,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"CERTIFIED TRUE AND CORRECT:",5,0,'C');
$pdf->Cell(140,5,"Date",5,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',12);
    $pdf->Cell(80,5,"name",5,0,'C');
    $pdf->Cell(140,5,"$date",5,1,'C');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"Punong Barangay",5,0,'C');
$pdf->Cell(140,5,"Date",5,5,'C');

    

    



$pdf->output();
?> 