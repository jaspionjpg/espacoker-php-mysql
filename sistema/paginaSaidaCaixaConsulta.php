<?php
include_once 'topo.php';
include_once 'Entidades/Entity_SaidaCaixa.php';
include_once 'Entidades/Entity_OrigemSaida.php';

$oren_ent = new Entity_OrigemSaida();
$enca_ent = new Entity_SaidaCaixa();

$lista = $oren_ent->listaTodosOrigens();
$listapaco = $enca_ent->getTodosSaidaRelatorio($_GET['origem'],$_GET['dinheirode'],$_GET['dinheiroate'],$_GET['de'],$_GET['ate']);
$listaedit = $enca_ent->getTodosEditSaidaCaixa();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Saida de caixa cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Saida de caixa deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Saida de caixa editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletaSaidaCaixa.php?id="+id;
   });}
	 function relatorio(id){
	       window.location.href = "./relatorio/relCodSaidaCaixa.php?id="+id;
	    }
	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Saidas do Caixa</h3>
</div>


        <div class="container">
            <div class="box">
							<center>
							<form class="form-signin" role="form" action="#" method="get">
						 <label style="width:200px;">
						 <select name="origem" class="form-control" style="width:100%; margin-left:10%;">
						 	<option value="">Sem seleção</option>
						 	<?php
						  echo $lista;
						 	?>
						  </select>
						  </label>
						 </p>

						 <p>
						  Maior que :  <label>
						 		 <input type="text" name="dinheirode" class="form-control" <?php if(isset($_GET['dinheirode'])){ echo "value=\"".$_GET['dinheirode']."\"";} ?> style="width:100px; margin-left:0%;">
						 	 </label>&nbsp;&nbsp;
						  Menor que :	<label>
						 		 <input type="text" name="dinheiroate" class="form-control"  <?php if(isset($_GET['dinheiroate'])){ echo "value=\"".$_GET['dinheiroate']."\"";} ?> style="width:	100px; margin-left:0%;">
						 	 </label>
						  </p>

						 <p>
						  De :  <label>
						 		 <input type="date" name="de" class="form-control" <?php if(isset($_GET['de'])){ echo "value=\"".$_GET['de']."\"";} ?>  style="width:100%; margin-left:0%;">
						 	 </label>&nbsp;&nbsp;
						  Até :	<label>
						 		 <input type="date" name="ate" class="form-control"  <?php if(isset($_GET['ate'])){ echo "value=\"".$_GET['ate']."\"";} ?>   style="width:100%; margin-left:0%;">
						 	 </label>
						  </p>

						  <button type = "submit" class = "btn btn-info"style="background-color:#DB7093; border-color:#DB7093; margin-left:3%;"><font color="white">Buscar</font></button>
						  </form>
	<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Valor</th>
		 <th>Data</th>
		 <th>Origem</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
	echo $listapaco;
	 ?>
       </table>
		</div>
	</div>
</div>
    </div>

<?php
echo $listaedit;
include_once 'baixo.php';
?>
