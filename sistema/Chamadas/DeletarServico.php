<?php

include_once "../Entidades/Entity_Servico.php";

$serv_ent = new Entity_Servico();

$codServico = $_GET['id'];

$serv_ent->deletaServico($codServico);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaServicos.php?i=del'; </script>";
