<?php 
session_start();
require('fpdf/fpdf.php');
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
 
  function fetch_data() 
 {  
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
      $output = '';  
      $res = mysqli_query($db, "SELECT * FROM finance_collection fc WHERE fc.collection_date  like '$year-$month-%'");
      
      while($row = mysqli_fetch_array($res))  
      {
     $output .= '<tr>   
                          <td>'.$row["collection_date"].'</td>  
                          <td>'.$row["collection_particular"].'</td>  
                          <td>'.number_format($row["collection_amount"],2).'</td>  
                </tr>

                       ';}
                            
      
      return $output;
                  
            
 }

  function fetch_data2() 
 {  
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
      $output = '';  
      $res = mysqli_query($db, "SELECT * FROM finance_disbursement fc WHERE fc.disbursement_date  like '$year-$month-%'");
      
      while($row = mysqli_fetch_array($res))  
      {
     $output .= '<tr>   
                          <td>'.$row["disbursement_date"].'</td>  
                          <td>'.$row["disbursement_particular"].'</td>  
                          <td>'.number_format($row["disbursement_amount"],2).'</td>  
                </tr>

                       ';}
                            
      
      return $output;
                  
            
 }
 function fetch_1(){
  include("dbcon.php");
    $year=$_GET['year'];
    $month=$_GET['month'];
    $out = '';
    $sql1 = "SELECT sum(collection_amount) as collection_sum from finance_collection fc WHERE fc.collection_date LIKE '$year-$month%'";
    $result = mysqli_query($db, $sql1);
    $row = mysqli_fetch_array($result);
    $out=$row["collection_sum"];
    $out = '<tr>   
                          <td></td><td><b>Total Collection:</b></td><td>'.number_format($out,2).'</td>
                          </tr>';
    return $out;

 }
  
 function fetch_t1(){
  include("dbcon.php");
    $year=$_GET['year'];
    $month=$_GET['month'];
    $out = '';
    $sql1 = "SELECT sum(collection_amount) as collection_sum from finance_collection fc WHERE fc.collection_date LIKE '$year-$month%'";
    $result = mysqli_query($db, $sql1);
    $row = mysqli_fetch_array($result);
    $out=$row["collection_sum"];
  
    return $out;

 }
 function fetch_2(){
  include("dbcon.php");
    $year=$_GET['year'];
    $month=$_GET['month'];
    $out = '';
    $sql2 = "SELECT sum(disbursement_amount) as disbursement_sum from finance_disbursement fd WHERE fd.disbursement_date LIKE '$year-$month%'";
    $result1 = mysqli_query($db, $sql2);
    $row1 = mysqli_fetch_array($result1);
    $out = $row1["disbursement_sum"];
    $out = '<tr>   
                          <td></td><td><b>Total Disbursement:</b></td><td>'.number_format($out,2).'</td>
                          </tr>';
    return $out;
 }
 function fetch_t2(){
  include("dbcon.php");
    $year=$_GET['year'];
    $month=$_GET['month'];
    $out = '';
    $sql2 = "SELECT sum(disbursement_amount) as disbursement_sum from finance_disbursement fd WHERE fd.disbursement_date LIKE '$year-$month%'";
    $result1 = mysqli_query($db, $sql2);
    $row1 = mysqli_fetch_array($result1);
    $out = $row1["disbursement_sum"];
    
    return $out;
 }

 function fetch_tp(){
    include("dbcon.php");
    $year=$_GET['year'];
    $month=$_GET['month'];
      $out = '';  
      $sql2 = "SELECT sum(disbursement_amount) as disbursement_sum from finance_disbursement fd WHERE fd.disbursement_date LIKE '$year-$month%'";
      $sql1 = "SELECT sum(collection_amount) as collection_sum from finance_collection fc WHERE fc.collection_date LIKE '$year-$month%'";  
      $result = mysqli_query($db, $sql1);
      $result1 = mysqli_query($db, $sql2);
      $row1 = mysqli_fetch_array($result1);
      $row = mysqli_fetch_array($result);
      $tp = $row["collection_sum"];
      $tpp = $row1["disbursement_sum"];
      $out = '<tr>   
                          <td></td><td><b>Total Collection:</b></td><td>'.$tp.'</td>
                          <td></td><td><b>Total Disbursement:</b></td><td>'.$tpp.'</td>       
                     </tr>';
                            
      
      return $out;


 }
 function fetch_month(){
  include("dbcon.php");
    $mon='';
    $month=$_GET['month'];
    if($month == '01'){
      $mon='For the Month of January';
    }
    elseif($month == '02'){
      $mon = 'For the Month of February';
    }
    elseif($month == '03'){
      $mon = 'For the Month of March';
    }
    elseif($month == '04'){
      $mon = 'For the Month of April';
    }
    elseif($month == '05'){
      $mon = 'For the Month of May';
    }
    elseif($month == '06'){
      $mon = 'For the Month of June';
    }
    elseif($month == '07'){
      $mon = 'For the Month of July';
    }
    elseif($month == '08'){
      $mon = 'For the Month of August';
    }
    elseif($month == '09'){
      $mon = 'For the Month of September';
    } 
    elseif($month == '10'){
      $mon = 'For the Month of October';
    }
    elseif($month == '11'){
      $mon = 'For the Month of November';
    }
    elseif($month == '12'){
      $mon = 'For the Month of December';
    }
    else{
      $mon ='No Month is Selected';}
    
    return $mon;
} 
  
  
   

  class PDF extends FPDF
{
// Page header
    
    
function Header()
{
  require('process.php');
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];

    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Move to the right
    
    
    
    $this->Cell(80);
    
}

function Footer()
{

  $this->SetY(-15);
  $this->SetFont('Arial','',8);
  $this->Cell(0,10,'Page' .$this->PageNo()." / {pages}",0,0,'C');
}
}
    
   
 
// Instanciation of inherited class

$pdf = new PDF('P','mm','legal');

$pdf->AliasNbPages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
 

    // Title
    $pdf->Cell(400,5,"",0,1,'C');
    $pdf->Cell(0,5,"Republic of the Philippines",0,1,'C');
 $pdf->Image($picngbmis, 12, 10, 35, 30, 'png');

 $pdf->Image($picngbmis1, 160, 10, 33, 28, 'png'); 
    $pdf->Cell(0,5,"Province of Cavite",0,1,'C');
    $pdf->Cell(0,5,"City of General Trias",0,1,'C');
    $pdf->Cell(0,5,"BARANGAY PINAGTIPUNAN",0,0,'C');
    $pdf->Cell(0,5," ",0,0,'C');
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Ln(10);
    $pdf->Cell(0,5,"ITEMIZED MONTHLY COLLECTION AND DISBURSEMENT ",0,1,'C');
    
    $pdf->Cell(0,3,fetch_month(),0,1,'C');
    
    $pdf->Cell(0,5,$year,0,0,'C');
    $pdf->Ln(15);
    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(200,5,"COLLECTION" ,1,1,'C');
    
    
    $pdf->Cell(50,5,"DATE" ,1,0,'C');
    $pdf->Cell(100,5,"PARTICULARS" ,1,0,'C');
    $pdf->Cell(50,5,"AMOUNT" ,1,1,'C');
    //query
    $res = mysqli_query($db, "SELECT * FROM finance_collection  WHERE collection_date LIKE '$year-$month%'");
       while($row = mysqli_fetch_array($res))
       {

        $pdf->Cell(50,5,$row["collection_date"] ,1,0,'C');
        $pdf->Cell(100,5,$row["collection_particular"] ,1,0,'C');
        $pdf->Cell(50,5,number_format($row["collection_amount"],2) ,1,1,'R');
      }
      //TOTAL
      $pdf->Cell(50,5,"" ,1,0,'C');
      $pdf->Cell(100,5,"TOTAL COLLECTION" ,1,0,'C');
      $pdf->Cell(50,5,number_format(fetch_t1(),2) ,1,1,'R');

      $pdf->Ln(15);

      $pdf->SetFont('Arial','',11);
    $pdf->Cell(200,5,"DISBURSEMENT" ,1,1,'C');

    $pdf->Cell(50,5,"DATE" ,1,0,'C');
    $pdf->Cell(100,5,"PARTICULARS" ,1,0,'C');
    $pdf->Cell(50,5,"AMOUNT" ,1,1,'C');
    
    
    $ress = mysqli_query($db, "SELECT * FROM finance_disbursement  WHERE disbursement_date LIKE '$year-$month%'");
       while($row1= mysqli_fetch_array($ress))
       {
    
        $pdf->Cell(50,5,$row1["disbursement_date"] ,1,0,'C');
        $pdf->Cell(100,5,$row1["disbursement_particular"] ,1,0,'C');
        $pdf->Cell(50,5,number_format($row1["disbursement_amount"],2) ,1,1,'R');
       }
     
    $pdf->Cell(50,5,"" ,1,0,'C');
    $pdf->Cell(100,5,"TOTAL DISBURSEMENT" ,1,0,'C');
    $pdf->Cell(50,5,number_format(fetch_t2(),2) ,1,1,'R');
    
    $pdf->Ln(10);
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(100,5,"Prepared by:",0,0,'L');
    $pdf->Cell(60,5,"Approved by:",0,0,'R');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','BU',11);
   // $this->Cell(300,5,"$secname",5,0,'L');
   // $this->Cell(36,5,"$name",5,1,'R');
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(60,5,"Barangay Treasurer",0,0,'L');
    $pdf->Cell(110,5,"Barangay Captain",0,0,'R');


$pdf->Output();

 ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

</head>

<body>
    <center>
        <br /><br />
        <div class="container" style="width:800px;">
            <h3 align="center"></h3><br />
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="3">
                            <center><b>COLLECTION</b></center>
                        </td>

                    </tr>
                    <tr>
                        <center>
                            <th width="13%">DATE</th>
                            <th width="26%">PARTICULARS</th>
                            <th width="11%">AMOUNT</th>
                        </center>
                    </tr>

                    <?php  
          echo fetch_data();
          
          echo fetch_1();
          ?>
                    <tr>
                        <td colspan="3">
                            <center><b>DISBURSEMENT</b></center>
                        </td>

                    </tr>
                    <tr>
                        <center>
                            <th width="13%">DATE</th>
                            <th width="26%">PARTICULARS</th>
                            <th width="11%">AMOUNT</th>
                        </center>
                    </tr>
                    <?php  
          echo fetch_data2();
          
          echo fetch_2();
          ?>
                </table>
                <br />

            </div>
        </div>
    </center>
</body>

</html>