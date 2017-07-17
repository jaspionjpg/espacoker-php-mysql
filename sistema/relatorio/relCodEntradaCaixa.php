<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Entrada do Caixa',0,1,'C');
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
	$pdf->SetTitle("Usuarios");

	$sqlt = "SELECT * FROM tbentradacaixa inner join  tborigementradacaixa on tborigementradacaixa.codOrigemEntradaCaixa = tbentradacaixa.codOrigemEntradaCaixa where codEntradaCaixa = ".$_GET['id'];
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare($sqlt);
	$sql->execute();
	foreach($sql as $resultado){
			$pdf->Cell(20,2,'Codigo de entrada caixa: ' . $resultado['codEntradaCaixa'],0,1,'C');
			$pdf->Cell(20,2,'Motivo da saida: ' . $resultado['descOrigemEntradaCaixa'],0,1,'C');
			$pdf->Cell(20,2,'Valor da saida: ' . $resultado['valorEntradaCaixa']. ' Reais',0,1,'C');
			$pdf->Cell(20,2,'Data da saida: ' . $resultado['dataEntradaCaixa'],0,1,'C');
	}

	$pdf->OutPut();
?>
