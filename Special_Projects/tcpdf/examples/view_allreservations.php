<?php
if(!isset($_COOKIE['username'])){ //for redirecting if no login is done
	
header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
}

 

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
require_once ('../../mysql_connect.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(array(0,64,0), array(0,64,128));

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

function getauthor($x)
{
	$query = "SELECT a.au_id, a.au_fname,a.au_mname,a.au_lname	FROM authors a
				INNER JOIN book_au ba ON ba.au_id = a.au_id
				INNER JOIN books b ON b.accno = ba.accno
				WHERE b.accno =  '$x'";	
	$result = @mysql_query ($query); // Run the query.
	$author ='';
	$num = mysql_num_rows($result);
	$i=0;
	if ($num==0)
		return '';
	else
	{
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
			$i++;
		if($i==$num)
		$author.= $row[3].', '.$row[1].' '.substr($row[2],0,1).'.';
		else
		$author.= $row[3].', '.$row[1].' '.substr($row[2],0,1).'., ';
		}//end of while	
	return $author.'<br>';
	}
}//end of getauthor()
function getbookinfo($x)
{
	$query = "SELECT * from books where accno =  '$x'";	
	$result = @mysql_query ($query); // Run the query.
	$num = mysql_num_rows($result);
	if ($num==0)
		return '';
	else
	{
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$ba = $row[2]." <br>".getauthor($x);
		
		}//end of while	
	return $ba;
	
}//end of getbookinfo()
function getpatinfo($x)
{
	$query = "SELECT * from students where studentnum =  '$x'";	
	$result = @mysql_query ($query); // Run the query.
	$num = mysql_num_rows($result);
	if ($num==0)
		return '';
	else
	{
		$row = mysql_fetch_array($result);
		$ba = $row[3].', '.$row[1].' '.substr($row[2],0,1).'.';
		$ba = $ba.'<br>'.strtoupper($row['course']);
		}//end of while	
	return $ba;
	
}//end of getpatinfo()


$query = "SELECT * from reservations r inner join students s on r.studentnum = s.studentnum order by res_id desc,status desc,s.s_lname";	

	
$result = @mysql_query ($query) or die("Error: ".mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

if ($num > 0) { // If it ran OK, display the records.

$html1 = '<table border = "0" width="650" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAVITE STATE UNIVERSITY</b></td></tr>
			<tr><td  align ="center"><b>Indang, Cavite</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>
<br>
<big><b>There are currently '.$num.' reservations in the system. ['.date('M-d-Y').']</b></big><br><br>


<table align="center" width ="650" cellspacing="2" style="table-layout:fixed" cellpadding="2" border="1">
	<tr>
	<td align="center" width = "80"><b>Accession Number</b></td>
	<td width="230" align="center"><b>Material</b></td>
	<td width="190" align="center"><b>Patron Information</b></td>
	<td width="80" align="center"><b>Status</b></td>
	
	</tr> ';
	// Fetch and print all the records.
	$html2='';
	while ($row = mysql_fetch_array($result)) {
		if($row[6]=='on-loan') $bg="#ffcc00"; else $bg = "";
		if($row[4]=='0000-00-00') $rd=""; else $rd = date('M-d, y',strtotime($row[5]));
		$book = getbookinfo($row[1]);
		$pat = getpatinfo($row[2])."<br>".$row[2];
		
		$html2= $html2.'<tr bgcolor="'.$bg.'">
		<td align=\"left\">' . stripslashes($row[1]) . '</td>
		<td align="left" >'.$book.'</td>
		<td align="left">' . $pat. '</td>
		<td align=\"left\">' . $row['status'] . '</td>
		</tr>';
	}

	$html3 ='</table>';
}//wnd of if

else { // If it did not run OK.
	$html1='<p>There are currently no reservations with that criteria.</p>'; 
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
$pdf->Output('library_subjects.pdf', 'I');

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