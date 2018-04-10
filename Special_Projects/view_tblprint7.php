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
if($print == "All")
{
        $query = "SELECT * from annual_procurement";
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
        $query = "SELECT * from annual_procurement WHERE start like '%print%'";
        $query1 = "SELECT SUM(amount) from youth_investment WHERE start like '%$print%' OR end like '%$print%'";
        $total = $_SESSION["total"];
                if ($total == 0)
                {
                        echo '<script>alert("There is no data");</script>';
                        echo '<script>window.location = "view.php";</script>';
                        die();
                }
}


$result = mysql_query($query); // Run the query.
$strings = mysql_num_rows($result); // How many users are there?

$html2='';

if ($strings > 0) { // If it ran OK, display the records.

		$html1 = ' '.$strings.' .</b></big></p>
			<tr width="100%">
                        <th width="10%">Name of Barangay: </th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        </tr>
<tr width="100%">
                        <th width="10%">Program Control No.: </th>
                        <th width="10%">Planned Amount: </th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        </tr> 
<tr width="100%">
                        <th width="10%">Department Office: </th>
                        <th width="10%">Regular</th>
                        <th width="10%">Contigency</th>
                        <th width="10%">Total</th>     
                        <th width="10%">Date Submitted</th>
                        </tr>                        




<table width="100%" border="2" style="border-collapse:collapse;">
<tr width="100%">
                        <th width="10%">Item No.</th>
                        <th width="10%">Description</th>
                        <th width="10%">Unit Cost</th>
                        <th width="10%">Qauntity</th>     
                        <th width="10%">Unit</th>
                        <th width="10%">Total Cost</th>
                        <th width="10%"></th>
                        <th width="10%">Distribution</th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>                  
</tr><tr width="100%">
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">1st Quarter</th>
                        <th width="1%"></th>
                        <th width="10%">2nd Quarter</th>     
                        <th width="1%"></th>
                        <th width="10%">3rd Quarter</th>
                        <th width="1%"></th>
                        <th width="10%">4th Quarter</th>
                        <th width="1%"></th>                  
</tr>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%"></th>     
                        <th width="10%"></th>
                        <th width="10%"></th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>     
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Amount</th>
                                      
</tr> ';
			// Fetch and print all the records.
			while ($row = mysql_fetch_array($result)) {
				$html2= $html2.'
				<tr>
				<td align=\"left\">' . stripslashes($row['item']) . '</td>
				<td align=\"left\">'.$row['description'].'</td>
				<td align=\"left\">'.$row['ucost'].'</td>
				<td align=\"left\">'.$row['quantity'].'</td>
				<td align=\"left\">'.$row['unit'].'</td>
                                studnum
				</tr>';
			}
		
		$html3 ='</table>';
}//end of if

else { // If it did not run OK.
	$html1='<p>There are currently no registered users.</p>'; 
	$html2='';
	$html3='';
	
}


$html=$html1.$html2.$html3;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('test_save - MPS-'.date('Y-M-d').'.pdf', 'I');
