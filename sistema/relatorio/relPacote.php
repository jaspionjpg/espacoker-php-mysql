<?php

	//define ('FPDF_FONTPATH','font/');
	echo("<meta charset='UTF-8'>");
	require ('pdf/fpdf.php');
	
class doc extends FPDF{
	
function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);  
		$this->Ln(5);
		$this->Cell(20,2,'Pacotes',0,1,'C');
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
	$pdf->SetTitle("Pacotes");
	
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare("SELECT * FROM tbpacote INNER JOIN tbitenspacote ON tbpacote.codPacote = tbitenspacote.codPacote  INNER JOIN tbservico ON tbservico.codServico = tbitenspacote.codServico ORDER BY nomePacote ASC");
	$sql->execute();
		
	
		
		$pdf->Cell(4,1,'Descricao',1,0,'C');
		$pdf->Cell(2,1,'Valor',1,0,'C');
		$pdf->Cell(4,1,'Data Cadastro',1,0,'C');
		$pdf->Cell(4,1,'Servico',1,1,'C');
		
	
	foreach($sql as $resultado){
		
		$pdf->Cell(4,1, $resultado['nomePacote'],1,0,'C');
		$pdf->Cell(2,1, $resultado['valorPacote'],1,0,'C');
		$pdf->Cell(4,1, $resultado['dataCadastro'],1,0,'C');
		$pdf->Cell(4,1, $resultado['nomeServico'],1,1,'C');
		
	}
	
	$pdf->OutPut();
?>