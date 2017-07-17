<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->SetFont('Arial','B',20);
		$this->Cell(20,2,'Cupom Fiscal',0,1,'C');
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
	$pdf->SetTitle("");

	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');

	$sql = $pdo->prepare("SELECT * FROM tbconta inner join tbusuario on tbusuario.codUsuario = tbconta.codUsuario 
                                      inner join tbcomandaservico on tbcomandaservico.codComandaServico = tbconta.codComandaServico
                                      inner join tbcomandavenda on tbcomandavenda.codComandaVenda = tbconta.codComandaVenda where 1 = 1 AND codConta = ".$_GET['id']);
	$sql->execute();

	foreach($sql as $resultado){
		$pdf->Cell(20,2,'Data de geracao comanda : '. $resultado['dataConta'],0,1,'C');
		$pdf->Cell(12,1,'Itens',1,0,'C');
		$pdf->Cell(5,1,'Quantidade',1,0,'C');
		$pdf->Cell(2,1,'Valor',1,1,'C');


		$sql2 = $pdo->prepare("SELECT * FROM tbitenscomandavenda inner join tbproduto on tbproduto.codProduto = tbitenscomandavenda.codProduto WHERE codComandaVenda = (select codComandaVenda from tbconta where codConta = {$_GET['id']})");
		$sql2->execute();

		foreach($sql2 as $resultado2){
			$pdf->Cell(4,1,$resultado2['descProduto'],0,0,'L');
			$pdf->Cell(11,1,$resultado2['qtdeProdutoVenda'].'',0,0,'R');
			$pdf->Cell(3.5,1,$resultado2['valorUnidadeVenda']*$resultado2['qtdeProdutoVenda'].'',0,1,'R');
		
		$pdf->Cell(0,0,'',1,1,'L');
		}

$sql2 = $pdo->prepare("SELECT * FROM tbitenscomandaservico inner join tbservico on tbservico.codServico = tbitenscomandaservico.codServico WHERE codComandaServico = (select codComandaServico from tbconta where codConta = {$_GET['id']})");
		$sql2->execute();

		foreach($sql2 as $resultado2){
			$pdf->Cell(4,1,$resultado2['nomeServico'],0,0,'L');
			$pdf->Cell(11,1,$resultado2['qtdeServico'].'',0,0,'R');
			$pdf->Cell(3.5,1,$resultado2['valorServico']*$resultado2['qtdeServico'].'',0,1,'R');
		
		$pdf->Cell(0,0,'',1,1,'L');
		}

		$pdf->Cell(0,0,'',1,1,'L');
$pdf->SetY("20");
		$pdf->Cell(4,1,'Valor Total : ',0,0,'L');
		$pdf->Cell(14.5,1,$resultado['valorTotal'].'',0,1,'R');

		$pdf->Cell(4,1,'Desconto : ',0,0,'L');
		$pdf->Cell(14.5,1,$resultado['desconto'].'',0,1,'R');

		$pdf->Cell(4,1,'Valor a pagar : ',0,0,'L');
		$pdf->Cell(14.5,1,$resultado['valorTotal'] - $resultado['desconto'].'',0,1,'R');

		$pdf->Cell(18,1,'Volte Sempre ',0,0,'C');
	}


	$pdf->OutPut();
?>
