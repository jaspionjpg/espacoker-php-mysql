<?php

include_once "../Entidades/Entity_Destaques.php";

$agen_ent = new Entity_Destaques();

$codAgendamento = $_GET['id'];

$agen_ent->deletarP($codAgendamento);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaPacoteEServico.php?i=del'; </script>";
