<?php

include_once "../Entidades/Entity_Usuario.php";

$user_ent = new Entity_Usuario();

$codUsuario = $_GET['id'];

$user_ent->deletaUsuario($codUsuario);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaUsuarios.php?i=del'; </script>";
