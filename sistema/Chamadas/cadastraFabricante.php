<?php

include_once "../Models/Fabricante.php";
include_once "../Entidades/Entity_Fabricante.php";

$fabr = new Fabricante();
$fabr_ent = new Entity_Fabricante();

$fabr->setDescFabricante($_POST['nome']);

$fabr_ent->Insert($fabr);
echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaFabricante.php?i=sucess\";</script>";

?>
