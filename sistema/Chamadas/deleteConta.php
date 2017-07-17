<?php

include_once "../Entidades/Entity_Conta.php";

$oren_ent = new Entity_Conta();

$codOrigemEntrada = $_GET['id'];

$oren_ent->deletar($codOrigemEntrada);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaComanda.php?i=del'; </script>";
