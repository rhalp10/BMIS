<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "bmis_db");

$sql = mysqli_query($con, "SELECT * FROM accounts WHERE Position = 'Barangay Treasurer'");
while ($row = mysqli_fetch_assoc($sql))
{
	$treasurer = $row['Fullname'];
}

$sql1 = mysqli_query($con, "SELECT * FROM accounts WHERE Position = 'Barangay Captain'");
while ($row = mysqli_fetch_assoc($sql1))
{
	$captain = $row['Fullname'];
}

/*
Orignal credits to Nicola Asuni for the tcpdf

updated by: Mark Philip Sy [giving credit to the original creator by mentioning the name]
support@syngkit.tk
*/
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
require_once ('mysql_connect.php');

// create new PDF document
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

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
$pdf->SetFont('dejavusans', '', 12);

    
// add a page
$pdf->AddPage('L');

$print=$_POST['print'];

   $pdf->Image('alulod.png',68,9,30);
 $pdf->Image('indang-logo.png',200,9,25); 
if($print == "all")
{
	$query = "SELECT * from annual_project where `source` =  'Barangay Development Fund'";	
	$total = $_SESSION["total"];
		if ($total == 0)
		{
			echo '<script>alert("There is no data");</script>';
			echo '<script>window.location = "view.php";</script>';
			die();
		}
}

else 
{
	$query = "SELECT * from annual_project where `source` =  'Barangay Development Fund' and (start like '%$print%' or end like '%$print%')";	
	$query1 = "SELECT SUM(amount) from annual_project where `source` ='Barangay Development Fund' and (start like '%$print%' or end like '%$print%')";
		$result1 = mysqli_query($dbc, $query1);
		$total = mysqli_fetch_assoc($result1);
		$total = $total["SUM(amount)"];
		if ($total == 0)
		{
			echo '<script>alert("There is no data");</script>';
			echo '<script>window.location = "view.php";</script>';
			die();
		}
}

$result = @mysqli_query ($dbc, $query); // Run the query.
$strings = mysqli_num_rows($result); // How many users are there?

$html3='';

if ($strings > 0) { // If it ran OK, display the records.
if (isset($_SESSION['year']) and isset($_SESSION['total']))
{ 
	$year =  $_SESSION["year"];
	$total = $_SESSION["total"];
}

else
{
	$year = date('Y');
}	
					$html1 =  '<table align="center">
    <tr><td>BARANGAY DEVELOPMENT FUND</td></tr>
    <tr><td>Details of Program/ Project/ Activity by Sector.</td></tr>
	<tr><td>Budget Year: '.$print.'</td></tr>
	<tr><td>Municipality of Indang</td></tr>
	<tr><td>Province of Cavite</td></tr>
</table>
';
			$html2 = '</big></p> 
			<table align="center"  cellspacing="auto" cellpadding="auto" border="1">
			<tr>
			<td align="center"><b>AIP Reference Code</b></td>
			<td align="center"><b>Programs/ Project/ Activities</b></td>
			<td align="center"><b>Implementing Office Department</b></td>
			<td align="center"><b>Starting Date</b></td>
			<td align="center"><b>Completion Date</b></td>
			<td align="center"><b>Expected Output</b></td>
			<td align="center"><b>Source of Funds</b></td>
			<td align="center"><b>Cost</b></td>
						
			</tr> ';
			// Fetch and print all the records.
			while ($row = mysqli_fetch_assoc($result)) {
				$html3= $html3.'
				<tr>
				<td align=\"left\">' . stripslashes($row['aip']) . '</td>
				<td align=\"left\">'.$row['program'].'</td>
				<td align=\"left\">'.$row['department'].'</td>
				<td align=\"left\">'.$row['start'].'</td>
				<td align=\"left\">'.$row['end'].'</td>
				<td align=\"left\">'.$row['e_output'].'</td>
				<td align=\"left\">'.$row['source'].'</td>
				<td align=\"left\">'. number_format($row['amount']).'</td>
				
				</tr>';
			}
		
		$html4 ='<tr><td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><b>TOTAL COST</b></td>
		<td><b>'.$total.'</b></td></tr></table>';


		$html5 = '<p><p><table>
    <tr>
        <th align="left">Prepared by:</th>           
        <th align="center">Attested by:</th>      
    </tr>
    
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
       <th align="left">'.$treasurer.'</th>           
        <th align="center">'.$captain.'</th> 
    </tr>
     <tr>
      <th align="left">(Barangay Treasurer)</th>          
       <th align="center">(Punong Barangay)</th>
    </tr>

</table>';

}//end of if

else { // If it did not run OK.
	$html1='<p>There are currently no registered users.</p>'; 
	$html2='';
	$html3='';
	$html4='';
	$html5='';
	
}


$html=$html1.$html2.$html3.$html4.$html5;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('test_save - MPS-'.date('Y-M-d').'.pdf', 'I');
