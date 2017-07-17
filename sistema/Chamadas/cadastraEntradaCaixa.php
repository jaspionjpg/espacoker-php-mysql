<?php

include_once "../Models/Caixa.php";
include_once "../Entidades/Entity_EntradaCaixa.php";

$enca = new Caixa();
$enca_ent = new Entity_EntradaCaixa();

$enca->setValorCaixa($_POST['valor']);
$enca->setCodOrigemCaixa($_POST['origem']);

$enca_ent->Insert($enca);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/indexSistema.php?i=sucess'; </script>";


?>
