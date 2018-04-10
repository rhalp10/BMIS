<?php
//include connection file 
include_once("db.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(80,10,'List of Projects',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('project_id'=>'id',
'aip'=> 'AIP',
 'program'=> 'Activities',
  'department'=>'Department',
   'source'=>'Source of Fund',
    'e_output'=>'Expected Output',
     'start'=>'Year Started',
    'end'=>'Year Completed',
       'amount'=>'Project Cost',
        'status'=>'Status');

$result = mysqli_query($connString, "SELECT * FROM youth_investment") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM youth_invesment");
ob_start();

    
$pdf = new PDF();
//header
$pdf->AddPage();
//footer page
$pdf->AliasNbPages();

$pdf->SetFont('Arial', 'B', 8, 0, 'C');
foreach($header as $heading) {

$pdf->Cell(27.5,12,$display_heading[$heading['Field']],1, 0, 'C');
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(27.5,10,$column,1, 0, 'C');
}
$pdf->Output();

ob_end_flush();
?>