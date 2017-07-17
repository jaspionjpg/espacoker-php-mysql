<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Servico.php';

$serv_ent = new Entity_Servico();
$lista = $serv_ent->getTodosServicosRelatorio($_GET['nome'],$_GET['tempo'],$_GET['valor'],$_GET['cnome'],$_GET['cdescricao'],$_GET['cduracao'],$_GET['cvalor'],$_GET['cnomeimagem'],$_GET['copcoes']);
$listaedit = $serv_ent->getTodosEditProduto();

if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Serviço cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Serviço deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Serviço editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>
<script>
function relatorio(id){
			window.location.href = "./relatorio/relCodServicos.php?id="+id;
	 }
function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/DeletarServico.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Serviços</h3>
</div>
<form class="form-signin" role="form" action="#" method="get">
	<div class="" style= "float:right;">
		Deixar de Mostrar Colunas:
		<div class="checkbox"><label><input type="checkbox" name="cnome" value="1" <?php if(isset($_GET['cnome'])){ echo " checked";} ?>>Nome</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cdescricao" value="1" <?php if(isset($_GET['cdescricao'])){ echo " checked";} ?>>Descrição</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cduracao" value="1" <?php if(isset($_GET['cduracao'])){ echo " checked";} ?>>Duração</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cvalor" value="1" <?php if(isset($_GET['cvalor'])){ echo " checked";} ?>>Valor</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cnomeimagem" value="1" <?php if(isset($_GET['cnomeimagem'])){ echo " checked";} ?>>Nome Imagem</label></div>
		<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
	</div>
<center>
<p>
Nome :  <label style="margin-left:2%;">
	 <input type="text" name="nome" class="form-control" <?php if(isset($_GET['nome'])){ echo "value=\"".$_GET['nome']."\"";} ?> style="width:150px; margin-left:-25%;">
 </label>
</p>
<p>
Duração :  <label>
	<input type="time" name="tempo"   <?php if(isset($_GET['tempo'])){ echo "value=\"".$_GET['tempo']."\"";} ?> class="form-control input-search" placeholder="Tempo" style="width:100%; margin-left:0%;">
 </label> &nbsp;&nbsp;
Valor :	<label style="margin-left:-4%;">
	 <input type="text" name="valor" class="form-control"   <?php if(isset($_GET['valor'])){ echo "value=\"".$_GET['valor']."\"";} ?>   style="margin-left:20%;">
 </label>
</p>

<button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093;margin-top:10px;"><font color="white">Buscar</font></button>
</form>


<table class="table lista-clientes" width="100%">
	 <?php
 echo $lista;
	 ?> </table>
		</div>
	</div>
</div>
    </div>


<?php
echo $listaedit;
include_once 'baixo.php';
?>
