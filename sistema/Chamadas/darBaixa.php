<?php
include_once "../Entidades/Entity_Conta.php";
include_once "../Entidades/Entity_Parcela.php";

$cont_ent = new Entity_Conta();
$parc_ent = new Entity_Parcela();

$cont_ent->darBaixa($_GET['id'], $_GET['valor'],$_GET['valortotal']);
if(isset($_GET['dataApagar'])){
	$parc_ent->InsertParcela($_GET['id'],$_GET['dataApagar']);
}
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaComanda.php?i=sucess'; </script>";


?>
