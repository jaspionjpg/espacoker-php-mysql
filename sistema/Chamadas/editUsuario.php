<?php

include_once "../Models/Usuario.php";
include_once "../Entidades/Entity_Usuario.php";

$user = new Usuario();
$user_ent = new Entity_Usuario();

$user->setCodUsuario($_GET['id']);
$user->setNomeUsuario($_POST['nome']);
$user->setEmailUsuario($_POST['email']);
$user->setSexoUsuario($_POST['sexo']);
$user->setLogin($_POST['login']);
$user->setDataNascimentoUsuario($_POST['data']);
$user->setCpfUsuario($_POST['cpf']);
$user->setSalarioFuncionario($_POST['salario']);
$user->setTipoUsuario('admim');

$user_ent->EditFunc($user);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaFuncionarios.php?i=ed'; </script>";


?>
