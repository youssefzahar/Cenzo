<?php
   
    require("fpdf/fpdf.php");
    $db=new PDO("mysql:host=localhost;dbname=projet_food", "root", "mysql");
   
    class myPDF extends FPDF
    {
   
    function header()
    {
    $this->SetFont("Arial","B",14);
            $this->Cell(10,10,"Forum",'C');
            $this->Ln(20);
            $this->Cell(5,5,"liste des Forum:",'C');
            $this->ln();
    }
    function headertable()
    {
    $this->SetFont('Times','B',12);
    $this->Cell(40,10,'Categorie',1,0,'C');
    $this->Cell(40,10,'Sujet',1,0,'C');
    $this->Cell(40,10,'Description',1,0,'C');
    $this->ln();
    }
    function viewsTable($db)
    {
    $this->SetFont('times','',12);
    $stmt = $db->query("SElECT * From Forum");
            while($data = $stmt->fetch(PDO::FETCH_OBJ))
            {
       $this->Cell(40,10,$data->categorie,1,0,'C');
       $this->Cell(40,10,$data->sujet,1,0,'L');
       $this->Cell(40,10,$data->description,1,0,'L');
       $this->ln();
            }

    }
    }
    $pdf=new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headertable();
    $pdf->viewsTable($db);
    $pdf->output("Forum.pdf", "D");


?>