<?php
include '../Entidades/Entity_Caixa.php';

include_once "../Models/Caixa.php";
include_once "../Entidades/Entity_SaidaCaixa.php";
include_once '../Utils/ConectaBanco.php';
$caixa = new Entity_Caixa();
$ensa = new Caixa();
$ensa_ent = new Entity_SaidaCaixa();

$ensa->setValorCaixa($_POST['valor']);
$ensa->setCodOrigemCaixa($_POST['origem']);

if($ensa->getValorCaixa() >= ($caixa->apresentarvalorcaixabusca())){
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSaidaCaixa.php?i=caixa'; </script>";
    
} else {
$ensa_ent->Insert($ensa);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSaidaCaixa.php?i=sucess'; </script>";
}


?>
