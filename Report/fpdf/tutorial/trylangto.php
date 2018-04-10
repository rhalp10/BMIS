<?php require('../fpdf.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'salary_db');

$pdf = new FPDF('P','mm','Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,10,'Date',1,0,'C');
$pdf->Cell(30,10,'O.R. No.',1,0,'C');
$pdf->Cell(54,10,'Payor',1,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,'Nature of Collection',1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,10,'Amount',1,0,'C');
$pdf->Cell(0.1,5,'',1,1);


$pdf->Cell(109,0,'',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,5,'CTC',1);
$pdf->Cell(18,5,'Brgy Share',1);
$pdf->Cell(9,5,'',1);
$pdf->Cell(18,5,'Mun. Share',1);
$pdf->Cell(25,0,'',0);
$pdf->Cell(1,5,'',0,1);

$query = mysqli_query($con,"select * from employee_table");
while($res = mysqli_fetch_array($query)){
	
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,$res[line],1);
$pdf->Cell(30,5,$res[numdays],1);
$pdf->Cell(54,5,$res[ename],1);
$pdf->Cell(15,5,$res[stat],1);
$pdf->Cell(18,5,$res[stat],1);
$pdf->Cell(9,5,'',1);
$pdf->Cell(18,5,$res[stat],1);
$pdf->Cell(25,5,$res[gender],1);
$pdf->Cell(1,5,'',0,1);
	
	
}



$pdf->Output();


?>