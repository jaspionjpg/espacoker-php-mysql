<?php

include_once "../Models/Fabricante.php";
include_once "../Entidades/Entity_Fabricante.php";

$fabr = new Fabricante();
$fabr_ent = new Entity_Fabricante();

$fabr->setCodFabricante($_GET['id']);
$fabr->setDescFabricante($_POST['nome']);

$fabr_ent->EditFabricante($fabr);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaFabricante.php?i=ed'; </script>";


?>
