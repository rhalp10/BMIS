<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',12);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();
?>
