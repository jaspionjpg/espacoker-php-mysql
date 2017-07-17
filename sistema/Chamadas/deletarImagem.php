<?php

include_once "../Entidades/Entity_SlidePrincipal.php";

$enca_ent = new Entity_SlidePrincipal();

$codEntradaCaixa = $_GET['id'];

$enca_ent->deletar($codEntradaCaixa);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaSliderPrincipal.php?i=del'; </script>";
