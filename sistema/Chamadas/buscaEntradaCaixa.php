<?php

include_once "../Models/Origem.php";
include_once "../Entidades/Entity_OrigemEntrada.php";

$oren = new Origem();
$oren_ent = new Entity_OrigemEntrada();

$oren->setDescOrigem($_POST['nome']);

$oren_ent->Insert($oren);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaOrigemEntrada.php?i=sucess'; </script>";


?>
