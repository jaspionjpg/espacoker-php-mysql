<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Servico.php';

$serv_ent = new Entity_Servico();
$lista = $serv_ent->getTodosServicos();
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
	<h3><span class="glyphicon glyphicon-th-list"></span> Serviços</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" enctype="multipart/form-data" action="./imagens/imagensUpload/cadastraServico.php" method="post">

	<center>

	<div class="col-md-6 col-sm-6" style= "padding-top:30px;">
	  <p> Nome :
		  <label>
			  <input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome do Serviço" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

          <p style="margin-left:-5%;"> Descrição :
		  <label>
			  <input type="text" name="descricao" alt="lista-clientes"  class="form-control input-search" placeholder="Descrição do Serviço"
			  required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>



	  <p style="margin-left:-2%;"> Duração :
		  <label style="width:196px;">
			  <input type="time" name="tempo" alt="lista-clientes"  class="form-control input-search" placeholder="Tempo" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	</div>
	<div class="col-md-6 col-sm-6" style= "padding-top:30px;">
	  <p> Valor :
		  <label>
		   <input type="text" name="valor" class="form-control" placeholder="Valor do Serviço" required autofocus
		   style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  <p> Imagem :
		  <label>
			  <input type="file" name="file" class="form-control" required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	</div>
        </div>
		</div>
		<center>
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Cadastrar</font></button>
		 </form>
          <div style="height:30px;">
		  </div>

        <div class="container">
            <div class="box">

   <caption>Serviços</caption>
<table class="table lista-clientes" width="100%">
   <thead>
      <tr>

         <th>Nome</th>
		 <th>Descrição</th>
		 <th>Duração</th>
		 <th>Valor</th>
		 <th>Nome Imagem</th>
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
