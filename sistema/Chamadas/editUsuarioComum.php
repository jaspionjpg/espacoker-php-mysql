<?php

include_once "../Models/Usuario.php";
include_once "../Entidades/Entity_Usuario.php";
include_once "../Entidades/Entity_Telefone.php";

$user = new Usuario();
$user_ent = new Entity_Usuario();
$tele_ent = new Entity_Telefone();

$user->setCodUsuario($_GET['id']);
$user->setNomeUsuario($_POST['nome']);
$user->setEmailUsuario($_POST['email']);
$user->setSexoUsuario($_POST['sexo']);
$user->setLogin($_POST['login']);
$user->setDataNascimentoUsuario($_POST['data']);

$user_ent->EditUsuario($user);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaUsuarios.php?i=ed'; </script>";

?>
