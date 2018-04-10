<?php
ob_start();
require_once ('mysql_connect.php');

 function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
	
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
$pdf->AddPage();

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


if(isset($_POST['tersup']))
{
	
	$semyear=$_POST['semyear'];
	$empid=$_POST['empid'];
	$semsy= $_COOKIE['semsy'];
	$sem= $_COOKIE['sem'];
	 
	
	$query = "SELECT empname,year,college,sem,studr,selfr,peerr,supr,res,ext,prod,cou,hr,punc,ini,str,lea,plus,ops,enr,ear,emprem,ratrem from ter where empid='$empid' and sem = '$sem' and year = '$semsy' limit 1";	
	
		
	$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
	$num = mysql_num_rows($result); // How many records are there?
	$row = mysql_fetch_array($result, MYSQL_NUM);
	$empname=	$row['0'];
	$year=	$row['1'];
	$college=	$row['2'];
	$sem=	$row['3'];
	$studr=	$row['4'];
	$selfr=	$row['5'];
	$peerr=	$row['6'];
	$supr=	$row['7'];
	
	$res=	$row['8'];
	$ext=	$row['9'];
	$prod=	$row['10'];
	$cou=	$row['11'];
	$hr=	$row['12'];
	$punc=	$row['13'];
	$ini=	$row['14'];
	$str=	$row['15'];
	$lea=	$row['16'];
	$plus=	$row['17'];
	$ops=	$row['18'];
	$enr=	$row['19'];
	$ear=	$row['20'];
	$emprem=	$row['21'];
	$ratrem=	$row['22'];
	
	
	 ########################################## END OF computaTION 	##########################################
	$r_studr = number_format(($studr/10), 2, '.', '');
	$r2_studr= number_format(($r_studr*.2), 2, '.', '');
	$r_selfr = number_format(($selfr/10), 2, '.', '');
	$r2_selfr= number_format(($r_selfr*.1), 2, '.', '');
	$r_supr = number_format(($supr/10), 2, '.', '');
	$r2_supr= number_format(($r_supr*.15), 2, '.', '');
	$r_peerr = number_format(($peerr/10), 2, '.', '');
	$r2_peerr= number_format(($r_peerr*.1), 2, '.', '');
	
	$r_res=number_format(($res*.05), 2, '.', '');
	$r_ext=number_format(($ext*.05), 2, '.', '');
	$r_prod=number_format(($prod*.05), 2, '.', '');
	
	$r_cou=number_format(($cou*.05), 2, '.', '');
	$r_hr=number_format(($hr*.05), 2, '.', '');
	$r_punc=number_format(($punc*.05), 2, '.', '');
	$r_ini=number_format(($ini*.05), 2, '.', '');
	$r_str=number_format(($str*.05), 2, '.', '');
	$r_lea=number_format(($lea*.05), 2, '.', '');
	
	$plus=number_format($plus, 2, '.', '');
	
	$ops=number_format($ops, 2, '.', '');
	$enr=number_format($enr, 2, '.', '');
	 ########################################## END OF computaTION 	##########################################
	
	
	
	//###########################################################################################################################
	//#															FIRST PART														#
	//###########################################################################################################################
	
	
	
	$html1 = '
	<table border = "0" width="650" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAMARINES NORTE STATE COLLEGE</b></td></tr>
			<tr><td  align ="center"><b>Daet, Camarines Norte</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
			<tr><td  align ="center"><b>TEACHER EFFICIENCY RATING (TER)</b></td></tr>   
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>
	<table border = "0" width="650">
			<tr>
				<td width="105"><b>Name:</b></td><td width="320"> '.$empname.'</td>
				<td width="105"><b>Rating Period:</b></td> <td width="120"> '.$sem.'</td>
			   
			 </tr>    
			 <tr>
				<td width="105"><b>College :</b></td><td width="320"> '.$college.'</td>
				<td width="105"><b>Year :</b></td> <td width="120"> '.$semsy.'</td>
			   
			 </tr>
			
	</table>
	<hr />
	<table border = 0 width="650">
			<tr>
				<td width="225" ><b>I. Performance</b></td>
				<td width="85" align ="center"><b>70%</b></td>
				<td width="85" align ="center"><b>Rating</b></td>
				<td width="85" align ="center"><b>Rating Equivalent</b></td>
				<td width="85" align ="center"><b>Rating Percentage</b></td>
				<td width="85" align ="center"><b>Point Score</b></td>
				
			</tr>
	</table>
	<hr />
	<table border = 0 width="650">
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205" colspan="6"><b>1. Instruction</b></td>
			   
				
			</tr>
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student as Rater</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center"><u>'.$studr.'</u></td>
				<td width="85" align ="center"><u>'.$r_studr.'</u></td>
				<td width="85" align ="center"><u>20%</u></td>
				<td width="85" align ="center"><u>'.$r2_studr.'</u></td>
				
			</tr>
	
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self as Rater</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center"><u>'.$selfr.'</u></td>
				<td width="85" align ="center"><u>'.$r_selfr.'</u></td>
				<td width="85" align ="center"><u>10%</u></td>
				<td width="85" align ="center"><u>'.$r2_selfr.'</u></td>
				
			</tr>
	
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peer as Rater</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center"><u>'.$peerr.'</u></td>
				<td width="85" align ="center"><u>'.$r_peerr.'</u></td>
				<td width="85" align ="center"><u>10%</u></td>
				<td width="85" align ="center"><u>'.$r2_peerr.'</u></td>
				
			</tr>
	
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supervisor as Rater</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center"><u>'.$supr.'</u></td>
				<td width="85" align ="center"><u>'.$r_supr.'</u></td>
				<td width="85" align ="center"><u>15%</u></td>
				<td width="85" align ="center"><u>'.$r2_supr.'</u></td>
				
			</tr>
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 2. Research</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$res.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_res.'</u></td>
				
			</tr>
					<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 3. Extension Service</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$ext.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_ext.'</u></td>
				
			</tr>
					<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 4. Productivity</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$prod.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_prod.'</u></td>
				
			</tr>
	 
	 </table>
	 <hr />
	 <table border = "0" width="650">
			<tr>
				<td width="225" ><b>II. Behaviour</b></td>
				<td width="85" align ="center"><b>30%</b></td>
				<td width="85" align ="center"><b>&nbsp;</b></td>
				<td width="85" align ="center"><b>&nbsp;</b></td>
				<td width="85" align ="center"><b>&nbsp;</b></td>
				<td width="85" align ="center"><b>&nbsp;</b></td>
				
			</tr>
	</table>
	 <hr />
	 <table border = "0" width="650">
		  
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 1. Courtesy</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$cou.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_cou.'</u></td>
				
			</tr>
					<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 2. Human Relations</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$hr.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_hr.'</u></td>
				
			</tr>
					<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 3. Punctualtity and Attendance</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$punc.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_punc.'</u></td>
				
			</tr>
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 4. Initiative</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$ini.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_ini.'</u></td>
				
			</tr>
				 
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 5. Leadership</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$lea.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_lea.'</u></td>
				
			</tr>
				 
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="205"><b> 6. Stress Tolerance</b></td>
				<td width="85" align ="center"><u>&nbsp;</u></td>
				<td width="85" align ="center">&nbsp;</td>
				<td width="85" align ="center"><u>'.$str.'</u></td>
				<td width="85" align ="center"><u>5%</u></td>
				<td width="85" align ="center" ><u>'.$r_str.'</u></td>
				
			</tr>
			<tr>
				<td width="20" colspan = "7"><b>&nbsp;</b></td>
				 
			</tr>
		
		  
			
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="290"><b>&nbsp;</b></td>
				<td width="255" colspan="4"> PLUS FACTOR (not to exceed one (1) credit point)</td>
				<td width="85" align ="center"><u>'.$plus.'</u></td>
				
						
			</tr>
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="290"><b>&nbsp;</b></td>
				<td width="255"> Overall Point Score</td>
				<td width="85" align ="center"><u>'.$ops.'</u></td>
				
						
			</tr>
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="290"><b>&nbsp;</b></td>
				<td width="255"> Equivalent Numerical Rating</td>
				<td width="85" align ="center"><u>'.$enr.'</u></td>
				
						
			</tr>
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="290"><b>&nbsp;</b></td>
				<td width="255"> Equivalent Adjective Rating</td>
				<td width="85" align ="center"><u>'.$ear.'</u></td>
				
						
			</tr>
	
	</table>
	
	 <hr />
	  <table border = "0" width="650">
			<tr>
				<td><b>Descriptive Equivalent of Numerical Ratings:</b></td>
			</tr>
			<tr>
				<td><b>&nbsp;</b></td>
				 
			</tr>
	
			<tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="185"><b>&nbsp;</b></td>
				<td width="85" align="center">9.3   above</td>
				<td width="275">- Outstanding (O)</td>
						
			</tr>
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="185"><b>&nbsp;</b></td>
				<td width="85" align="center">7.5 - 9.2</td>
				<td width="275">- Very Satisfactory  (VS)</td>
				<td width="85"><b>&nbsp;</b></td>
				
						
			</tr>
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="185"><b>&nbsp;</b></td>
				<td width="85" align="center">5.0 - 7.4</td>
				<td width="275">- Satisfactory  (S)</td>
				<td width="85"><b>&nbsp;</b></td>
				
						
			</tr>
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="185"><b>&nbsp;</b></td>
				<td width="85" align="center">3.0 - 4.9</td>
				<td width="275">- Fair       (F)</td>
				<td width="85"><b>&nbsp;</b></td>
				
						
			</tr>
			 <tr>
				<td width="20"><b>&nbsp;</b></td>
				<td width="185"><b>&nbsp;</b></td>
				<td width="85" align="center">2.0 - 2.9</td>
				<td width="275">- Unsatisfactory      (US)</td>
				<td width="85"><b>&nbsp;</b></td>
				
						
			</tr>
								<tr><td width="30">&nbsp;</td></tr>
	
	</table>
	<table border ="0" width="650">
			<tr>
				<td width="310">
				
					 <table border = "0" width="325">
						<tr><td width="300" ><b>EMPLOYEE\'S COMMENTS/REMARKS</b></td></tr>
						<tr><td width="300" ><textarea name="emprem" rows="5" cols="37"  readonly="readonly">'.$emprem.'</textarea></td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="300" ><b>RATER\'S COMMENTS/REMARKS</b></td></tr>
						<tr><td width="300" ><textarea name="ratrem" rows="5" cols="37" readonly="readonly">'.ratrem.'</textarea></td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
						<tr><td width="30">&nbsp;</td></tr>
					</table>
				
			  
				</td>
				  
				<!--
				<td width="30">&nbsp;
				
						 
				</td>
				-->
				<td width="310">
			
					 <table border = 1 width="310">
						<tr><td width="225" ><b>DISCUSSED RATING WITH:</b></td></tr>
						<tr><td width="225" ><b>&nbsp;</b></td></tr>
						<tr><td width="310" ><b>____________________________________________</b></td></tr>
						<tr><td width="310"  align="center"><b>Signature of Ratee / Date</b></td></tr>
						<tr><td width="225" ><b>&nbsp;</b></td></tr>
	
						<tr><td width="310" ><b>____________________________________________</b></td></tr>
						<tr><td width="310"  align="center"><b>Signature of Rater / Date</b></td></tr>
						<tr><td width="225" ><b>&nbsp;</b></td></tr>
	
						<tr><td width="310" ><b>____________________________________________</b></td></tr>
						<tr><td width="310"  align="center"><b>Signature of Rater\'s Supervisor / Date</b></td></tr>
						
					</table>
				
			
				
				</td>
				
							
			</tr>
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
}//end of if tersup

if(isset($_POST['terfac']))
{
		$semyear=$_POST['semyear'];
		$empid=$_POST['empid1'];
		$semsy= $_COOKIE['semsy'];
		$sem= $_COOKIE['sem'];
		 
		
		$query = "SELECT empname,year,college,sem,studr,selfr,peerr,supr,res,ext,prod,cou,hr,punc,ini,str,lea,plus,ops,enr,ear,emprem,ratrem from ter where empid='$empid' and sem = '$sem' and year = '$semsy' limit 1";	
			
		$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
		$num = mysql_num_rows($result); // How many records are there?
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$empname=	$row['0'];
		$year=	$row['1'];
		$college=	$row['2'];
		$sem=	$row['3'];
		$studr=	$row['4'];
		$selfr=	$row['5'];
		$peerr=	$row['6'];
		$supr=	$row['7'];
		
		$res=	$row['8'];
		$ext=	$row['9'];
		$prod=	$row['10'];
		$cou=	$row['11'];
		$hr=	$row['12'];
		$punc=	$row['13'];
		$ini=	$row['14'];
		$str=	$row['15'];
		$lea=	$row['16'];
		$plus=	$row['17'];
		$ops=	$row['18'];
		$enr=	$row['19'];
		$ear=	$row['20'];
		$emprem=	$row['21'];
		$ratrem=	$row['22'];
		
		
		 ########################################## END OF computaTION 	##########################################
		$r_studr = number_format(($studr/10), 2, '.', '');
		$r2_studr= number_format(($r_studr*.2), 2, '.', '');
		$r_selfr = number_format(($selfr/10), 2, '.', '');
		$r2_selfr= number_format(($r_selfr*.1), 2, '.', '');
		$r_supr = number_format(($supr/10), 2, '.', '');
		$r2_supr= number_format(($r_supr*.15), 2, '.', '');
		$r_peerr = number_format(($peerr/10), 2, '.', '');
		$r2_peerr= number_format(($r_peerr*.1), 2, '.', '');
		
		$r_res=number_format(($res*.05), 2, '.', '');
		$r_ext=number_format(($ext*.05), 2, '.', '');
		$r_prod=number_format(($prod*.05), 2, '.', '');
		
		$r_cou=number_format(($cou*.075), 2, '.', '');
		$r_hr=number_format(($hr*.075), 2, '.', '');
		$r_punc=number_format(($punc*.075), 2, '.', '');
		$r_ini=number_format(($ini*.075), 2, '.', '');
		
		$plus=number_format($plus, 2, '.', '');
		
		$ops=number_format($ops, 2, '.', '');
		$enr=number_format($enr, 2, '.', '');
		 ########################################## END OF computaTION 	##########################################
		
		
		
		//###########################################################################################################################
		//#															FIRST PART														#
		//###########################################################################################################################
		
		
		
		$html1 = '
		<table border = "0" width="650" align = "center">
				<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
				<tr><td  align ="center"><b>CAMARINES NORTE STATE COLLEGE</b></td></tr>
				<tr><td  align ="center"><b>Daet, Camarines Norte</b></td></tr>
				<tr><td  align ="center"><b>&nbsp;</b></td></tr>
				<tr><td  align ="center"><b>TEACHER EFFICIENCY RATING (TER)</b></td></tr>   
				<tr><td  align ="center"><b>&nbsp;</b></td></tr>
		</table>
		<table border = "0" width="650">
				<tr>
					<td width="105"><b>Name:</b></td><td width="320"> '.$empname.'</td>
					<td width="105"><b>Rating Period:</b></td> <td width="120"> '.$sem.'</td>
				   
				 </tr>    
				 <tr>
					<td width="105"><b>College :</b></td><td width="320"> '.$college.'</td>
					<td width="105"><b>Year :</b></td> <td width="120"> '.$semsy.'</td>
				   
				 </tr>
				
		</table>
		<hr />
		<table border = 0 width="650">
				<tr>
					<td width="225" ><b>I. Performance</b></td>
					<td width="85" align ="center"><b>70%</b></td>
					<td width="85" align ="center"><b>Rating</b></td>
					<td width="85" align ="center"><b>Rating Equivalent</b></td>
					<td width="85" align ="center"><b>Rating Percentage</b></td>
					<td width="85" align ="center"><b>Point Score</b></td>
					
				</tr>
		</table>
		<hr />
		<table border = 0 width="650">
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205" colspan="6"><b>1. Instruction</b></td>
				   
					
				</tr>
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student as Rater</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center"><u>'.$studr.'</u></td>
					<td width="85" align ="center"><u>'.$r_studr.'</u></td>
					<td width="85" align ="center"><u>20%</u></td>
					<td width="85" align ="center"><u>'.$r2_studr.'</u></td>
					
				</tr>
		
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self as Rater</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center"><u>'.$selfr.'</u></td>
					<td width="85" align ="center"><u>'.$r_selfr.'</u></td>
					<td width="85" align ="center"><u>10%</u></td>
					<td width="85" align ="center"><u>'.$r2_selfr.'</u></td>
					
				</tr>
		
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peer as Rater</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center"><u>'.$peerr.'</u></td>
					<td width="85" align ="center"><u>'.$r_peerr.'</u></td>
					<td width="85" align ="center"><u>10%</u></td>
					<td width="85" align ="center"><u>'.$r2_peerr.'</u></td>
					
				</tr>
		
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supervisor as Rater</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center"><u>'.$supr.'</u></td>
					<td width="85" align ="center"><u>'.$r_supr.'</u></td>
					<td width="85" align ="center"><u>15%</u></td>
					<td width="85" align ="center"><u>'.$r2_supr.'</u></td>
					
				</tr>
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 2. Research</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$res.'</u></td>
					<td width="85" align ="center"><u>5%</u></td>
					<td width="85" align ="center" ><u>'.$r_res.'</u></td>
					
				</tr>
						<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 3. Extension Service</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$ext.'</u></td>
					<td width="85" align ="center"><u>5%</u></td>
					<td width="85" align ="center" ><u>'.$r_ext.'</u></td>
					
				</tr>
						<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 4. Productivity</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$prod.'</u></td>
					<td width="85" align ="center"><u>5%</u></td>
					<td width="85" align ="center" ><u>'.$r_prod.'</u></td>
					
				</tr>
		 
		 </table>
		 <hr />
		 <table border = "0" width="650">
				<tr>
					<td width="225" ><b>II. Behaviour</b></td>
					<td width="85" align ="center"><b>30%</b></td>
					<td width="85" align ="center"><b>&nbsp;</b></td>
					<td width="85" align ="center"><b>&nbsp;</b></td>
					<td width="85" align ="center"><b>&nbsp;</b></td>
					<td width="85" align ="center"><b>&nbsp;</b></td>
					
				</tr>
		</table>
		 <hr />
		 <table border = "0" width="650">
			  
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 1. Courtesy</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$cou.'</u></td>
					<td width="85" align ="center"><u>7.5%</u></td>
					<td width="85" align ="center" ><u>'.$r_cou.'</u></td>
					
				</tr>
						<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 2. Human Relations</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$hr.'</u></td>
					<td width="85" align ="center"><u>7.5%</u></td>
					<td width="85" align ="center" ><u>'.$r_hr.'</u></td>
					
				</tr>
						<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 3. Punctualtity and Attendance</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$punc.'</u></td>
					<td width="85" align ="center"><u>7.5%</u></td>
					<td width="85" align ="center" ><u>'.$r_punc.'</u></td>
					
				</tr>
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="205"><b> 4. Initiative</b></td>
					<td width="85" align ="center"><u>&nbsp;</u></td>
					<td width="85" align ="center">&nbsp;</td>
					<td width="85" align ="center"><u>'.$ini.'</u></td>
					<td width="85" align ="center"><u>7.5%</u></td>
					<td width="85" align ="center" ><u>'.$r_ini.'</u></td>
					
				</tr>
					 
				
				<tr>
					<td width="20" colspan = "7"><b>&nbsp;</b></td>
					 
				</tr>
			
			  
				
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="290"><b>&nbsp;</b></td>
					<td width="255" colspan="4"> PLUS FACTOR (not to exceed one (1) credit point)</td>
					<td width="85" align ="center"><u>'.$plus.'</u></td>
					
							
				</tr>
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="290"><b>&nbsp;</b></td>
					<td width="255"> Overall Point Score</td>
					<td width="85" align ="center"><u>'.$ops.'</u></td>
					
							
				</tr>
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="290"><b>&nbsp;</b></td>
					<td width="255"> Equivalent Numerical Rating</td>
					<td width="85" align ="center"><u>'.$enr.'</u></td>
					
							
				</tr>
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="290"><b>&nbsp;</b></td>
					<td width="255"> Equivalent Adjective Rating</td>
					<td width="85" align ="center"><u>'.$ear.'</u></td>
					
							
				</tr>
		
		</table>
		
		 <hr />
		  <table border = "0" width="650">
				<tr>
					<td><b>Descriptive Equivalent of Numerical Ratings:</b></td>
				</tr>
				<tr>
					<td><b>&nbsp;</b></td>
					 
				</tr>
		
				<tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="185"><b>&nbsp;</b></td>
					<td width="85" align="center">9.3   above</td>
					<td width="275">- Outstanding (O)</td>
							
				</tr>
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="185"><b>&nbsp;</b></td>
					<td width="85" align="center">7.5 - 9.2</td>
					<td width="275">- Very Satisfactory  (VS)</td>
					<td width="85"><b>&nbsp;</b></td>
					
							
				</tr>
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="185"><b>&nbsp;</b></td>
					<td width="85" align="center">5.0 - 7.4</td>
					<td width="275">- Satisfactory  (S)</td>
					<td width="85"><b>&nbsp;</b></td>
					
							
				</tr>
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="185"><b>&nbsp;</b></td>
					<td width="85" align="center">3.0 - 4.9</td>
					<td width="275">- Fair       (F)</td>
					<td width="85"><b>&nbsp;</b></td>
					
							
				</tr>
				 <tr>
					<td width="20"><b>&nbsp;</b></td>
					<td width="185"><b>&nbsp;</b></td>
					<td width="85" align="center">2.0 - 2.9</td>
					<td width="275">- Unsatisfactory      (US)</td>
					<td width="85"><b>&nbsp;</b></td>
					
							
				</tr>
									<tr><td width="30">&nbsp;</td></tr>
		
		</table>
		<table border ="0" width="650">
				<tr>
					<td width="310">
					
						 <table border = "0" width="325">
							<tr><td width="300" ><b>EMPLOYEE\'S COMMENTS/REMARKS</b></td></tr>
							<tr><td width="300" ><textarea name="emprem" rows="5" cols="37"  readonly="readonly">'.$emprem.'</textarea></td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="300" ><b>RATER\'S COMMENTS/REMARKS</b></td></tr>
							<tr><td width="300" ><textarea name="ratrem" rows="5" cols="37" readonly="readonly">'.ratrem.'</textarea></td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
							<tr><td width="30">&nbsp;</td></tr>
						</table>
					
				  
					</td>
					  
					<!--
					<td width="30">&nbsp;
					
							 
					</td>
					-->
					<td width="310">
				
						 <table border = 1 width="310">
							<tr><td width="225" ><b>DISCUSSED RATING WITH:</b></td></tr>
							<tr><td width="225" ><b>&nbsp;</b></td></tr>
							<tr><td width="310" ><b>____________________________________________</b></td></tr>
							<tr><td width="310"  align="center"><b>Signature of Ratee / Date</b></td></tr>
							<tr><td width="225" ><b>&nbsp;</b></td></tr>
		
							<tr><td width="310" ><b>____________________________________________</b></td></tr>
							<tr><td width="310"  align="center"><b>Signature of Rater / Date</b></td></tr>
							<tr><td width="225" ><b>&nbsp;</b></td></tr>
		
							<tr><td width="310" ><b>____________________________________________</b></td></tr>
							<tr><td width="310"  align="center"><b>Signature of Rater\'s Supervisor / Date</b></td></tr>
							
						</table>
					
				
					
					</td>
					
								
				</tr>
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
}//end of if tersup




$html=$html1;
$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document
//$pdf->Output("studeval.pdf", "D");
$pdf->Output("TER_evaluation.pdf", "I");



$pdf->AddPage();

//============================================================+
// END OF FILE                                                
//============================================================+

if(isset($_POST['tersup']))
{
	
	
	//----------------USING A LOG-----------------
				
				$open = fopen("../../dbmschange_log.txt",'a+');
				
				date_default_timezone_set('Asia/Hong_Kong');
				
				if($open){//date('l jS \of F Y h:i:s P')
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " viewed a record. viewed (supervisor) " . $empid . " - ( ".$empname." ) TER evaluation of ". $_COOKIE['semyear']."\r\n'ter' - 1 row retrieved\r\n";
				
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

}
if(isset($_POST['terfac']))
{
	//----------------USING A LOG-----------------
				
				$open = fopen("../../dbmschange_log.txt",'a+');
				
				date_default_timezone_set('Asia/Hong_Kong');
				
				if($open){//date('l jS \of F Y h:i:s P')
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " viewed a record. viewed (faculty) " . $empid . " - ( ".$empname." ) TER evaluation of ". $_COOKIE['semyear']."\r\n'ter' - 1 row retrieved\r\n";
				
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
}

mysql_close();
ob_flush();?>