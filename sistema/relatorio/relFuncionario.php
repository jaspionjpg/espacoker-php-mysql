<?php
	
	//define ('FPDF_FONTPATH','font/');
	require ('pdf/fpdf.php');
	
	
	class doc extends FPDF{
	
function Header(){
		$this->Image('logo.png',5,1,10,5);
		$this->SetFont('Arial','B',20);  
		$this->Ln(5);
		$this->Cell(20,2,'Funcionarios',0,1,'C');
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
	$pdf->SetFont('Arial','B',11);
	$pdf->SetTitle("Funcionarios");
	
	$pdo = new PDO ('mysql:host=localhost; dbname=espacoker', 'root','');
//	$sql = $pdo->prepare("SELECT *  FROM tbusuario WHERE tipoUsuario = 'admim' AND dataCadastro >= ".$_GET['de']." AND dataCadastro <= ".$_GET['ate']);
	$sql = $pdo->prepare("SELECT *  FROM tbusuario WHERE tipoUsuario = 'admim'");
	$sql->execute();
	
		
		$pdf->Cell(4,1,'Nome',1,0,'C');
		$pdf->Cell(3,1,'Data Nasc.',1,0,'C');
		$pdf->Cell(5,1,'Email',1,0,'C');
		$pdf->Cell(3,1,'Salario',1,0,'C');
		$pdf->Cell(4,1,'Login',1,1,'C');
	
	
	foreach($sql as $resultado){
		$pdf->Cell(4,1, $resultado['nomeUsuario'],1,0,'C');
		$pdf->Cell(3,1, $resultado['dataNascimentoUsuario'],1,0,'C');
		$pdf->Cell(5,1, $resultado['emailUsuario'],1,0,'C');
		$pdf->Cell(3,1, $resultado['salarioFuncionario'],1,0,'C');
		$pdf->Cell(4,1, $resultado['login'],1,1,'C');
		
	}
	
	$pdf->OutPut();
?>