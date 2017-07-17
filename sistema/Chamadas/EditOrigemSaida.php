<?php

include_once "../Models/Origem.php";
include_once "../Entidades/Entity_OrigemSaida.php";

$orsa = new Origem();
$orsa_ent = new Entity_OrigemSaida();

$orsa->setCodOrigem($_GET['id']);
$orsa->setDescOrigem($_POST['nome']);

$orsa_ent->EditOrigem($orsa);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaOrigemSaida.php?i=ed'; </script>";


?>
