<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Page header
    
function Header()
{
	
include('dbcon.php');

    session_start();
	$id = $_GET['id'];
   $ins_query1="SELECT * FROM `report_attendancemonitoring` where attendancemonitoring_id = '$id'";
					$result = mysqli_query($db, $ins_query1);  
					$row = mysqli_fetch_array($result);
					

    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    
   
    // Title
    $this->Cell(335,15,"PERSONNEL ATTENDANCE MONITORING",0,0,'C');
    $this->Cell(1,5,"" ,0,1,'C');
    $this->Cell(336,20,"Attendance Monitoring Form 1A",0,0,'C');
    $this->Cell(1,10,"" ,0,1,'C');
    $this->Cell(336,14,"For The ".$row['quater']." Quarter",0,1,'C');
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
    
    
   ////////////////////
    $ins_query11="SELECT * FROM `report_attendance` where attendance_id = '$id'";
					$result1 = mysqli_query($db, $ins_query11); 
					$num_rows = mysqli_num_rows($result1);				
					if( $num_rows > 0 ){
						while($row1 = mysqli_fetch_array($result1)){
        
							$this->Cell(20,1,"" ,0,0,'C');
							$this->Cell(52,10,"".$row['brgy']."" ,1,0,'C');
							$this->Cell(52,10,"".$row1['name_personnel']."" ,1,0,'C');
							$this->Cell(53,10,"".$row1['nature_absent']."" ,1,0,'C');
							$this->Cell(53,10,"".$row1['nature_tard']."" ,1,0,'C');
							$this->Cell(40,10,"".$row1['station']."" ,1,0,'C');
							$this->Cell(49,10,"".$row1['position']."" ,1,0,'C');
							$this->Cell(1,10,"" ,0,1,'C');
        
						}	
						if($num_rows<7){
							for($i=$num_rows;$i<7;$i++){
								
								$this->Cell(20,1,"" ,0,0,'C');
								$this->Cell(52,10,"" ,1,0,'C');
								$this->Cell(52,10,"",1,0,'C');
								$this->Cell(53,10,"" ,1,0,'C');
								$this->Cell(53,10,"" ,1,0,'C');
								$this->Cell(40,10,"" ,1,0,'C');
								$this->Cell(49,10,"" ,1,0,'C');
								$this->Cell(1,10,"" ,0,1,'C');
							}
							
						}
					}
					else{
						
						for($i=0;$i<7;$i++){
								
								$this->Cell(20,1,"" ,0,0,'C');
								$this->Cell(52,10,"" ,1,0,'C');
								$this->Cell(52,10,"",1,0,'C');
								$this->Cell(53,10,"" ,1,0,'C');
								$this->Cell(53,10,"" ,1,0,'C');
								$this->Cell(40,10,"" ,1,0,'C');
								$this->Cell(49,10,"" ,1,0,'C');
								$this->Cell(1,10,"" ,0,1,'C');
							}
					}
					
     

    $this->Ln(4);
    $this->Cell(20,5,"" ,0,0,'C');
      $this->Cell(170,0,"Prepared by:" ,0,0);
    $this->Cell(150,0,"Submitted by:" ,0,0);
    
    $cap = $row['subby'];
    $sec = $row['prepby'];
    
    
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
      $this->Cell(300,10,"".$row['notedby']."" ,0,1,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(300,0,"Mayor" ,0,1,'C');
    
}

}

// Instanciation of inherited class

$pdf = new PDF('L','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

 $pdf->Image($picngbmis, 25, 10, 50, 30, 'png');
 $pdf->Image($picngbmis1, 290, 10, 35, 30, 'png'); 
$pdf->Output();
?>