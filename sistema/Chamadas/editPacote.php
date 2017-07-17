<?php

include_once "../Models/Pacote.php";
include_once "../Entidades/Entity_Pacotes.php";

$paco = new Pacote();
$paco_ent = new Entity_Pacotes();

$paco->setCodPacote($_GET['id']);
$paco->setNomePacote($_POST['nome']);
$paco->setValorPacote($_POST['valor']);

$paco_ent->EditProduto($paco);


echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaPacotes.php?i=ed'; </script>";


?>
