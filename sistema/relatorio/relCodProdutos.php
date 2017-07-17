<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Produtos',0,1,'C');
		$this->Ln(1);

		}
function Footer(){

    $this->SetY(-6);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
	$pdf = new doc ('P', 'cm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',11);
	$pdf->SetTitle("Produtos");

	$sqlt = "SELECT * FROM tbproduto inner join  tbfabricante on tbfabricante.codFabricante = tbproduto.codFabricante where codProduto = ".$_GET['id'];
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare($sqlt);
	$sql->execute();

	foreach($sql as $resultado){
			$pdf->Cell(20,2,'Codigo do produto: ' . $resultado['codProduto'],0,1,'C');
			$pdf->Cell(20,2,'Descricao do produto: ' . $resultado['descProduto'],0,1,'C');
			$pdf->Cell(20,2,'Quantidade do produto em estoque: ' . $resultado['quantidadeProduto'],0,1,'C');
			$pdf->Cell(20,2,'Valor da unidade para venda do produto: ' . $resultado['valorUnidadeVenda'].' Reais',0,1,'C');
			$pdf->Cell(20,2,'Valor da unidade para compra do produto: ' . $resultado['valorUnidadeCompra'].' Reais' ,0,1,'C');
	}

	$pdf->OutPut();
?>
