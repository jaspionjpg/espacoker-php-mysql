<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Agendamento',0,1,'C');
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
	$pdf->SetTitle("Agendamento");

	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare("SELECT * FROM tbagendamento inner join tbusuario on tbagendamento.codUsuario = tbusuario.codUsuario inner join tbservico on tbagendamento.codServico = tbservico.codServico WHERE 1 = 1 AND codAgendamento = ".$_GET['id']);
	$sql->execute();

	foreach($sql as $resultado){

			$pdf->Cell(20,2,'Codigo do Agendamento: ' . $resultado['codAgendamento'],0,1,'C');
			$pdf->Cell(20,2,'Data do Agendamento: ' . $resultado['dataAgendamento'],0,1,'C');
			$pdf->Cell(20,2,'Hora do Agendamento: ' . $resultado['horarioAgendamento'],0,1,'C');
			$pdf->Cell(20,2,'Usuario: ' . $resultado['nomeUsuario'],0,1,'C');
			$pdf->Cell(20,2,'Serviço: ' . $resultado['nomeServico'],0,1,'C');
	}
	

	$pdf->OutPut();
?>
