<?php

include_once "../Models/Caixa.php";
include_once "../Entidades/Entity_SaidaCaixa.php";

$enca = new Caixa();
$enca_ent = new Entity_SaidaCaixa();

$enca->setCodCaixa($_GET['id']);
$enca->setValorCaixa($_POST['valor']);
$enca->setCodOrigemCaixa($_POST['origem']);

$enca_ent->EditSaidaCaixa($enca);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSaidaCaixa.php?i=ed'; </script>";


?>
