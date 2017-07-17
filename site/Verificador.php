<?php
      if( array_key_exists('logado', $_SESSION)){
        $loginSession = $_SESSION['logado'];

        if (($loginSession == 'true')){
          include_once './Entidades/Entity_Usuario.php';
          $user_ent = new Entity_Usuario();
          if($user_ent->getTipoUsuario($_SESSION['login']) === "admim"){

          }else{
            header('Location: http://localhost/batata/sistema/indexSistema.php');

          }
         } else{
      header('Location: http://localhost/batata/site/index.php');
         }
       } else {
      header('Location: http://localhost/batata/site/index.php');
       }
        ?>
