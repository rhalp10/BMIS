<?php
if(!isset($_COOKIE['username'])){ //for redirecting if no login is done
	
header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
}

 

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
require_once ('../../mysql_connect.php');


// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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



//-------------------------------------------
function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
function gotothis($a)
  {
  echo '<script type="text/javascript"> location.href="'.$a.'"</script>';
  }
function goBack()
  {
  echo '<script type="text/javascript"> window.history.go(-1)</script>';
  }

//-------------------------------------------

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
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$ba = $row[3].', '.$row[1].' '.substr($row[2],0,1).'.';
		
		}//end of while	
	return $ba;
	
}//end of getpatinfo()


//$patron = $_POST['patron'];
//$personnel = $_POST['personnel'];
$criteria="";
$st=1;
$pt="and 1";
$pl="and 1";
$dcov="and 1";


if(isset($_POST['c_type'])&& isset($_POST['stat']) )
{
	$stat = $_POST['stat'];
	if ($stat=='all')
	{
	$st = "1";
	$criteria.="All status - on-loan and returned<br>";
	}
	else if ($stat=='ol')
	{$st = " t.c_status='on-loan' ";
	$criteria.="Status - On-loan<br>";
	}
	else if ($stat=='od')
	{$st = " t.c_status='on-loan' and t.due_date<now() ";
	$criteria.="Status - Returned<br>";
	}
	else if ($stat=='ret')
	{$st = " t.c_status='returned' ";
	$criteria.="Status - Returned<br>";
	}
}
if(isset($_POST['c_per'])&& isset($_POST['personnel']) )
{
	$personnel = $_POST['personnel'];
	if($personnel == 'all')
	{$criteria.="Personnel - All Personnel<br>";
	$pl=" and 1 ";}
	else
	{$pl = " and (blib_id='$personnel' or rlib_id = '$personnel') ";
	$criteria.="Personnel - Transactions involving ".$personnel."<br>";}
}
if(isset($_POST['c_pat'])&& isset($_POST['patron']) )
{
	$stat = $_POST['patron'];
	if ($stat=='all')
	{
	$pt = "and 1";
	$criteria.="All patron - Faculty and Student<br>";
	}
	else if ($stat=='stud')
	{
	$pt = " and s.studentnum>21000000 ";
	$criteria.="Patron - Student<br>";
	}
	else if ($stat=='fac')
	{$pt = " and s.studentnum<21000000 ";
	$criteria.="Patron - Student<br>";
	}
}

if(isset($_POST['c_dcov'])&& isset($_POST['date_sta']) && isset($_POST['date_end']) )
{
	
	
	$ds = $_POST['date_sta'];
	$de = $_POST['date_end'];
	if($ds=="" || $de=="")
	{do_alert("You cannot leave the start or end date blank.");
	goBack();
	}
	$dcov = "and (t.bdate between '$ds' and '$de' or t.rdate between '$ds' and '$de') ";
}





$query = "SELECT * from transactions t inner join students s on t.studentnum = s.studentnum where $st $pt $pl $dcov order by c_status,s.s_lname,bdate";	
//echo $query;	
$result = @mysql_query ($query) or die("Error: ".mysql_error()); // Run the query.
$num = mysql_num_rows($result); // How many users are there?

if ($num > 0) { // If it ran OK, display the records.

$html1 = '<table border = "0" width="950" align = "center">
			<tr><td  align ="center"><b>Republic of the Philippines</b></td></tr>
			<tr><td  align ="center"><b>CAVITE STATE UNIVERSITY</b></td></tr>
			<tr><td  align ="center"><b>Indang, Cavite</b></td></tr>
			<tr><td  align ="center"><b>&nbsp;</b></td></tr>
	</table>
<br>
<big><b>There are currently '.$num.' transactions in the system. ['.date('M-d-Y').']</big><br><br>
Criteria:</b><br>'.$criteria.'<br>


<table align="center" width ="650" cellspacing="2" style="table-layout:fixed" cellpadding="2" border="1">
	<tr>
	<td align="center" width = "80"><b>Accession Number</b></td>
	<td width="230" align="center"><b>Material</b></td>
	<td width="190" align="center"><b>Patron Information</b></td>
	<td width="80" align="center"><b>Lent by</b></td>
	<td width="80" align="center"><b>Received by</b></td>
	<td width="80" align="center"><b>Borrow Date</b></td>
	<td width="80" align="center"><b>Return Date</b></td>
	<td width="80" align="center"><b>Status</b></td>
	
	</tr> ';
	// Fetch and print all the records.
	$html2='';
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		if($row[6]=='on-loan') $bg="#ffcc00"; else $bg = "";
		if($row[4]=='0000-00-00') $rd=""; else $rd = date('M-d, y',strtotime($row[5]));
		$book = getbookinfo($row[1]);
		$pat = getpatinfo($row[2])."<br>".$row[2];
		
		$html2= $html2.'<tr bgcolor="'.$bg.'">
		<td align=\"left\">' . stripslashes($row[1]) . '</td>
		<td align="left" >'.$book.'</td>
		<td align="left">' . $pat. '</td>
		<td align=\"left\">' . stripslashes($row[7]) . '</td>
		<td align=\"left\">' . stripslashes($row[8]) . '</td>
		<td align=\"left\">' . date('M-d, y',strtotime($row[3])) . '</td>
		<td align=\"left\">' . stripslashes($rd) . '</td>
		<td align=\"left\">' . stripslashes($row[6]) . '</td>
		</tr>';
	}

	$html3 ='</table>';
}//wnd of if

else { // If it did not run OK.
	$html1='<p>There are currently no records with the criteria specified.</p>'; 
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
$pdf->Output('library_transactions-'.date('Y-M-d').'.pdf', 'I');

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