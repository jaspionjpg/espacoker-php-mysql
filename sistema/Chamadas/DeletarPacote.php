<?php

include_once "../Entidades/Entity_Pacotes.php";
include_once "../Entidades/Entity_ItensPacote.php";

$paco_ent = new Entity_Pacotes();
$itpa_ent = new Entity_ItensPacote();

$codPacote = $_GET['id'];
$itpa_ent->deletaItensPacote($codPacote);
$paco_ent->deletaPacote($codPacote);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaPacotes.php?i=del'; </script>";
