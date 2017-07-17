<?php

	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');
	
class doc extends FPDF{
	
function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);  
		$this->Ln(5);
		$this->Cell(20,2,'Produtos',0,1,'C');
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
	$pdf->SetTitle("Produtos");
	
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare("SELECT * FROM tbproduto INNER JOIN tbfabricante ON tbfabricante.codFabricante = tbproduto.codFabricante ");
	$sql->execute();
		
	
		
		$pdf->Cell(4,1,'Descricao',1,0,'C');
		$pdf->Cell(2,1,'Quant.',1,0,'C');
		$pdf->Cell(4,1,'Valor Venda (un)',1,0,'C');
		$pdf->Cell(4,1,'Valor Compra (un)',1,0,'C');
		$pdf->Cell(3,1,'Fabricante',1,1,'C');
	
	foreach($sql as $resultado){
		
		$pdf->Cell(4,1, $resultado['descProduto'],1,0,'C');
		$pdf->Cell(2,1, $resultado['quantidadeProduto'],1,0,'C');
		$pdf->Cell(4,1, $resultado['valorUnidadeVenda'],1,0,'C');
		$pdf->Cell(4,1, $resultado['valorUnidadeCompra'],1,0,'C');
		$pdf->Cell(3,1, $resultado['descFabricante'],1,1,'C');
	}
	
	$pdf->OutPut();
?>