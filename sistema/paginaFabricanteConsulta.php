<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Fabricante.php';

$fabr_ent = new Entity_Fabricante();
$lista = $fabr_ent->getTodosFabricanteRelatorio();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Fabricante cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Fabricante deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Fabricante editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>
<script>
function relatorio(id){
      window.location.href = "./relatorio/relCodFabricantes.php?id="+id;
   }
function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/DeletarFabricante.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#ee82ee;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Fabricantes</h3>
</div>
<center>
<p> Nome :
	<label>
		<input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome Origem Saida" required autofocus
		style="width:100%; margin-left:0%;">
	</label>
</p>
	<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Nome</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
	echo $lista;
	 ?></table>
		</div>
	</div>
</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
