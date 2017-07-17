<?php

include_once "../Entidades/Entity_SaidaCaixa.php";

$ensa_ent = new Entity_SaidaCaixa();

$codSaidaCaixa = $_GET['id'];

$ensa_ent->deletaSaida($codSaidaCaixa);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSaidaCaixa.php?i=del'; </script>";
