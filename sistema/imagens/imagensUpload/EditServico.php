<?php
include_once "../../Models/Servico.php";
include_once "../../Entidades/Entity_Servico.php";

$serv = new Servico();
$serv_ent = new Entity_Servico();

$serv->setCodServico($_GET['id']);
$serv->setNomeServico($_POST['nome']);
$serv->setDescServico($_POST['descricao']);
$serv->setDuracaoServico($_POST['tempo']);
$serv->setValorServico($_POST['valor']);

$imagem = $_FILES['file'];

if($imagem != NULL) {
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

$serv->setCodImagem($nomeFinal);
} }else {
  $serv->setCodImagem(1);
}

$serv_ent->EditServico($serv);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/paginaServicos.php'; </script>";


?>
