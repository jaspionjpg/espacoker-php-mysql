<?php
include_once 'topo.php';
include_once 'Entidades/Entity_OrigemSaida.php';

$orsa_ent = new Entity_OrigemSaida();
$lista = $orsa_ent->getTodosOrigemSaida();
$listaedit = $orsa_ent->getTodosEditOrigem();

if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Saida cadastrada com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Saida deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Origem de Saida editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletarOrigemSaida.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Origem Saidas</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Chamadas/cadastraOrigemEntrada.php" method="post">

	<center>

	<div class="col-md-12 col-sm-6" style= "padding-top:30px;margin-left:-30px;">
	  <p> Nome :
		  <label>
			  <input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome Origem Saida" required autofocus
			  style="width:100%; margin-left:0%;">
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
		<caption >Origem Saidas</caption>
		
        <div class="container">
            <div class="box">

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
