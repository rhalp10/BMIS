<?php
if(!isset($_COOKIE['username'])){ //for redirecting if no login is done
	
header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
}

 

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
$pdf->SetMargins(PDF_MARGIN_LEFT, 8, PDF_MARGIN_RIGHT);
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

$criteria="";
$va=$_POST['validated'];
$ov=$_POST['overdue'];
$type=$_POST['type'];
//if a student is validated
if($va=='all')
{$v = "validated = 'y' or validated = 'n'";
$criteria.="All types - validated and not validated.<br>";
}
else if($va=='val')
{$v = "validated = 'y'";
$criteria.="Type - Validated patron only.<br>";
}else if($va=='nval')
{$v = "validated = 'n'";
$criteria.="Type - Not validated patron only.<br>";
}else
$v=1;

//if there is an outstanding transaction
if($ov=='all')
{$o = "";
$criteria.="All Transaction - With borrowed books, with overdue books and without borrowed books.<br>";
}
else if($ov=='wbb')
{$o = "and studentnum in (select studentnum from transactions where c_status='on-loan')";
$criteria.="Transaction - With borrowed books.<br>";
}
else if($ov=='wbo')
{$o = "and studentnum in (select studentnum from transactions where due_date<now() and c_status ='on-loan')";
$criteria.="Transaction - With overdue books.<br>";
}
else if($ov=='wol')
{$o = "and studentnum not in (select distinct studentnum from transactions where c_status = 'on-loan')";
$criteria.="Transaction - Without borrowed books.<br>";
}
else
$o=1;

//if the user wants to search by course
if(isset($_POST['c_course'])&& isset($_POST['course']))
{
	$c_c =$_POST['course'];
	$c = " and course = '$c_c' ";
	$criteria.="Course - ".$c_c.".<br>";
}
else
$c="";
//if the user wants to search by course
if(isset($_POST['c_yr'])&& isset($_POST['yr']))
{
	$c_y =$_POST['yr'];
	$y = "and yr = $c_y";
	$criteria.="Year - ".$c_y.".<br>";
}
else
$y="";
//if the user wants to search by section
if(isset($_POST['c_sec'])&& isset($_POST['sec']))
{
	$c_s =$_POST['sec'];
	$s = "and sec = $c_s";
	$criteria.="Section - ".$c_s.".<br>";

}
else
$s="";
if(isset($_POST['c_college'])&& isset($_POST['college']))
{
	$c_co =$_POST['college'];
	$co = "and course = '$c_co'";
	$criteria.="College - ".$c_co.".<br>";
}
else
$co="";
//##############################################################
if($type=='fac'){
	

$query = "SELECT s.* from students s where ($v) $o $co $y $s and studentnum<21000000 order by s_lname,course";	

	
$result = @mysql_query ($query); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

if ($num > 0) { // If it ran OK, display the records.

$html1 = '
		<table border = "0" width="650" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAVITE STATE UNIVERSITY</b></td></tr>
			<tr><td  align ="center"><b>Indang, Cavite</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>

<p><big><b>There are currently '.$num.' patrons. ['.date('M-d-Y').']</b></big></p>
Criteria:</b><br>'.$criteria.'<br>
';



$html1.='<table align="center" cellspacing="2" style="table-layout:fixed" cellpadding="2" border="1">
	<tr>
	<td align="center" width = "150"><b>Patron Number</b></td>
	<td width="250" align="center"><b>Full Name</b></td>
	<td width="70" align="center"><b>College</b></td>
	</tr> ';
	// Fetch and print all the records.
		
	$html2='';
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html2= $html2.'<tr>
		<td align=\"left\">' . stripslashes($row[0]) . '</td>
		<td align=\"left\">'.$row[3].', '.$row[1].' '.substr($row[2],0,1).'.</td>
		<td align=\"left\">' . strtoupper($row[4]) . '</td>
		</tr>';
	}//end of while
	$html3 ='</table>';
}//wnd of if

else { // If it did not run OK.
	$html1='<p>There are currently no record found with that criteria.</p>'; 
	$html2='';
	$html3='';
	
}

}//end of if type is faculty
//##############################################################
if($type=='stud'){
$query = "SELECT s.* from students s where ($v) $o $c $y $s and studentnum>21000000 order by s_lname";	

	
$result = @mysql_query ($query); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

if ($num > 0) { // If it ran OK, display the records.

$html1 = '
		<table border = "0" width="650" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAVITE STATE UNIVERSITY</b></td></tr>
			<tr><td  align ="center"><b>Indang, Cavite</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>

<p><big><b>There are currently '.$num.' patrons. ['.date('M-d-Y').']</b></big></p>
<b>Criteria:</b><br>'.$criteria.'<br>
';



$html1.='<table align="center" cellspacing="2" style="table-layout:fixed" cellpadding="2" border="1">
	<tr>
	<td align="center" width = "150"><b>Patron Number</b></td>
	<td width="250" align="center"><b>Full Name</b></td>
	<td width="70" align="center"><b>Course</b></td>
	<td width="70" align="center"><b>Year & Section</b></td>
	
	</tr> ';
	// Fetch and print all the records.
	
	
	$html2='';
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		$html2= $html2.'<tr>
		<td align=\"left\">' . stripslashes($row[0]) . '</td>
		<td align=\"left\">'.$row[3].', '.$row[1].' '.substr($row[2],0,1).'.</td>
		<td align=\"left\">' . strtoupper($row[4]) . '</td>
		<td align=\"left\">' . $row[5] . '-'.$row[6].'</td>
		</tr>';
	}//end of while




	$html3 ='</table>';
}//wnd of if

else { // If it did not run OK.
	$html1='<p>There are currently no record found with that criteria.</p>'; 
	$html2='';
	$html3='';
	
}
}//end of if type is student

mysql_close();
$html=$html1.$html2.$html3;
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('listpatrons.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
//----------------USING A LOG-----------------
				
				$open = fopen("../../dbmschange_log.txt",'a+');
				
				date_default_timezone_set('Asia/Hong_Kong');
				
				if($open){//date('l jS \of F Y h:i:s P')
				$content =  date('m/d/Y h:i:s a', time()) ." - ". $_COOKIE['userid']. " queried records of colleges in AY " . $_COOKIE['semyear']. "\r\n'college' - Records viewed\r\n";
				
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