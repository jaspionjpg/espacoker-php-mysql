<?php

include_once "../Entidades/Entity_Destaques.php";

$fabr_ent = new Entity_Destaques();
if($fabr_ent->getNPacotes() < 4){
	if($fabr_ent->getExistsPacotes($_POST['codPacote']) == 0){
		$fabr_ent->InsertPacote($_POST['codPacote']);
		echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=sucess\";</script>";
	} else {
		echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=ca\";</script>";
	} 
} else {
	echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=max4\";</script>";
}
?>
