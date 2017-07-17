<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Origem Saidas em Caixa',0,1,'C');
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
	$pdf->SetTitle("Origem Saida");

	$sqlt = "SELECT * FROM tborigemsaidacaixa where codOrigemSaidaCaixa = ".$_GET['id'];
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare($sqlt);
	$sql->execute();
	foreach($sql as $resultado){
			$pdf->Cell(20,2,'Codigo da origem de saida em caixa: ' . $resultado['codOrigemSaidaCaixa'],0,1,'C');
			$pdf->Cell(20,2,'Nome da origem de saida: ' . $resultado['descOrigemSaidaCaixa'],0,1,'C');
	}

	$pdf->Cell(20,2,'Saidas em caixa do ultimo mes com ' . $resultado['descOrigemSaidaCaixa'],0,1,'C');

	$sqlt = "SELECT * FROM `tbsaidacaixa` WHERE codOrigemSaidaCaixa = ".$_GET['id']. " AND YEAR(dataSaidaCaixa) = YEAR(NOW()) AND Month(dataSaidaCaixa) >= Month(NOW())-1 ";
	$sql = $pdo->prepare($sqlt);
	$sql->execute();
	$pdf->Cell(9.2,1,'Valor da saida',1,0,'C');
	$pdf->Cell(9.2,1,'Data da saida',1,1,'C');

	foreach($sql as $resultado){
			$pdf->Cell(9.2,1,$resultado['valorSaidaCaixa'],1,0,'C');
			$pdf->Cell(9.2,1,$resultado['dataSaidaCaixa'],1,1,'C');
	}


	$pdf->OutPut();
?>
