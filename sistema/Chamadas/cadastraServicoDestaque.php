<?php

include_once "../Entidades/Entity_Destaques.php";

$fabr_ent = new Entity_Destaques();
if($fabr_ent->getNServicos() < 4){
	if($fabr_ent->getExistsServicos($_POST['codServico']) == 0){
		$fabr_ent->InsertServico($_POST['codServico']);
		echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=sucess\";</script>";
	} else {
		echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=ca\";</script>";
	} 
} else {
	echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaPacoteEServico.php?i=max4\";</script>";
}
?>
