<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Servicos',0,1,'C');
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
	$pdf->SetTitle("Servicos");

	$sqlt = "SELECT * FROM tbservico where codServico = ".$_GET['id'];
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare($sqlt);
	$sql->execute();

	foreach($sql as $resultado){

			$pdf->Image('../imagens/imagensUpload/'. $resultado['nomeImagem'],9,8	,5,5);
			$pdf->Cell(20,2,' ' ,0,1,'C');
			$pdf->Cell(20,2,' ' ,0,1,'C');
			$pdf->Cell(20,2,'Codigo do servico: ' . $resultado['codServico'],0,1,'C');
			$pdf->Cell(20,2,'Nome do servico: ' . $resultado['nomeServico'],0,1,'C');
			$pdf->Cell(20,2,'Descricao do Servico: ' . $resultado['descServico'],0,1,'C');
			$pdf->Cell(20,2,'Duracao media do Servico: ' . $resultado['duracaoServico'],0,1,'C');
			$pdf->Cell(20,2,'Valor do Servico: ' . $resultado['valorServico'].' Reais',0,1,'C');
	}

	$pdf->OutPut();
?>
