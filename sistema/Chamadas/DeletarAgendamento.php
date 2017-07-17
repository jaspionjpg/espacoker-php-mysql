<?php

include_once "../Entidades/Entity_Agendamento.php";

$agen_ent = new Entity_Agendamento();

$codAgendamento = $_GET['id'];

$agen_ent->DeletarAgendamento($codAgendamento);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaAgendamentos.php?i=del'; </script>";
