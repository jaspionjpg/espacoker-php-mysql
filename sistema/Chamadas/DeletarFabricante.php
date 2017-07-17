<?php

include_once "../Entidades/Entity_Fabricante.php";

$fabr_ent = new Entity_Fabricante();

$codFabricante = $_GET['id'];

$fabr_ent->deletaFabricante($codFabricante);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaFabricante.php?i=del'; </script>";
