<?php
ob_start();
require_once ('mysql_connect.php');


//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2010-08-08
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage("L");

// set some text to print
/*
$txt = <<<EOD
TCPDF Example 002

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;
*/



// print a block of text using Write()
//------disabled ko-------$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

// ---------------------------------------------------------


// ############################################		STUDENT EVALUATION  #########################################################

$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from studeval where empcode='$empid' and semyear = '$semyear' limit 30";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

$stud_ave1=0;
$stud_ave2=0;
$stud_ave3=0;
$stud_ave4=0;
$stud_ave5=0;
$stud_ave6=0;
$stud_ave7=0;
$stud_ave8=0;
$stud_ave9=0;
$stud_ave10=0;
$stud_ave11=0;
$stud_ave12=0;
$stud_ave13=0;
$stud_ave14=0;
$stud_ave15=0;
$stud_ave16=0;
$stud_ave17=0;
$stud_ave18=0;
$stud_ave19=0;
$stud_ave20=0;

$stud_sum1=0;
$stud_sum2=0;
$stud_sum3=0;
$stud_sum4=0;
$stud_sum5=0;
$stud_sum6=0;
$stud_sum7=0;
$stud_sum8=0;
$stud_sum9=0;
$stud_sum10=0;
$stud_sum11=0;
$stud_sum12=0;
$stud_sum13=0;
$stud_sum14=0;
$stud_sum15=0;
$stud_sum16=0;
$stud_sum17=0;
$stud_sum18=0;
$stud_sum19=0;
$stud_sum20=0;

if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$stud_sum1 = $stud_sum1+$row['0'];
		$stud_sum2 = $stud_sum2+$row['1'];
		$stud_sum3 = $stud_sum3+$row['2'];
		$stud_sum4 = $stud_sum4+$row['3'];
		$stud_sum5 = $stud_sum5+$row['4'];		
		$stud_sum6 = $stud_sum6+$row['5'];		
		$stud_sum7 = $stud_sum7+$row['6'];		
		$stud_sum8 = $stud_sum8+$row['7'];		
		$stud_sum9 = $stud_sum9+$row['8'];		
		$stud_sum10 = $stud_sum10+$row['9'];		
		$stud_sum11 = $stud_sum11+$row['10'];		
		$stud_sum12 = $stud_sum12+$row['11'];		
		$stud_sum13 = $stud_sum13+$row['12'];		
		$stud_sum14 = $stud_sum14+$row['13'];		
		$stud_sum15 = $stud_sum15+$row['14'];		
		$stud_sum16 = $stud_sum16+$row['15'];		
		$stud_sum17 = $stud_sum17+$row['16'];		
		$stud_sum18 = $stud_sum18+$row['17'];		
		$stud_sum19 = $stud_sum19+$row['18'];		
		$stud_sum20 = $stud_sum20+$row['19'];		
		
	} // END OF WHILE

	
		$stud_ave1 = $stud_sum1/$num;
		$stud_ave2 = $stud_sum2/$num;
		$stud_ave3 = $stud_sum3/$num;
		$stud_ave4 = $stud_sum4/$num;
		$stud_ave5 = $stud_sum5/$num;		
		$stud_ave6 = $stud_sum6/$num;		
		$stud_ave7 = $stud_sum7/$num;		
		$stud_ave8 = $stud_sum8/$num;		
		$stud_ave9 = $stud_sum9/$num;		
		$stud_ave10 = $stud_sum10/$num;
		$stud_ave11 = $stud_sum11/$num;
		$stud_ave12 = $stud_sum12/$num;
		$stud_ave13 = $stud_sum13/$num;
		$stud_ave14 = $stud_sum14/$num;
		$stud_ave15 = $stud_sum15/$num;		
		$stud_ave16 = $stud_sum16/$num;		
		$stud_ave17 = $stud_sum17/$num;		
		$stud_ave18 = $stud_sum18/$num;		
		$stud_ave19 = $stud_sum19/$num;	
		$stud_ave20 = $stud_sum20/$num;
	
	/*
	$a1=($stud_ave1/$num)+($stud_ave2/$num)+($stud_ave3/$num)+($stud_ave4/$num)+($stud_ave5/$num);

	$b1=($stud_ave6/$num)+($stud_ave7/$num)+($stud_ave8/$num)+($stud_ave9/$num)+($stud_ave10/$num);
	
	$c1=($stud_ave11/$num)+($stud_ave12/$num)+($stud_ave13/$num)+($stud_ave14/$num)+($stud_ave15/$num);
	$d1=($stud_ave16/$num)+($stud_ave17/$num)+($stud_ave18/$num)+($stud_ave19/$num)+($stud_ave20/$num);
	
	//$rate1=number_format($rate1, 2, '.', '');
	$rate1=$a1*4*.2;
	$rate2=$b1*4*.2;
	$rate3=$c1*4*.3;
	$rate4=$d1*4*.3;
	*/
	
}//wnd of if

// ########################################## END OF STUDENT EVALUATION 	##########################################


// ############################################		PEER EVALUATION  #########################################################

$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from eval_fac where empcode='$empid' and semyear = '$semyear' limit 5";	
	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

$peer_ave1=0;
$peer_ave2=0;
$peer_ave3=0;
$peer_ave4=0;
$peer_ave5=0;
$peer_ave6=0;
$peer_ave7=0;
$peer_ave8=0;
$peer_ave9=0;
$peer_ave10=0;
$peer_ave11=0;
$peer_ave12=0;
$peer_ave13=0;
$peer_ave14=0;
$peer_ave15=0;
$peer_ave16=0;
$peer_ave17=0;
$peer_ave18=0;
$peer_ave19=0;
$peer_ave20=0;

$peer_sum1=0;
$peer_sum2=0;
$peer_sum3=0;
$peer_sum4=0;
$peer_sum5=0;
$peer_sum6=0;
$peer_sum7=0;
$peer_sum8=0;
$peer_sum9=0;
$peer_sum10=0;
$peer_sum11=0;
$peer_sum12=0;
$peer_sum13=0;
$peer_sum14=0;
$peer_sum15=0;
$peer_sum16=0;
$peer_sum17=0;
$peer_sum18=0;
$peer_sum19=0;
$peer_sum20=0;

if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$peer_sum1 = $peer_sum1+$row['0'];
		$peer_sum2 = $peer_sum2+$row['1'];
		$peer_sum3 = $peer_sum3+$row['2'];
		$peer_sum4 = $peer_sum4+$row['3'];
		$peer_sum5 = $peer_sum5+$row['4'];		
		$peer_sum6 = $peer_sum6+$row['5'];		
		$peer_sum7 = $peer_sum7+$row['6'];		
		$peer_sum8 = $peer_sum8+$row['7'];		
		$peer_sum9 = $peer_sum9+$row['8'];		
		$peer_sum10 = $peer_sum10+$row['9'];		
		$peer_sum11 = $peer_sum11+$row['10'];		
		$peer_sum12 = $peer_sum12+$row['11'];		
		$peer_sum13 = $peer_sum13+$row['12'];		
		$peer_sum14 = $peer_sum14+$row['13'];		
		$peer_sum15 = $peer_sum15+$row['14'];		
		$peer_sum16 = $peer_sum16+$row['15'];		
		$peer_sum17 = $peer_sum17+$row['16'];		
		$peer_sum18 = $peer_sum18+$row['17'];		
		$peer_sum19 = $peer_sum19+$row['18'];		
		$peer_sum20 = $peer_sum20+$row['19'];		
		
	} // END OF WHILE

	
		$peer_ave1 = $peer_sum1/$num;
		$peer_ave2 = $peer_sum2/$num;
		$peer_ave3 = $peer_sum3/$num;
		$peer_ave4 = $peer_sum4/$num;
		$peer_ave5 = $peer_sum5/$num;		
		$peer_ave6 = $peer_sum6/$num;		
		$peer_ave7 = $peer_sum7/$num;		
		$peer_ave8 = $peer_sum8/$num;		
		$peer_ave9 = $peer_sum9/$num;		
		$peer_ave10 = $peer_sum10/$num;
		$peer_ave11 = $peer_sum11/$num;
		$peer_ave12 = $peer_sum12/$num;
		$peer_ave13 = $peer_sum13/$num;
		$peer_ave14 = $peer_sum14/$num;
		$peer_ave15 = $peer_sum15/$num;		
		$peer_ave16 = $peer_sum16/$num;		
		$peer_ave17 = $peer_sum17/$num;		
		$peer_ave18 = $peer_sum18/$num;		
		$peer_ave19 = $peer_sum19/$num;	
		$peer_ave20 = $peer_sum20/$num;
	
	/*
	$a1=($stud_ave1/$num)+($stud_ave2/$num)+($stud_ave3/$num)+($stud_ave4/$num)+($stud_ave5/$num);

	$b1=($stud_ave6/$num)+($stud_ave7/$num)+($stud_ave8/$num)+($stud_ave9/$num)+($stud_ave10/$num);
	
	$c1=($stud_ave11/$num)+($stud_ave12/$num)+($stud_ave13/$num)+($stud_ave14/$num)+($stud_ave15/$num);
	$d1=($stud_ave16/$num)+($stud_ave17/$num)+($stud_ave18/$num)+($stud_ave19/$num)+($stud_ave20/$num);
	
	//$rate1=number_format($rate1, 2, '.', '');
	$rate1=$a1*4*.2;
	$rate2=$b1*4*.2;
	$rate3=$c1*4*.3;
	$rate4=$d1*4*.3;
	*/
	
}//wnd of if

// ########################################## END OF PEER EVALUATION 	##########################################

// ############################################		self EVALUATION  #########################################################

$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from eval_self where empcode='$empid' and semyear = '$semyear'";	
	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

$self_ave1=0;
$self_ave2=0;
$self_ave3=0;
$self_ave4=0;
$self_ave5=0;
$self_ave6=0;
$self_ave7=0;
$self_ave8=0;
$self_ave9=0;
$self_ave10=0;
$self_ave11=0;
$self_ave12=0;
$self_ave13=0;
$self_ave14=0;
$self_ave15=0;
$self_ave16=0;
$self_ave17=0;
$self_ave18=0;
$self_ave19=0;
$self_ave20=0;

$self_sum1=0;
$self_sum2=0;
$self_sum3=0;
$self_sum4=0;
$self_sum5=0;
$self_sum6=0;
$self_sum7=0;
$self_sum8=0;
$self_sum9=0;
$self_sum10=0;
$self_sum11=0;
$self_sum12=0;
$self_sum13=0;
$self_sum14=0;
$self_sum15=0;
$self_sum16=0;
$self_sum17=0;
$self_sum18=0;
$self_sum19=0;
$self_sum20=0;

if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$self_sum1 = $self_sum1+$row['0'];
		$self_sum2 = $self_sum2+$row['1'];
		$self_sum3 = $self_sum3+$row['2'];
		$self_sum4 = $self_sum4+$row['3'];
		$self_sum5 = $self_sum5+$row['4'];		
		$self_sum6 = $self_sum6+$row['5'];		
		$self_sum7 = $self_sum7+$row['6'];		
		$self_sum8 = $self_sum8+$row['7'];		
		$self_sum9 = $self_sum9+$row['8'];		
		$self_sum10 = $self_sum10+$row['9'];		
		$self_sum11 = $self_sum11+$row['10'];		
		$self_sum12 = $self_sum12+$row['11'];		
		$self_sum13 = $self_sum13+$row['12'];		
		$self_sum14 = $self_sum14+$row['13'];		
		$self_sum15 = $self_sum15+$row['14'];		
		$self_sum16 = $self_sum16+$row['15'];		
		$self_sum17 = $self_sum17+$row['16'];		
		$self_sum18 = $self_sum18+$row['17'];		
		$self_sum19 = $self_sum19+$row['18'];		
		$self_sum20 = $self_sum20+$row['19'];		
		
	} // END OF WHILE

	
		$self_ave1 = $self_sum1/$num;
		$self_ave2 = $self_sum2/$num;
		$self_ave3 = $self_sum3/$num;
		$self_ave4 = $self_sum4/$num;
		$self_ave5 = $self_sum5/$num;		
		$self_ave6 = $self_sum6/$num;		
		$self_ave7 = $self_sum7/$num;		
		$self_ave8 = $self_sum8/$num;		
		$self_ave9 = $self_sum9/$num;		
		$self_ave10 = $self_sum10/$num;
		$self_ave11 = $self_sum11/$num;
		$self_ave12 = $self_sum12/$num;
		$self_ave13 = $self_sum13/$num;
		$self_ave14 = $self_sum14/$num;
		$self_ave15 = $self_sum15/$num;		
		$self_ave16 = $self_sum16/$num;		
		$self_ave17 = $self_sum17/$num;		
		$self_ave18 = $self_sum18/$num;		
		$self_ave19 = $self_sum19/$num;	
		$self_ave20 = $self_sum20/$num;
	
	/*
	$a1=($stud_ave1/$num)+($stud_ave2/$num)+($stud_ave3/$num)+($stud_ave4/$num)+($stud_ave5/$num);

	$b1=($stud_ave6/$num)+($stud_ave7/$num)+($stud_ave8/$num)+($stud_ave9/$num)+($stud_ave10/$num);
	
	$c1=($stud_ave11/$num)+($stud_ave12/$num)+($stud_ave13/$num)+($stud_ave14/$num)+($stud_ave15/$num);
	$d1=($stud_ave16/$num)+($stud_ave17/$num)+($stud_ave18/$num)+($stud_ave19/$num)+($stud_ave20/$num);
	
	//$rate1=number_format($rate1, 2, '.', '');
	$rate1=$a1*4*.2;
	$rate2=$b1*4*.2;
	$rate3=$c1*4*.3;
	$rate4=$d1*4*.3;
	*/
	
}//wnd of if

// ########################################## END OF self EVALUATION 	##########################################

// ############################################		sup EVALUATION  #########################################################

$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

$sup_ave1=0;
$sup_ave2=0;
$sup_ave3=0;
$sup_ave4=0;
$sup_ave5=0;
$sup_ave6=0;
$sup_ave7=0;
$sup_ave8=0;
$sup_ave9=0;
$sup_ave10=0;
$sup_ave11=0;
$sup_ave12=0;
$sup_ave13=0;
$sup_ave14=0;
$sup_ave15=0;
$sup_ave16=0;
$sup_ave17=0;
$sup_ave18=0;
$sup_ave19=0;
$sup_ave20=0;

$sup_sum1=0;
$sup_sum2=0;
$sup_sum3=0;
$sup_sum4=0;
$sup_sum5=0;
$sup_sum6=0;
$sup_sum7=0;
$sup_sum8=0;
$sup_sum9=0;
$sup_sum10=0;
$sup_sum11=0;
$sup_sum12=0;
$sup_sum13=0;
$sup_sum14=0;
$sup_sum15=0;
$sup_sum16=0;
$sup_sum17=0;
$sup_sum18=0;
$sup_sum19=0;
$sup_sum20=0;

if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$sup_sum1 = $sup_sum1+$row['0'];
		$sup_sum2 = $sup_sum2+$row['1'];
		$sup_sum3 = $sup_sum3+$row['2'];
		$sup_sum4 = $sup_sum4+$row['3'];
		$sup_sum5 = $sup_sum5+$row['4'];		
		$sup_sum6 = $sup_sum6+$row['5'];		
		$sup_sum7 = $sup_sum7+$row['6'];		
		$sup_sum8 = $sup_sum8+$row['7'];		
		$sup_sum9 = $sup_sum9+$row['8'];		
		$sup_sum10 = $sup_sum10+$row['9'];		
		$sup_sum11 = $sup_sum11+$row['10'];		
		$sup_sum12 = $sup_sum12+$row['11'];		
		$sup_sum13 = $sup_sum13+$row['12'];		
		$sup_sum14 = $sup_sum14+$row['13'];		
		$sup_sum15 = $sup_sum15+$row['14'];		
		$sup_sum16 = $sup_sum16+$row['15'];		
		$sup_sum17 = $sup_sum17+$row['16'];		
		$sup_sum18 = $sup_sum18+$row['17'];		
		$sup_sum19 = $sup_sum19+$row['18'];		
		$sup_sum20 = $sup_sum20+$row['19'];		
		
	} // END OF WHILE

	
		$sup_ave1 = $sup_sum1/$num;
		$sup_ave2 = $sup_sum2/$num;
		$sup_ave3 = $sup_sum3/$num;
		$sup_ave4 = $sup_sum4/$num;
		$sup_ave5 = $sup_sum5/$num;		
		$sup_ave6 = $sup_sum6/$num;		
		$sup_ave7 = $sup_sum7/$num;		
		$sup_ave8 = $sup_sum8/$num;		
		$sup_ave9 = $sup_sum9/$num;		
		$sup_ave10 = $sup_sum10/$num;
		$sup_ave11 = $sup_sum11/$num;
		$sup_ave12 = $sup_sum12/$num;
		$sup_ave13 = $sup_sum13/$num;
		$sup_ave14 = $sup_sum14/$num;
		$sup_ave15 = $sup_sum15/$num;		
		$sup_ave16 = $sup_sum16/$num;		
		$sup_ave17 = $sup_sum17/$num;		
		$sup_ave18 = $sup_sum18/$num;		
		$sup_ave19 = $sup_sum19/$num;	
		$sup_ave20 = $sup_sum20/$num;
	
	/*
	$a1=($stud_ave1/$num)+($stud_ave2/$num)+($stud_ave3/$num)+($stud_ave4/$num)+($stud_ave5/$num);

	$b1=($stud_ave6/$num)+($stud_ave7/$num)+($stud_ave8/$num)+($stud_ave9/$num)+($stud_ave10/$num);
	
	$c1=($stud_ave11/$num)+($stud_ave12/$num)+($stud_ave13/$num)+($stud_ave14/$num)+($stud_ave15/$num);
	$d1=($stud_ave16/$num)+($stud_ave17/$num)+($stud_ave18/$num)+($stud_ave19/$num)+($stud_ave20/$num);
	
	//$rate1=number_format($rate1, 2, '.', '');
	$rate1=$a1*4*.2;
	$rate2=$b1*4*.2;
	$rate3=$c1*4*.3;
	$rate4=$d1*4*.3;
	*/
	
}//wnd of if

// ########################################## END OF sup EVALUATION 	##########################################

// ########################################## COMPUTATION OF AVERAGE	##########################################

$sum_ave1=($stud_ave1+$peer_ave1+$self_ave1+$sup_ave1)/4;
$sum_ave2=($stud_ave2+$peer_ave2+$self_ave2+$sup_ave2)/4;
$sum_ave3=($stud_ave3+$peer_ave3+$self_ave3+$sup_ave3)/4;
$sum_ave4=($stud_ave4+$peer_ave4+$self_ave4+$sup_ave4)/4;
$sum_ave5=($stud_ave5+$peer_ave5+$self_ave5+$sup_ave5)/4;
$sum_ave6=($stud_ave6+$peer_ave6+$self_ave6+$sup_ave6)/4;
$sum_ave7=($stud_ave7+$peer_ave7+$self_ave7+$sup_ave7)/4;
$sum_ave8=($stud_ave8+$peer_ave8+$self_ave8+$sup_ave8)/4;
$sum_ave9=($stud_ave9+$peer_ave9+$self_ave9+$sup_ave9)/4;
$sum_ave10=($stud_ave10+$peer_ave10+$self_ave10+$sup_ave10)/4;
$sum_ave11=($stud_ave11+$peer_ave11+$self_ave11+$sup_ave11)/4;
$sum_ave12=($stud_ave12+$peer_ave12+$self_ave12+$sup_ave12)/4;
$sum_ave13=($stud_ave13+$peer_ave13+$self_ave13+$sup_ave13)/4;
$sum_ave14=($stud_ave14+$peer_ave14+$self_ave14+$sup_ave14)/4;
$sum_ave15=($stud_ave15+$peer_ave15+$self_ave15+$sup_ave15)/4;
$sum_ave16=($stud_ave16+$peer_ave16+$self_ave16+$sup_ave16)/4;
$sum_ave17=($stud_ave17+$peer_ave17+$self_ave17+$sup_ave17)/4;
$sum_ave18=($stud_ave18+$peer_ave18+$self_ave18+$sup_ave18)/4;
$sum_ave19=($stud_ave19+$peer_ave19+$self_ave19+$sup_ave19)/4;
$sum_ave20=($stud_ave20+$peer_ave20+$self_ave20+$sup_ave20)/4;


//--------------for part 1--------------------------
$sum_part1 = $sum_ave1 +$sum_ave2 +$sum_ave3 +$sum_ave4 +$sum_ave5;
$sum_part1= number_format($sum_part1, 2, '.', '');
$sum_rate1 = $sum_part1*4;
$sum_rate1= number_format($sum_rate1, 2, '.', '');
$sum_weight1 = $sum_rate1*.2;
$sum_weight1= number_format($sum_weight1, 2, '.', '');
//---------------------------------------------------

//--------------for part 2--------------------------
$sum_part2 = $sum_ave6 +$sum_ave7 +$sum_ave8 +$sum_ave9 +$sum_ave10;
$sum_part2= number_format($sum_part2, 2, '.', '');
$sum_rate2 = $sum_part2*4;
$sum_rate2= number_format($sum_rate2, 2, '.', '');
$sum_weight2 = $sum_rate2*.2;
$sum_weight2= number_format($sum_weight2, 2, '.', '');
//---------------------------------------------------
//--------------for part 3--------------------------
$sum_part3 = $sum_ave11 +$sum_ave12 +$sum_ave13 +$sum_ave14 +$sum_ave15;
$sum_part3= number_format($sum_part3, 2, '.', '');
$sum_rate3 = $sum_part3*4;
$sum_rate3= number_format($sum_rate3, 2, '.', '');
$sum_weight3 = $sum_rate3*.3;
$sum_weight3= number_format($sum_weight3, 2, '.', '');
//---------------------------------------------------
//--------------for part 4--------------------------
$sum_part4 = $sum_ave16 +$sum_ave17 +$sum_ave18 +$sum_ave19 +$sum_ave20;
$sum_part4= number_format($sum_part4, 2, '.', '');
$sum_rate4 = $sum_part4*4;
$sum_rate4= number_format($sum_rate4, 2, '.', '');
$sum_weight4 = $sum_rate4*.3;
$sum_weight4= number_format($sum_weight4, 2, '.', '');
//---------------------------------------------------

//--------------for total score -------------------------
$stud_total = (($stud_ave1+$stud_ave2+$stud_ave3+$stud_ave4+$stud_ave5)*4*.2)+(($stud_ave6+$stud_ave7+$stud_ave8+$stud_ave9+$stud_ave10)*4*.2)+(($stud_ave11+$stud_ave12+$stud_ave13+$stud_ave14+$stud_ave15)*4*.3)+(($stud_ave16+$stud_ave17+$stud_ave18+$stud_ave19+$stud_ave20)*4*.3);
$peer_total = (($peer_ave1+$peer_ave2+$peer_ave3+$peer_ave4+$peer_ave5)*4*.2)+(($peer_ave6+$peer_ave7+$peer_ave8+$peer_ave9+$peer_ave10)*4*.2)+(($peer_ave11+$peer_ave12+$peer_ave13+$peer_ave14+$peer_ave15)*4*.3)+(($peer_ave16+$peer_ave17+$peer_ave18+$peer_ave19+$peer_ave20)*4*.3);
$self_total = (($self_ave1+$self_ave2+$self_ave3+$self_ave4+$self_ave5)*4*.2)+(($self_ave6+$self_ave7+$self_ave8+$self_ave9+$self_ave10)*4*.2)+(($self_ave11+$self_ave12+$self_ave13+$self_ave14+$self_ave15)*4*.3)+(($self_ave16+$self_ave17+$self_ave18+$self_ave19+$self_ave20)*4*.3);
$sup_total = (($sup_ave1+$sup_ave2+$sup_ave3+$sup_ave4+$sup_ave5)*4*.2)+(($sup_ave6+$sup_ave7+$sup_ave8+$sup_ave9+$sup_ave10)*4*.2)+(($sup_ave11+$sup_ave12+$sup_ave13+$sup_ave14+$sup_ave15)*4*.3)+(($sup_ave16+$sup_ave17+$sup_ave18+$sup_ave19+$sup_ave20)*4*.3);


$stud_total=number_format($stud_total, 2, '.', '');
$peer_total=number_format($peer_total, 2, '.', '');
$self_total=number_format($self_total, 2, '.', '');
$sup_total=number_format($sup_total, 2, '.', '');

$total_sum = $sum_weight1+$sum_weight2+$sum_weight3+$sum_weight4;
$total_sum=number_format($total_sum, 2, '.', '');
//---------------------------------------------------

if($stud_total==0||$peer_total==0||$sup_total==0||$self_total==0){
	
header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/sum_revert.php");
}


 ########################################## END OF computaTION 	##########################################
$query = "SELECT lastname,firstname,ccode from faculty where empid='$empid' ";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { 
$row = mysql_fetch_array($result, MYSQL_NUM);
$name = $row['0'].", ".$row['1'];
$ccode= $row['2'];
}	



//###########################################################################################################################
//#															FIRST PART														#
//###########################################################################################################################



$html1 = '

<table border="0" width = "800">
	<tr><td colspan="2"><b>Summary of Evaluation</b></td></tr>
	<tr><td width="20%"><b>Faculty Code:</b></td><td width="80%"> '.$empid.'</td></tr>
	<tr><td width="20%"><b>Faculty Name:</b></td><td width="80%"> '.$name.'</td></tr>
	<tr><td width="20%"><b>College:</b></td><td width="80%"> '.$ccode.'</td></tr>
</table>
<table border="1" width = "800">
	<tr><td align ="center"><b>Summary</b></td></tr>
</table>

<table border="1" width = "800">
	<tr>
		<td width ="30" rowspan="2"><b>&nbsp;</b></td>
		<td width ="70" align="center" rowspan="2"><b>Rating</b></td>
		<td align = "center" width ="100"><b>Student</b></td>
		<td align = "center" width ="100"><b>Peer</b></td>
		<td align = "center" width ="100"><b>Self</b></td>
		<td align = "center" width ="100"><b>Supervisor</b></td>
		<td align = "center" width ="100" rowspan="2"><b> Raw score per area</b></td>
		<td align = "center" width ="100" rowspan="2"><b> Rating per area</b></td>
		<td align = "center" width ="100" rowspan="2"><b>Weighted rating</b></td>
	</tr>
	<tr>
		<td align = "center"><b>25%</b></td>
		<td align = "center"><b>25%</b></td>
		<td align = "center"><b>25%</b></td>
		<td align = "center"><b>25%</b></td>
	
	</tr>
</table>

					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "800">
	<tr>
		<td width="300"><b> I. Commitment</b></td>
		<td width= "100" align="center"><b> 20%</b></td>
		<td width= "100" align="center">&nbsp;</td>

		<td width= "100" align="center"><b> '.$sum_part1.'</b></td>
		<td width= "100" align="center"><b>'.$sum_rate1.'</b></td>
		<td width= "100" align="center"><b>'.$sum_weight1.'</b></td>
	</tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="800">

<tr>

	<td width="30" align ="center">
	
	
		<table border="1">
		<tr><td>1</td></tr>
		<tr><td>2</td></tr>
		<tr><td>3</td></tr>
		<tr><td>4</td></tr>
		<tr><td>5</td></tr>
		</table>
	
	
	</td>



	<td width="70" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sum_ave1, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave2, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave3, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave4, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave5, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($stud_ave1, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave2, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave3, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave4, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave5, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>	
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($peer_ave1, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave2, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave3, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave4, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave5, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($self_ave1, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave2, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave3, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave4, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave5, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sup_ave1, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave2, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave3, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave4, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave5, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>

</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>
';

//###########################################################################################################################
//#															SECOND PART														#
//###########################################################################################################################

$html2 = '

					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "800">
	<tr>
		<td width="300"><b> II.  Knowledge of Subject</b></td>
		<td width= "100" align="center"><b> 20%</b></td>
		<td width= "100" align="center">&nbsp;</td>

		<td width= "100" align="center"><b> '.$sum_part2.'</b></td>
		<td width= "100" align="center"><b>'.$sum_rate2.'</b></td>
		<td width= "100" align="center"><b>'.$sum_weight2.'</b></td>
	</tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="800">

<tr>

	<td width="30" align ="center">
	
	
		<table border="1">
		<tr><td>1</td></tr>
		<tr><td>2</td></tr>
		<tr><td>3</td></tr>
		<tr><td>4</td></tr>
		<tr><td>5</td></tr>
		</table>
	
	
	</td>



	<td width="70" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sum_ave6, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave7, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave8, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave9, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave10, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($stud_ave6, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave7, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave8, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave9, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave10, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>	
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($peer_ave6, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave7, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave8, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave9, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave10, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($self_ave6, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave7, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave8, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave9, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave10, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sup_ave6, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave7, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave8, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave9, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave10, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>

</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>
';


//###########################################################################################################################
//#															THIRD PART														#
//###########################################################################################################################

$html3 = '

					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "800">
	<tr>
		<td width="300"><b> III.  Teaching for Independent Learning</b></td>
		<td width= "100" align="center"><b> 30%</b></td>
		<td width= "100" align="center">&nbsp;</td>

		<td width= "100" align="center"><b> '.$sum_part3.'</b></td>
		<td width= "100" align="center"><b>'.$sum_rate3.'</b></td>
		<td width= "100" align="center"><b>'.$sum_weight3.'</b></td>
	</tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="800">

<tr>

	<td width="30" align ="center">
	
	
		<table border="1">
		<tr><td>1</td></tr>
		<tr><td>2</td></tr>
		<tr><td>3</td></tr>
		<tr><td>4</td></tr>
		<tr><td>5</td></tr>
		</table>
	
	
	</td>



	<td width="70" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sum_ave11, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave12, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave13, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave14, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave15, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($stud_ave11, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave12, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave13, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave14, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave15, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>	
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($peer_ave11, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave12, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave13, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave14, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave15, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($self_ave11, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave12, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave13, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave14, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave15, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sup_ave11, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave12, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave13, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave14, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave15, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>

</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>
';
//###########################################################################################################################
//#															FOURTH PART														#
//###########################################################################################################################

$html4 = '

					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "800">
	<tr>
		<td width="300"><b> IV.  Management of Learning</b></td>
		<td width= "100" align="center"><b> 30%</b></td>
		<td width= "100" align="center">&nbsp;</td>

		<td width= "100" align="center"><b> '.$sum_part4.'</b></td>
		<td width= "100" align="center"><b>'.$sum_rate4.'</b></td>
		<td width= "100" align="center"><b>'.$sum_weight4.'</b></td>
	</tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="800">

<tr>

	<td width="30" align ="center">
	
	
		<table border="1">
		<tr><td>1</td></tr>
		<tr><td>2</td></tr>
		<tr><td>3</td></tr>
		<tr><td>4</td></tr>
		<tr><td>5</td></tr>
		</table>
	
	
	</td>



	<td width="70" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sum_ave16, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave17, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave18, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave19, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sum_ave20, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($stud_ave16, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave17, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave18, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave19, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($stud_ave20, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>	
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($peer_ave16, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave17, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave18, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave19, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($peer_ave20, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($self_ave16, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave17, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave18, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave19, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($self_ave20, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	
	<td width="100" align ="center">
	
	
		<table border="1">
			<tr><td>'.number_format($sup_ave16, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave17, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave18, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave19, 2, '.', '').'</td></tr>
			<tr><td>'.number_format($sup_ave20, 2, '.', '').'</td></tr>
		</table>
	
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>
	<td width="100" align ="center">
	
	
		&nbsp;
	
	</td>

</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>
';







$html5='<table border="1" width = "800">

<tr><td width="100" align="center"><b> Total Rating</b></td>
<td width= "100" align="center"><b>'.$stud_total.'</b></td>
<td width= "100" align="center"><b>'.$peer_total.'</b></td>
<td width= "100" align="center"><b>'.$self_total.'</b></td>
<td width= "100" align="center"><b>'.$sup_total.'</b></td>
<td width= "100" align="center"><b>&nbsp;</b></td>
<td width= "100" align="center"><b>&nbsp;</b></td>
<td width= "100" align="center" bgcolor= "#3366FF"><b>'.$total_sum.'</b></td>

</tr>

</table>

<table border="0" width = "800">
<tr><td align="right"><b> &nbsp;</b></td></tr>

<tr><td align="right"><b> _______________________________</b></td></tr>
<tr><td align="right"><b> VP FOR ACADEMIC AFFAIRS</b></td></tr>
</table>'
;




$html=$html1.$html2.$html3.$html4.$html5;
$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document
//$pdf->Output("studeval.pdf", "D");
$pdf->Output("sumeval_".$name.".pdf", "I");



$pdf->AddPage();
//============================================================+
// END OF FILE                                                
//============================================================+
mysql_close();
ob_flush();

//----------------USING A LOG-----------------
				
				$open = fopen("../../dbmschange_log.txt",'a+');
				
				date_default_timezone_set('Asia/Hong_Kong');
				
				if($open){//date('l jS \of F Y h:i:s P')
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " viewed a record. viewed " . $empid . " - ( ".$name." ) summary evaluation of ". $_COOKIE['semyear']."\r\n'studeval,eval_sup,eval_fac,eval_sup' - 4 tables affected - 1 record organized\r\n";
				
						if(fwrite($open,$content)) {
						echo "good";
						}
						else
						{
						echo "cant write";
						}
				}
				else
				{
				echo "cant open";
				}

				
				
				//--------------------------------------------

?>