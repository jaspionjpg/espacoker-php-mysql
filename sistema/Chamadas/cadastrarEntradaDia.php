<?php

include_once "../Models/Caixadois.php";
include_once "../Entidades/Entity_EntradaDia.php";

$enca = new Caixadois();
$enca_ent = new Entity_EntradaDia();

$enca->setValorCaixadois($_GET['valor']);
$enca_ent->Insert($enca);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/indexSistema.php?i=sucess'; </script>";


?>