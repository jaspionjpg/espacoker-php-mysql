<?php
include_once 'topo.php';

include_once "Entidades/Entity_SlidePrincipal.php";
include_once 'Entidades/Entity_Servico.php';
include_once 'Entidades/Entity_Pacotes.php';

include_once "Entidades/Entity_Destaques.php";
$paco_ent = new Entity_Pacotes();

$fabr_ent = new Entity_Destaques();
$slid = new Entity_SlidePrincipal();
$serv_ent = new Entity_Servico();
$lista = $serv_ent->listaTodosServicos();
$listapaco = $paco_ent->listaTodosPacotes();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Destaque cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Destaque deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Destaque editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}else if($_GET['i'] == 'max4'){
		echo '<script>swal({   title: "Sucesso!",   text: "O Maximo de cadastrados dessa categoria é apenas 4",   type: "warning",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ca'){
		echo '<script>swal({   title: "Sucesso!",   text: "Esse destaque já foi cadastrado",   type: "warning",   confirmButtonText: "OK!!" });</script>';
}
?>
<script>
function deletarS(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/deletarServicoDestaque.php?id="+id;
   });}

function deletarP(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/deletarPacoteDestaque.php?id="+id;
   });}
	</script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Configurações - Pacotes e Serviços em Destaque</h3>
</div>

<center>
OBS: Lembre-se que irão aparecer no maximo apenas 4 Itens de cada
	<div class="col-md-12 col-sm-6" style= "padding-top:30px;">
	
	</div>
   <div class="col-md-6 col-sm-6 " style= "padding-top:30px;">
   	 <form class="form-signin" role="form"  action="Chamadas/cadastraServicoDestaque.php" method="post">
    	 <p style="margin-left:-3%;">Serviço :
	 <label style="width:200px;">
		<select name="codServico" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		echo $lista;
			?>
		 </select>
	   </label> <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Adicionar</font></button>
	 	</form>
	  </p>


	  <table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Serviço</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
 echo $fabr_ent->getTodosServicos();
	 ?>
	  </table>
	</div>


<div class="col-md-6 col-sm-6 " style= "padding-top:30px;">
   	 <form class="form-signin" role="form"  action="Chamadas/cadastraPacoteDestaque.php" method="post">
    	 <p style="margin-left:-3%;">Pacote :
	 <label style="width:200px;">
		<select name="codPacote" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		echo $listapaco;
			?>
		 </select>
	   </label> <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Adicionar</font></button>
	  </form>	</p>


	  <table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Pacotes</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
echo $fabr_ent->getTodosPacotes();
	 ?>
	  </table>
	</div>

        
                    </form>

</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
