<?php


 require('fpdf/fpdf.php');



                            

  
// Instanciation of inherited class
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
   
    $pdf->Image($picngbmis, 10, 10, 50, 30, 'png');


$pdf->Output();
?>