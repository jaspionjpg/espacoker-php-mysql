<?php
include_once "../../Entidades/Entity_SlidePrincipal.php";

$slid_ent = new Entity_SlidePrincipal();

$texto = $_POST['texto'];

$imagem = $_FILES['file'];
$nomeFinal = "";
if($imagem != NULL) {
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal);
		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

} }

$slid_ent->InsertPrincipal($texto, $nomeFinal);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSliderPrincipal.php?i=sucess'; </script>";


?>
