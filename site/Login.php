<?php
  include_once "../sistema/Models/Usuario.php";
  include_once "../sistema/Entidades/Entity_Usuario.php";

  $user = new Usuario();
  $user_ent = new Entity_Usuario();

  $user->setLogin($_POST['login']);
  $user->setSenha($_POST['senha']);

  if($user_ent->SelectLogin($user)){
        echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/indexSistema.php'; </script>";
  } else {
      header('Location:http://localhost/batata/site/index.php?log=false');
  }


?>
