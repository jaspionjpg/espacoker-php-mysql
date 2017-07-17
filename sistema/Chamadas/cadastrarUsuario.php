<?php

include_once "../Models/Usuario.php";
include_once "../Entidades/Entity_Usuario.php";
include_once "../Entidades/Entity_Telefone.php";

$user = new Usuario();
$user_ent = new Entity_Usuario();
$tele_ent = new Entity_Telefone();

$user->setNomeUsuario($_POST['nome']);
$user->setEmailUsuario($_POST['email']);
$user->setSexoUsuario($_POST['sexo']);
$user->setLogin($_POST['login']);
$user->setDataNascimentoUsuario($_POST['data']);
$user->setCpfUsuario($_POST['cpf']);
$user->setSalarioFuncionario($_POST['salario']);
$user->setTipoUsuario('admim');

$s1 = $_POST['senha'];
$s2 = $_POST['senha2'];

if($s1==$s2){
    $user->setSenha($s1);
    $user_ent->InsertFunc($user);

    $codUsuario = $user_ent->getCodOutras($user->getLogin());

    if(!empty($_POST['tel1'])){
      $tele_ent->InsertComum($codUsuario,$_POST['tel1']);
    }
    if(!empty($_POST['tel2'])){
      $tele_ent->InsertComum($codUsuario,$_POST['tel2']);
    }
    if(!empty($_POST['tel3'])){
      $tele_ent->InsertComum($codUsuario,$_POST['tel3']);
    }
    if(!empty($_POST['tel4'])){
      $tele_ent->InsertComum($codUsuario,$_POST['tel4']);
    }

    echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaFuncionarios.php?i=sucess'; </script>";


}else {
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaFuncionarios.php?i=se'; </script>";

}

?>
