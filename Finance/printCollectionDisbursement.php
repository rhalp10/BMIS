<?php 
session_start();
require('fpdf/fpdf.php');
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
  $sql = mysqli_query($con , "SELECT * FROM accounts where Position = 'Barangay Captain'");
  while($row = mysqli_fetch_assoc($sql))
  {
    $_SESSION['captain'] = $row['Fullname'];
  }
 
  function fetch_data() 
 {  
  include("dbcon.php");
  $year=$_GET['year'];
  $month=$_GET['month'];
      $output = '';  
      $res = mysqli_query($con, "SELECT * FROM finance_collection fc WHERE fc.collection_date  like '$year-$month-%'");
      
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
      $res = mysqli_query($con, "SELECT * FROM finance_disbursement fc WHERE fc.disbursement_date  like '$year-$month-%'");
      
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
    $result = mysqli_query($con, $sql1);
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
    $result = mysqli_query($con, $sql1);
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
    $result1 = mysqli_query($con, $sql2);
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
    $result1 = mysqli_query($con, $sql2);
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
      $result = mysqli_query($con, $sql1);
      $result1 = mysqli_query($con, $sql2);
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
  
 if(isset($_POST["create_pdf"]))  
 {  

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
    $this->SetFont('Times','B',12);
    // Move to the right
    
    
    
    $this->Cell(80);
    
   
    // Title
    $this->Cell(400,5,"",0,1,'C');
    $this->Cell(0,5,"Republic of the Philippines",0,1,'C');
/*    $this->Image('logo.png',30,6,30);
    $this->Image('logo.png',150,6,30);*/
    $this->Cell(0,5,"Province of Cavite",0,1,'C');
    $this->Cell(0,5,"Municipal of Indang",0,1,'C');
    $this->Cell(0,5,"BARANGAY  TAMBO MALAKI",0,0,'C');
    $this->Cell(0,5," ",0,0,'C');
    
    $this->SetFont('Times','B',12);
    $this->Ln(10);
    $this->Cell(0,5,"ITEMIZED MONTHLY COLLECTION AND DISBURSEMENT ",0,1,'C');
    
    $this->Cell(0,3,fetch_month(),0,1,'C');
    
    $this->Cell(0,5,$year,0,0,'C');
    $this->Ln(15);
    
    $this->SetFont('Times','B',10);
    $this->Cell(200,5,"COLLECTION" ,1,1,'C');
    
    
    $this->Cell(50,5,"DATE" ,1,0,'C');
    $this->Cell(100,5,"PARTICULARS" ,1,0,'C');
    $this->Cell(50,5,"AMOUNT" ,1,1,'C');
    //query
    $res = mysqli_query($con, "SELECT * FROM finance_collection  WHERE collection_date LIKE '$year-$month%'");
       while($row = mysqli_fetch_array($res))
       {

        $this->Cell(50,5,$row["collection_date"] ,1,0,'C');
        $this->Cell(100,5,$row["collection_particular"] ,1,0,'C');
        $this->Cell(50,5,number_format($row["collection_amount"],2) ,1,1,'R');
      }
      //TOTAL
      $this->Cell(50,5,"" ,1,0,'C');
      $this->Cell(100,5,"TOTAL COLLECTION" ,1,0,'C');
      $this->Cell(50,5,number_format(fetch_t1(),2) ,1,1,'R');

      $this->Ln(15);

      $this->SetFont('Times','B',10);
    $this->Cell(200,5,"DISBURSEMENT" ,1,1,'C');

    $this->Cell(50,5,"DATE" ,1,0,'C');
    $this->Cell(100,5,"PARTICULARS" ,1,0,'C');
    $this->Cell(50,5,"AMOUNT" ,1,1,'C');
    
    
    $ress = mysqli_query($con, "SELECT * FROM finance_disbursement  WHERE disbursement_date LIKE '$year-$month%'");
       while($row1= mysqli_fetch_array($ress))
       {
    
        $this->Cell(50,5,$row1["disbursement_date"] ,1,0,'C');
        $this->Cell(100,5,$row1["disbursement_particular"] ,1,0,'C');
        $this->Cell(50,5,number_format($row1["disbursement_amount"],2) ,1,1,'R');
       }
     
    $this->Cell(50,5,"" ,1,0,'C');
    $this->Cell(100,5,"TOTAL DISBURSEMENT" ,1,0,'C');
    $this->Cell(50,5,number_format(fetch_t2(),2) ,1,1,'R');
    
    $this->Ln(30);
    
    $this->SetFont('Arial','B',12);
    $this->Cell(100,5,"Prepared by:",0,0,'L');
    $this->Cell(60,5,"Approved by:",0,0,'R');
    $this->Ln(20);
    $this->SetFont('Arial','BU',15);
   // $this->Cell(300,5,"$secname",5,0,'L');
   // $this->Cell(36,5,"$name",5,1,'R');
    $this->Ln(3);
    $this->SetFont('Arial','',13);
    $this->Cell(0.5,-10, $_SESSION['fullname'], 0, 0, 'L');
    $this->Cell(60,5, $_SESSION['position'],0,0,'L');
    $this->Cell(120,-10, $_SESSION['captain'], 0, 0, 'R');
    $this->Cell(-5,5,"Punong Barangay",0,0,'R');
    
}}
    
   
 
// Instanciation of inherited class

$pdf = new PDF('P','mm','legal');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Output();
}
 ?>  
 <!DOCTYPE html>  
 <html>
 
      <head>  
                       
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:800px;">  
                <h3 align="center"></h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">
                          <tr>
                             <td colspan="3"><center><b>COLLECTION</b></center></td> 
                        
                          </tr>  
                          <tr> <center> 
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
                             <td colspan="3"><center><b>DISBURSEMENT</b></center></td> 
                        
                          </tr>  
                          <tr> <center> 
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
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  