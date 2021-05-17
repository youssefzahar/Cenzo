
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
        $this->Cell(80,10,'LISTE DES  Recette',1,0,'C');
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

$query  = "SELECT * FROM recette";
$result = mysqli_query($dbConnection, $query);
$e=0;
$i=0;
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
if (mysqli_num_rows($result) > 0) {

    $pdf->Cell(30,10,"id",1,0);
    $pdf->Cell(40,10,"nom",1,0);
    $pdf->Cell(40,10,"description",1,0);
    $pdf->Cell(70,10,"Ingredients",1,1);



    ;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $id = $row['id'];
        $nom = $row['nom'];
        $description = $row['description'];

        if($e==0)
        {
            $pdf->Cell(30,10,"{$id} ",1,0);
            $pdf->Cell(40,10,"{$nom} ",1,0);
            $pdf->Cell(40,10,"{$description} ",1,0);
            $query2  = "SELECT * FROM recette_ingredient where id_recette = ".$id." ";
            $result2 = mysqli_query($dbConnection, $query2);
            $ingredient="";
            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                 $query3  = "SELECT nom FROM ingredient where id = ".$row2['id_ingredient']." ";
                $result3 = mysqli_query($dbConnection, $query3);
                while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                    $ingredient.=$row3['nom'].",";
                }

            }
            
                 $pdf->Cell(70,10,$ingredient,1,1);
        }



    } }
$pdf->Output();
?>
