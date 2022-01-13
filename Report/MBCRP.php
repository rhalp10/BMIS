<?php    
session_start();
$id = $_GET['id'];
require("fpdf/fpdf.php");
	include('dbcon.php');
$ins_query1="SELECT * FROM manila_step WHERE step_id = '$id'";
					
					
  
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont("ARIAL", "B","12");

$ins_query2="SELECT * FROM ref_manilabay WHERE mb_ID = '$id'";
$result1 = mysqli_query($db, $ins_query2);
$row1 = mysqli_fetch_array($result1);
	
 $pdf->Image($picngbmis, 10, 10, 50, 30, 'png');
 
 $pdf->Image($picngbmis1, 160, 10, 33, 28, 'png'); 
 
$pdf->Cell(50,5,"",5,5,'');  
$pdf->Cell(50,5,"",5,5,'C');  
$pdf->Cell(200,5,"MANILA BAY CLEAN UP, REHABILITATION", 5,5,'C');
$pdf->Ln(1);
$pdf->Cell(200,5,"AND PRESERVTION PROJECT", 5,5,'C');
$quat=$row1['quarter'];
$year=$row1['year'];
$pdf->Cell(200,5,"Quarter: $quat quarter Year:$year", 5,5,'C');
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(200,5,"SOLID WASTE MANAGEMENT",5,5,'C'); 
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(50,5,"GENERAL INFORMATION",5,5,''); 
$pdf->Cell(50,5,"",5,5,'C'); 
$brgyname=strtoupper($_SESSION['barangay']);
$pdf->Cell(50,5,"Name of Barangay: $brgyname                                                Municipality:General Trias ",5,5,'');
    

$pdf->Cell(50,5,"Provincial location: CAVITE                                    Regional location:IV-A (CALABARZON) ",5,5,'');
$totalpup=$row1['population'];
$household=$row1['household'];
$pdf->Cell(50,5,"Total Population: $totalpup                                                    No: of Household:$household ",5,5,'');



$pdf->SetFont("ARIAL", "BU","14");
$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(50,5,"MANDATORY SEGRAGATION OF WASTE AT SOURCE ",5,5,'');
$pdf->SetFont("ARIAL", "","14");

$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(100,5,"12. Determinne the compliance rate of the barangay. ",5,5,'');

$tnc=$row1['tnc'];
$pdf->Cell(100,5,"3.1.Total number of households:$household ",5,5,'');
$pdf->Cell(100,5,"3.2.Total number of compliant of households:$tnc ",5,5,'');
$ca=$row1['ca'];
$pdf->Cell(100,5,"3.3.Computed average Use formula blow $ca ",5,5,'');
$pdf->Cell(50,5,"",5,5,'C'); 

$pdf->Cell(100,5,"_____x100",5,5,'C');

$pdf->Cell(50,5,"",5,5,'C'); 
$check = '';
$echeck = '';
if($row1['ch1']=="YES"){
	$check = '/';
}else{

$echeck	= "/";
}

$pdf->Cell(100,5,"13.Based on the computed average, is the Barangay compliat?  ",5,5,'');
$pdf->Cell(100,5,"if average is 70% or higher, tick yes",5,5,'');
$pdf->Cell(100,5,"if average is 69% or higher, tick yes",5,5,'');

$pdf->Cell(50,5,"",5,5,'C'); 
$pdf->Cell(100,5,"$check yes          $echeck No  ",5,5,'C');

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
$a1=$row1['a1'];
$a2=$row1['a2'];
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
$check = '';
$echeck = '';

if($row1['cch1']=="YES"){
	$check = '/';
}else{

$echeck	= "/";
}
$pdf->Cell(100,20,"$check Yes      $echeck No",0,1,'');

$pdf->Cell(50,5,"_________________________________________________________________________________________________________________________________________________________________________________",5,5,'C'); 
$pdf->SetFont("ARIAL", "B","14");
$pdf->Cell(0,7,"",0,1);
$pdf->Cell(50,5,"NO- LITTERING AND RELATED ORDINANCES ",5,5,'');
$pdf->Cell(0,7,"",0,1);
$pdf->SetFont("ARIAL", "B","12");
$pdf->Cell(50,5,"16. The Brangay has a No-Littering Ordinance  ",5,5,'');
$check = '';
$echeck = '';
if($row1['cc1']=="YES"){
	$check = '/';
}else{

$echeck	= "/";
}
$pdf->Cell(100,20,"$check Yes       $echeck No",0,1,'');
$pdf->Cell(50,5,"17. If yes, is the ordinance strictly implemented? conduct a radom oscular inspection ",5,5,'');
$check = '';
$echeck = '';
if($row1['cc3']=="YES"){
	$check = '/';
}else{

$echeck	= "/";
}
$pdf->Cell(100,20,"$check Yes       $echeck No",0,1,'');
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
$pdf->Cell(0,8,"",0,1);
$result = mysqli_query($db, $ins_query1);
while($row = mysqli_fetch_assoc( $result )){
	$k = $row['k'];
	$l = $row['l'];
	$r = $row['r'];
	$n = $row['n'];

	
$pdf->Cell(45,7,"$k",1,0,'L'); 
$pdf->Cell(50,7,"$l",1,0,'L');
$pdf->Cell(55,7,"$r",1,0,'L'); 
$pdf->Cell(40,7,"$n",1,0,'L'); 
$pdf->Cell(0,7,"",0,1,'L'); 
	
}

 
 
   
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"",5,3,'C'); 
$pdf->SetFont('Arial','B',12);
    $pdf->Cell(300,5,"ACCOMPLISHED BY:",5,0,'L');
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"",5,5,'C'); 
    $pdf->Cell(50,5,"NO- LITTERING AND RELATED ORDINANCES ",5,5,'');
    $pdf->Cell(0,1,"",0,1);

$accom = $row1['accomby'];

    $pdf->SetFont('Arial','BU',12);
    $pdf->Cell(80,5,"$accom",5,1,'C');
    
   $date = $row1['date_save'];
   $try = substr($date,0,10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"Committee Chairman on Environment",5,0,'C');
$pdf->Cell(140,5,"$try",5,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"CERTIFIED TRUE AND CORRECT:",5,0,'C');
$pdf->Cell(140,5,"Date",5,1,'C');
$pdf->Ln(10);
$cap = $row1['brgycaptain'];
$pdf->SetFont('Arial','BU',12);
    $pdf->Cell(80,5,"$cap",5,0,'C');
    $pdf->Cell(140,5,"$try",5,1,'C');

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,5,"Punong Barangay",5,0,'C');
$pdf->Cell(140,5,"Date",5,5,'C');

    

    



$pdf->output();
?> 