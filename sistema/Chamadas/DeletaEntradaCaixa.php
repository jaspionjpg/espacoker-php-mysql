<?php

include_once "../Entidades/Entity_EntradaCaixa.php";

$enca_ent = new Entity_EntradaCaixa();

$codEntradaCaixa = $_GET['id'];

$enca_ent->deletaEntrada($codEntradaCaixa);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaEntradaCaixa.php?i=del'; </script>";
