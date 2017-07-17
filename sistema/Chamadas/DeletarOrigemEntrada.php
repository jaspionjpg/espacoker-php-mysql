<?php

include_once "../Entidades/Entity_OrigemEntrada.php";

$oren_ent = new Entity_OrigemEntrada();

$codOrigemEntrada = $_GET['id'];

$oren_ent->deletaOrigem($codOrigemEntrada);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaOrigemEntrada.php?i=del'; </script>";
