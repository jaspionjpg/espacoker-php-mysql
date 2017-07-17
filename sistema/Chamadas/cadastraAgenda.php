<?php

include_once "../Models/Agendamento.php";
include_once "../Entidades/Entity_Agendamento.php";

$agen = new Agendamento();
$agen_ent = new Entity_Agendamento();

$agen->setDataAgendamento($_POST['data']);
$agen->setHorarioAgendamento($_POST['hora']);
$agen->setCodUsuario($_POST['codUsuario']);
$agen->setCodServico($_POST['codServico']);

$agen_ent->Insert($agen);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaAgendamentos.php?i=sucess'; </script>";


?>
