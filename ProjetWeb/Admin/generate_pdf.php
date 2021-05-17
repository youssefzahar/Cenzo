
<?php
//include connection file 
//include_once("../config.php");
include_once('pdf/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   // $this->Image('C:/wamp64/www/LSM/front/views/img/logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'LISTE DES  Commandes',1,0,'C');
    // Line break
    $this->Ln(20);

}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}
 
$dbConnection = mysqli_connect('localhost', 'root', '', 'cenzo3.0v');

$query  = "SELECT * FROM commande where etat = 'confirme'";
$result = mysqli_query($dbConnection, $query);
$e=0;
$i=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page

$image1 = "assets/img/cenzo.png";
$pdf-> Image($image1,0,0,35,35);

    $pdf->AliasNbPages();
$pdf->SetFont('Arial','B',11);
if (mysqli_num_rows($result) > 0) {

    $pdf->Cell(30,10,"id",1,0);
    $pdf->Cell(20,10,"id_client",1,0);
    $pdf->Cell(23,10,"nbrproduit",1,0);
    $pdf->Cell(20,10,"totalprix",1,0);
    $pdf->Cell(25,10,"date",1,0);
    $pdf->Cell(30,10,"adresse",1,0);
    $pdf->Cell(30,10,"Telephone",1,0);
    $pdf->Cell(20,10,"livree",1,1);


;
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $id = $row['id'];
          $idclient = $row['id_client'];
          $nbrproduit = $row['nbrproduit'];
          $totalprix =$row['totalprix'];
          $date =$row['date'];
          $adresse =$row['adresse'];
          $telephone =$row['numeroTelephone'];
          $etat =$row['etat'];

          if($e==0)
          {
          $pdf->Cell(30,10,"{$id} ",1,0);
          $pdf->Cell(20,10,"{$idclient} ",1,0);
          $pdf->Cell(23,10,"{$nbrproduit} ",1,0);
          $pdf->Cell(20,10,"{$totalprix} ",1,0);
          $pdf->Cell(25,10,"{$date} ",1,0);
          $pdf->Cell(30,10,"{$adresse} ",1,0);
          $pdf->Cell(30,10,"{$telephone} ",1,0);
          $pdf->Cell(20,10," ",1,1);
  
          }
         $image1 = "assets/img/signature.png";
         $pdf-> Image($image1,70,200,70,35);
  
  
      } }
$pdf->Output();
?>
