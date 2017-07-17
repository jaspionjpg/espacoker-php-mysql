<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Servico.php';
include_once 'Entidades/Entity_Usuario.php';
include_once 'Entidades/Entity_Agendamento.php';
include_once 'Entidades/Entity_Pacotes.php';


$serv_ent = new Entity_Servico();
$user_ent = new Entity_Usuario();
$agen_ent = new Entity_Agendamento();
$paco_ent = new Entity_Pacotes();
$lista = $serv_ent->listaTodosServicos();
$listausers = $user_ent->listaTodosServicos();
$listaagens = $agen_ent->getTodosAgendamentosConsulta($_GET['de'],$_GET['ate'],$_GET['datas'],$_GET['horas'],$_GET['usuarios'],$_GET['servicos'],$_GET['copcoes']);
$listapaco = $paco_ent->listaTodosPacotes();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>
<script>
function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/DeletarAgendamento.php?id="+id;
   });}
	 function relatorio(id){
	       window.location.href = "./relatorio/relCodAgendamento.php?id="+id;
	    }
	</script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Agendamentos</h3>
</div>


<form class="form-signin" role="form" action="#" method="get">
<div class="" style= "float:right;">
	Deixar de Mostrar Colunas:
	<div class="checkbox"><label><input type="checkbox" name="datas" value="1" <?php if(isset($_GET['datas'])){ echo " checked";} ?>>Data</label></div>
	<div class="checkbox"><label><input type="checkbox" name="horas" value="1" <?php if(isset($_GET['horas'])){ echo " checked";} ?>>Hora</label></div>
	<div class="checkbox"><label><input type="checkbox" name="usuarios" value="1" <?php if(isset($_GET['usuarios'])){ echo " checked";} ?>>Usuario</label></div>
	<div class="checkbox"><label><input type="checkbox" name="servicos" value="1" <?php if(isset($_GET['servicos'])){ echo " checked";} ?>>Serviços</label></div>
	<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
</div>

<center>


	<p> Nome Usuario:
		<label>
			<input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" value="" placeholder="Nome Origem Saida"  style="width:100%; margin-left:0%;">
		</label>
	</p>

<p>
De :  <label>
		<input type="date" name="de" class="form-control"  style="width:100%; margin-left:0%;">
	</label>&nbsp;&nbsp;
Até :	<label>
		<input type="date" name="ate" class="form-control"   style="width:100%; margin-left:0%;">
	</label>
</p>

<button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Buscar</font></button>
		 </form>

<table class="table lista-clientes" width="100%">

	 <?php
 echo $listaagens;
	 ?>
	  </table>
		</div>
	</div>
</div>
    </div>
<?php
include_once 'baixo.php';
?>
