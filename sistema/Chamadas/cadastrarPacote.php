<?php

include_once "../Models/Pacote.php";
include_once "../Entidades/Entity_Pacotes.php";
include_once "../Entidades/Entity_ItensPacote.php";

$paco = new Pacote();
$paco_ent = new Entity_Pacotes();
$itpc_ent = new Entity_ItensPacote();

$paco->setNomePacote($_POST['nome']);
$paco->setValorPacote($_POST['valor']);
$paco->setDataCadastro(date('d/m/y'));

    $paco_ent->Insert($paco);

    $codPacote = $paco_ent->getCod($paco->getNomePacote());

    if(!empty($_POST['servicos1'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos1']);
    }
    if(!empty($_POST['servicos2'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos2']);
    }
    if(!empty($_POST['servicos3'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos3']);
    }
    if(!empty($_POST['servicos4'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos4']);
    }
    if(!empty($_POST['servicos5'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos5']);
    }
    if(!empty($_POST['servicos6'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos6']);
    }
    if(!empty($_POST['servicos7'])){
      $itpc_ent->InsertComum($codPacote,$_POST['servicos7']);
    }

    echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaPacotes.php?i=sucess'; </script>";


?>
