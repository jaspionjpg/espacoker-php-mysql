<?php

include_once "../Entidades/Entity_OrigemSaida.php";

$orsa_ent = new Entity_OrigemSaida();

$codOrigemSaida = $_GET['id'];

$orsa_ent->deletaOrigem($codOrigemSaida);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaOrigemSaida.php?i=del'; </script>";
