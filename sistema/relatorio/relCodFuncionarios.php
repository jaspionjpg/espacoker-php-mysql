<?php


	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');


	class doc extends FPDF{

function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);
		$this->Ln(5);
		$this->Cell(20,2,'Funcionarios',0,1,'C');
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
	$pdf->SetTitle("Funcionarios");

	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
	$sql = $pdo->prepare("SELECT *  FROM tbusuario WHERE tipoUsuario = 'admim' AND codUsuario = ".$_GET['id']);
	$sql->execute();

	foreach($sql as $resultado){

			$pdf->Cell(20,2,'Codigo do Funcionario: ' . $resultado['codUsuario'],0,1,'C');
			$pdf->Cell(20,2,'Nome do Funcionario: ' . $resultado['nomeUsuario'],0,1,'C');
			$pdf->Cell(20,2,'Data Nascimento do Funcionario: ' . $resultado['dataNascimentoUsuario'],0,1,'C');
			$pdf->Cell(20,2,'Email do Funcionario: ' . $resultado['emailUsuario'],0,1,'C');
			$pdf->Cell(20,2,'Login do Funcionario: ' . $resultado['login'],0,1,'C');
			$pdf->Cell(20,2,'CPF do Funcionario: ' . $resultado['cpfFuncionario'],0,1,'C');
			$pdf->Cell(20,2,'Salario do Funcionario: ' . $resultado['salarioFuncionario'],0,1,'C');
			$pdf->Cell(20,2,'Sexo do Funcionario: ' . $resultado['sexoUsuario'],0,1,'C');
	}
	$pdf->Cell(20,1,'Telefones para Contato: ',0,1,'C');

	$sql = $pdo->prepare("SELECT * FROM tbtelefoneusuario WHERE codUsuario = ".$_GET['id']);
	$sql->execute();

	foreach($sql as $resultado){

			$pdf->Cell(20,1, $resultado['numTelefoneUsuario'],0,1,'C');
	}



	$pdf->OutPut();
?>
