<?php
include_once 'topo.php';
include_once 'Entidades/Entity_OrigemEntrada.php';

$oren_ent = new Entity_OrigemEntrada();
$lista = $oren_ent->getTodosOrigemEntradaRelatorio();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Entrada cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Entrada deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Entrada editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>
<script>
function relatorio(id){
      window.location.href = "./relatorio/relCodOrigemEntradas.php?id="+id;
   }
function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/DeletarOrigemEntrada.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Origem Entradas</h3>
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
	 ?> </table>
		</div>
	</div>
</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
