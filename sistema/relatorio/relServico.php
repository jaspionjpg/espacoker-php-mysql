<?php

	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');
	
class doc extends FPDF{
	
function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);  
		$this->Ln(5);
		$this->Cell(20,2,'Servicos',0,1,'C');
		$this->Ln(2);
		
		
		}
function Footer(){
   
    $this->SetY(-6);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
	
	
	$pdf = new doc ('P', 'cm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->SetTitle("Servicos");
	
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare("SELECT * FROM tbservico");
	$sql->execute();
		
	
		
		$pdf->Cell(4,1,'Descricao',1,0,'C');
		$pdf->Cell(2,1,'Duracao',1,0,'C');
		$pdf->Cell(4,1,'Valor',1,1,'C');
		
	
	foreach($sql as $resultado){
		
		$pdf->Cell(4,1, $resultado['descServico'],1,0,'C');
		$pdf->Cell(2,1, $resultado['duracaoServico'],1,0,'C');
		$pdf->Cell(4,1, $resultado['valorServico'],1,1,'C');
		
	}
	
	$pdf->OutPut();
?>