<?php
include_once '../Utils/ConectaBanco.php';
include_once "../Models/Agendamento.php";
include_once "../Entidades/Entity_Agendamento.php";
include_once "../Entidades/Entity_Servico.php";

$agen_ent = new Entity_Agendamento();
$serv_ent = new Entity_Servico();

if(!empty($_POST['servicos1'])){
	$agen_ent->InsertPacote($_POST['dia1'],$_POST['codUsuario'],$_POST['time1'], $serv_ent->getcodPeloNome($_POST['servicos1']) );
}
if(!empty($_POST['servicos2'])){
	$agen_ent->InsertPacote($_POST['dia2'],$_POST['codUsuario'],$_POST['time2'], $serv_ent->getcodPeloNome($_POST['servicos2']) );
}

if(!empty($_POST['servicos3'])){
	$agen_ent->InsertPacote($_POST['dia3'],$_POST['codUsuario'],$_POST['time3'], $serv_ent->getcodPeloNome($_POST['servicos3']) );
}

if(!empty($_POST['servicos4'])){
	$agen_ent->InsertPacote($_POST['dia4'],$_POST['codUsuario'],$_POST['time4'], $serv_ent->getcodPeloNome($_POST['servicos4']) );
}

if(!empty($_POST['servicos5'])){
	$agen_ent->InsertPacote($_POST['dia5'],$_POST['codUsuario'],$_POST['time5'], $serv_ent->getcodPeloNome($_POST['servicos5']) );
}

if(!empty($_POST['servicos6'])){
	$agen_ent->InsertPacote($_POST['dia6'],$_POST['codUsuario'],$_POST['time6'], $serv_ent->getcodPeloNome($_POST['servicos6']) );
}

if(!empty($_POST['servicos7'])){
	$agen_ent->InsertPacote($_POST['dia7'],$_POST['codUsuario'],$_POST['time7'], $serv_ent->getcodPeloNome($_POST['servicos7']) );
}

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaAgendamentos.php?i=sucess'; </script>";


?>
