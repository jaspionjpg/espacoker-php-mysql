<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Fabricante',0,1,'C');
		$this->Ln(1);

		}
function Footer(){

    $this->SetY(-6);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Fabricante '.$this->PageNo().'/{nb}',0,0,'C');
}
}
	$pdf = new doc ('P', 'cm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',11);
	$pdf->SetTitle("Fabricante");

	$sqlt = "SELECT * FROM tbfabricante where codFabricante = ".$_GET['id'];
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare($sqlt);
	$sql->execute();
	foreach($sql as $resultado){
			$pdf->Cell(20,2,'Codigo do Fabricante: ' . $resultado['codFabricante'],0,1,'C');
			$pdf->Cell(20,2,'Nome do Fabricante: ' . $resultado['descFabricante'],0,1,'C');
	}

	$pdf->Cell(20,2,'Produtos relacionados ao fabricante ' . $resultado['descFabricante'],0,1,'C');

	$sqlt = "SELECT * FROM `tbproduto` WHERE codFabricante = ".$_GET['id']. " ";
	$sql = $pdo->prepare($sqlt);
	$sql->execute();
	$pdf->Cell(4.25,1,'Descricao Produto',1,0,'C');
	$pdf->Cell(4.25,1,'Quantidade Produto',1,0,'C');
	$pdf->Cell(4.25,1,'Valor Unidade Venda',1,0,'C');
	$pdf->Cell(4.25,1,'Valor Unidade Compra',1,1,'C');

	foreach($sql as $resultado){
			$pdf->Cell(4.25,1,$resultado['descProduto'],1,0,'C');
			$pdf->Cell(4.25,1,$resultado['quantidadeProduto'],1,0,'C');
			$pdf->Cell(4.25,1,$resultado['valorUnidadeVenda'],1,0,'C');
			$pdf->Cell(4.25,1,$resultado['valorUnidadeCompra'],1,1,'C');
	}




	$pdf->OutPut();
?>
