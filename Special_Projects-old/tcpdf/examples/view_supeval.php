<?php
ob_start();
require_once ('mysql_connect.php');
$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?
if ($num<=0)
{
	header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/revert3.php");
	exit();
	}
	
	
$query = "SELECT lastname,firstname,ccode from faculty where empid='$empid' ";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { 
$row = mysql_fetch_array($result, MYSQL_NUM);
$name = $row['0'].", ".$row['1'];
$ccode= $row['2'];
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

$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr><table border="1">
<tr><td>1</td></tr>
<tr><td>2</td></tr>
<tr><td>3</td></tr>
</table></table>';

$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5,b1,b2,b3,b4,b5,c1,c2,c3,c4,c5,d1,d2,d3,d4,d5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 5";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

$ave1=0;
$ave2=0;
$ave3=0;
$ave4=0;
$ave5=0;
$ave6=0;
$ave7=0;
$ave8=0;
$ave9=0;
$ave10=0;
$ave11=0;
$ave12=0;
$ave13=0;
$ave14=0;
$ave15=0;
$ave16=0;
$ave17=0;
$ave18=0;
$ave19=0;
$ave20=0;


if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$ave1 = $ave1+$row['0'];
		$ave2 = $ave2+$row['1'];
		$ave3 = $ave3+$row['2'];
		$ave4 = $ave4+$row['3'];
		$ave5 = $ave5+$row['4'];		
		$ave6 = $ave6+$row['5'];		
		$ave7 = $ave7+$row['6'];		
		$ave8 = $ave8+$row['7'];		
		$ave9 = $ave9+$row['8'];		
		$ave10 = $ave10+$row['9'];		
		$ave11 = $ave11+$row['10'];		
		$ave12 = $ave12+$row['11'];		
		$ave13 = $ave13+$row['12'];		
		$ave14 = $ave14+$row['13'];		
		$ave15 = $ave15+$row['14'];		
		$ave16 = $ave16+$row['15'];		
		$ave17 = $ave17+$row['16'];		
		$ave18 = $ave18+$row['17'];		
		$ave19 = $ave19+$row['18'];		
		$ave20 = $ave20+$row['19'];		
		
	}

	
	$a1=($ave1/$num)+($ave2/$num)+($ave3/$num)+($ave4/$num)+($ave5/$num);

	$b1=($ave6/$num)+($ave7/$num)+($ave8/$num)+($ave9/$num)+($ave10/$num);
	
	$c1=($ave11/$num)+($ave12/$num)+($ave13/$num)+($ave14/$num)+($ave15/$num);
	$d1=($ave16/$num)+($ave17/$num)+($ave18/$num)+($ave19/$num)+($ave20/$num);
	
	//$rate1=number_format($rate1, 2, '.', '');
	$rate1=$a1*4*.2;
	$rate2=$b1*4*.2;
	$rate3=$c1*4*.3;
	$rate4=$d1*4*.3;
	
	
}//wnd of if




$html1 = '

<table border="0" width = "800">
<tr><td colspan="2"><b>Supervisor Evaluation</b></td></tr>
<tr><td width="20%"><b>Faculty Code:</b></td><td width="80%"> '.$empid.'</td></tr>
<tr><td width="20%"><b>Faculty Name:</b></td><td width="80%"> '.$name.'</td></tr>
<tr><td width="20%"><b>College:</b></td><td width="80%"> '.$ccode.'</td></tr>
</table>
<br>
					<!-- ##################### header of the table ########################-->
<table border="1" width = "928">
<tr align="center">
<td colspan="2"><b>&nbsp;</b></td>
<td colspan="30"><b>Student No.</b></td>
</tr>
<tr align="center">
<td><b>&nbsp;</b></td>
<td><b>AVE</b></td>
<td><b>1</b></td>
<td><b>2</b></td>
<td><b>3</b></td>
<td><b>4</b></td>
<td><b>5</b></td>
<td><b>6</b></td>
<td><b>7</b></td>
<td><b>8</b></td>
<td><b>9</b></td>
<td><b>10</b></td>
<td><b>11</b></td>
<td><b>12</b></td>
<td><b>13</b></td>
<td><b>14</b></td>
<td><b>15</b></td>
<td><b>16</b></td>
<td><b>17</b></td>
<td><b>18</b></td>
<td><b>19</b></td>
<td><b>20</b></td>
<td><b>21</b></td>
<td><b>22</b></td>
<td><b>23</b></td>
<td><b>24</b></td>
<td><b>25</b></td>
<td><b>26</b></td>
<td><b>27</b></td>
<td><b>28</b></td>
<td><b>29</b></td>
<td><b>30</b></td>
</tr>

</table>
					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "928">
<tr><td width="290"><b> I. Commitment</b></td>
<td width= "58" align="center"><b> 20%</b></td>
<td width= "58" align="center"><b> '.number_format(($a1*4*.2), 2, '.', '').'</b></td>
<td width= "522" align="center">&nbsp;</td></tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="928">

<tr>

<td width="29" align ="center">


<table border="1">
<tr><td>1</td></tr>
<tr><td>2</td></tr>
<tr><td>3</td></tr>
<tr><td>4</td></tr>
<tr><td>5</td></tr>
</table>


</td>



<td width="29" align ="center">


<table border="1">
<tr><td>'.round(($ave1/$num),2).'</td></tr>
<tr><td>'.round(($ave2/$num),2).'</td></tr>
<tr><td>'.round(($ave3/$num),2).'</td></tr>
<tr><td>'.round(($ave4/$num),2).'</td></tr>
<tr><td>'.round(($ave5/$num),2).'</td></tr>
</table>


</td>




';
$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT a1,a2,a3,a4,a5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html2= $html2.'<td width="29" align ="center"><table border="1">
<tr><td>'.$row['0'].'</td></tr>
<tr><td>'.$row['1'].'</td></tr>
<tr><td>'.$row['2'].'</td></tr>
<tr><td>'.$row['3'].'</td></tr>
<tr><td>'.$row['4'].'</td></tr>
</table></td>';
		
		
	}
for ($i=$num;$i<30;$i++)
{
	$html2 = $html2.'<td width="29" align ="center"><table border="1">
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table></td>';
	
	
	}
	
	
}//end of if

else { // If it did not run OK.
	$html2= '<p>There are currently no registered users.</p>'; 

}






$html3='


</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>';


$html4 = '
					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "928">
<tr><td width="290"><b> II. Knowledge Management</b></td>
<td width= "58" align="center"><b> 20%</b></td>
<td width= "58" align="center"><b> '.number_format(($b1*4*.2), 2, '.', '').'</b></td>
<td width= "522" align="center">&nbsp;</td></tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="928">

<tr>

<td width="29" align ="center">


<table border="1">
<tr><td>1</td></tr>
<tr><td>2</td></tr>
<tr><td>3</td></tr>
<tr><td>4</td></tr>
<tr><td>5</td></tr>
</table>


</td>



<td width="29" align ="center">


<table border="1">
<tr><td>'.round(($ave6/$num),2).'</td></tr>
<tr><td>'.round(($ave7/$num),2).'</td></tr>
<tr><td>'.round(($ave8/$num),2).'</td></tr>
<tr><td>'.round(($ave9/$num),2).'</td></tr>
<tr><td>'.round(($ave10/$num),2).'</td></tr>
</table>


</td>




';
$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT b1,b2,b3,b4,b5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html5= $html5.'<td width="29" align ="center"><table border="1">
<tr><td>'.$row['0'].'</td></tr>
<tr><td>'.$row['1'].'</td></tr>
<tr><td>'.$row['2'].'</td></tr>
<tr><td>'.$row['3'].'</td></tr>
<tr><td>'.$row['4'].'</td></tr>
</table></td>';
		
		
	}
for ($i=$num;$i<30;$i++)
{
	$html5 = $html5.'<td width="29" align ="center"><table border="1">
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table></td>';
	
	
	}
	
	
}//end of if

else { // If it did not run OK.
	$html5= '<p>There are currently no registered users.</p>'; 

}






$html6='


</tr>


</table>';

$html7 = '
					<!-- ##################### subheader of the table ########################-->
<table border="1" width = "928">
<tr><td width="290"><b> III. Teaching for Independent Learning</b></td>
<td width= "58" align="center"><b> 30%</b></td>
<td width= "58" align="center"><b> '.round(($c1*4*.3),2).'</b></td>
<td width= "522" align="center">&nbsp;</td></tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="928">

<tr>

<td width="29" align ="center">


<table border="1">
<tr><td>1</td></tr>
<tr><td>2</td></tr>
<tr><td>3</td></tr>
<tr><td>4</td></tr>
<tr><td>5</td></tr>
</table>


</td>



<td width="29" align ="center">


<table border="1">
<tr><td>'.round(($ave11/$num),2).'</td></tr>
<tr><td>'.round(($ave12/$num),2).'</td></tr>
<tr><td>'.round(($ave13/$num),2).'</td></tr>
<tr><td>'.round(($ave14/$num),2).'</td></tr>
<tr><td>'.round(($ave15/$num),2).'</td></tr>
</table>


</td>




';
$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT c1,c2,c3,c4,c5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html8= $html8.'<td width="29" align ="center"><table border="1">
<tr><td>'.$row['0'].'</td></tr>
<tr><td>'.$row['1'].'</td></tr>
<tr><td>'.$row['2'].'</td></tr>
<tr><td>'.$row['3'].'</td></tr>
<tr><td>'.$row['4'].'</td></tr>
</table></td>';
		
		
	}
for ($i=$num;$i<30;$i++)
{
	$html8 = $html8.'<td width="29" align ="center"><table border="1">
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table></td>';
	
	
	}
	
	
}//end of if

else { // If it did not run OK.
	$html8= '<p>There are currently no registered users.</p>'; 

}






$html9='


</tr>


</table>';


$html10 = '

<!-- ##################### subheader of the table ########################-->

<table border="1" width = "928">
<tr><td width="290"><b> IV. Management of Learning</b></td>
<td width= "58" align="center"><b> 30%</b></td>
<td width= "58" align="center"><b> '.round(($d1*4*.3),2).'</b></td>
<td width= "522" align="center">&nbsp;</td></tr>
</table>
					<!-- ##################### ############################################-->


<table border="1" width="928">

<tr>

<td width="29" align ="center">


<table border="1">
<tr><td>1</td></tr>
<tr><td>2</td></tr>
<tr><td>3</td></tr>
<tr><td>4</td></tr>
<tr><td>5</td></tr>
</table>


</td>



<td width="29" align ="center">


<table border="1">
<tr><td>'.round(($ave16/$num),2).'</td></tr>
<tr><td>'.round(($ave17/$num),2).'</td></tr>
<tr><td>'.round(($ave18/$num),2).'</td></tr>
<tr><td>'.round(($ave19/$num),2).'</td></tr>
<tr><td>'.round(($ave20/$num),2).'</td></tr>
</table>


</td>




';
$semyear=$_POST['semyear'];
$empid=$_POST['empid'];
$query = "SELECT d1,d2,d3,d4,d5 from eval_sup where empcode='$empid' and semyear = '$semyear' limit 1";	

	
$result = @mysql_query ($query) or die (mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?


if ($num > 0) { // If it ran OK, display the records.

	// Fetch and print all the records.
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html11= $html11.'<td width="29" align ="center"><table border="1">
<tr><td>'.$row['0'].'</td></tr>
<tr><td>'.$row['1'].'</td></tr>
<tr><td>'.$row['2'].'</td></tr>
<tr><td>'.$row['3'].'</td></tr>
<tr><td>'.$row['4'].'</td></tr>
</table></td>';
		
		
	}
for ($i=$num;$i<30;$i++)
{
	$html11 = $html11.'<td width="29" align ="center"><table border="1">
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table></td>';
	
	
	}
	
	
}//end of if

else { // If it did not run OK.
	$html11= '<p>There are currently no registered users.</p>'; 

}






$html12='


</tr>

<!-- ##################### 2nd layer of the info ########################-->



<!-- ##################### 2nd layer of the info ########################-->



</table>';


$html13='<table border="1" width = "928">

<tr><td width="348" align="center"><b> Total Rating</b></td>
<td width= "58" align="center"><b>'.($rate1+$rate2+$rate3+$rate4).'</b></td></tr>


</table>

<table border="0" width = "928">
<tr><td align="right"><b> &nbsp;</b></td></tr>

<tr><td align="right"><b> _______________________________</b></td></tr>
<tr><td align="right"><b> VP FOR ACADEMIC AFFAIRS</b></td></tr>
</table>'
;




$html=$html1.$html2.$html3.$html4.$html5.$html6.$html7.$html8.$html9.$html10.$html11.$html12.$html13;
$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document
//$pdf->Output("studeval.pdf", "D");
$pdf->Output("studeval_".$name.".pdf", "I");



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
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " viewed a record. viewed " . $empid . " - ( ".$name." ) supervisor evaluation of ". $_COOKIE['semyear']."\r\n'eval_sup' - 1 row retrieved\r\n";
				
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