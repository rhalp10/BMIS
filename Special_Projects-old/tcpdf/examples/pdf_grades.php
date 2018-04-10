<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2010-11-20
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
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
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
require_once ('../../mysql_connect.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$semyear= $_COOKIE['semyear'];
$username= $_COOKIE['username'];
$s=$_GET['s'];
$query = "select a.subj_code,a.subj_desc,g.subj_grade,s.lname,s.fname,s.mname,s.course from grades g, student s, subject a where g.stud_num = s.stud_num and a.subj_code = g.subj_code and semyear = '$s'";	
$result = @mysql_query ($query); // Run the query.
$row = mysql_fetch_array($result, MYSQL_NUM);
$l = $row[3];
$f = $row[4];
$n = $row[5];
$course = $row[6];

$query = "select a.subj_code,a.subj_desc,g.subj_grade,s.lname,s.fname,s.mname,g.unit,g.credit from grades g, student s, subject a where g.stud_num = s.stud_num and a.subj_code = g.subj_code and semyear = '$s' and g.stud_num=$username";	
$result = @mysql_query ($query); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

if ($num > 0) { // If it ran OK, display the records.

$html1 = '
		<table border = "0" width="650" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAVITE STATE UNIVERSITY </b></td></tr>
			<tr><td  align ="center"><b>Indang, Cavite</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>
<br>
<big><b>Name: '.$l.', '.$f.' '.$n.'</b></big><br>
<big><b>Course: '.$course.'</b></big><br>
<big><b>Semester and School Year: '.substr($s,9,3) .' Sem - '.substr($s,0,9).'</b></big><br>
<p>&nbsp;</p>


<table align="center" cellspacing="2" cellpadding="2" border="1">
	<tr><td align="center" width = "15%"><b>Subject Code</b></td><td align="center" width = "55%"><b>Description</b></td><td align="center" width = "10%"><b>Grade</b></td><td align="center" width = "10%"><b>Unit(s)</b></td><td align="center" width = "10%"><b>Credit Unit(s)</b></td></tr> ';
	// Fetch and print all the records.
	$grade = 0;
	$ctr = 0;
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
$grade = $grade + ($row[6]*$row[2]);
$ctr = $ctr + $row[6];
		$html2= $html2.'<tr><td align=\"left\">' . stripslashes($row[0]) . '</td><td align=\"left\">'.$row[1].'</td><td align=\"left\">'.number_format($row[2], 2, '.', '').'</td><td align="center" width = "10%"><b>'.number_format($row[6], 2, '.', '').'</b></td><td align="center" width = "10%"><b>'.number_format($row[7], 2, '.', '').'</b></td></tr>';
	}//end of while
$grade = $grade/ $ctr;
	$html3 ='</table>
	<p>&nbsp;</p>
	<table border = "0" >
	<tr><td>GPA:'.number_format($grade, 2, '.', '').'</td></tr>
	</table>
	<p>&nbsp;</p>
	<p align="right">
	<table border = "0" align = "center">
	<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan = "2" align="right">___________________</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Registrar</td></tr>
	</table>
	</p>
	';
}//wnd of if

else { // If it did not run OK.
	$html1='<p>There are currently no grades.</p>'; 
	$html2='';
	$html3='';
	
}


mysql_close();
$html=$html1.$html2.$html3;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($s.'grades.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
//----------------USING A LOG-----------------
				
				$open = fopen("../../dbmschange_log.txt",'a+');
				
				date_default_timezone_set('Asia/Hong_Kong');
				
				if($open){//date('l jS \of F Y h:i:s P')
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " queried records of students in AY " . $semyear . "\r\n'student' - Records viewed\r\n";
				
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