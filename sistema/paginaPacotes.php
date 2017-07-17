<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Pacotes.php';
include_once 'Entidades/Entity_Servico.php';

$serv_ent = new Entity_Servico();
$paco_ent = new Entity_Pacotes();
$lista = $serv_ent->listaTodosServicos();
$listapaco = $paco_ent->getTodosPacotes();
$listaedit = $paco_ent->getTodosEditPacote();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pacote cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pacote deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pacote editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletarPacote.php?id="+id;
   });}
var count = 1;
	function acrescentaServico() {
		count+=1;
		if(count < 8){
		document.querySelector('#servicoss').innerHTML +=
		'<div class = "input-group"><select name="servicos'+count+'" class="form-control" required autofocus style="width:100%; margin-left:0%;">' +
				  '+"<?php echo $lista;?>"+ </select>'+
                   ' </div>'
	}
	}
	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Pacotes</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Chamadas/cadastrarPacote.php" method="post">

	<center>

	<div class="col-md-6 col-sm-6" style= "padding-top:20px;">
	  <p> Nome :
		  <label>
			  <input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome do Pacote" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  <p style="margin-left:-6%;"> Valor Total :
		  <label>
			  <input type="text" name="valor" alt="lista-clientes"  class="form-control input-search" placeholder="Valor"
			  required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	</div>

		<div id="servicoss" class = "col-md-3 col-sm-6"  style= "padding-top:15px;">
			<p>
			  <label>
					Coloque Seus Serviços no Pacote!!
			  </label>
		  </p>
            <div class = "input-group">
               <select name="servicos1" class="form-control" required autofocus style="width:100%; margin-left:0%;">
								 <?php
							 echo $lista;
								 ?>
				 </select>
               <span class = "input-group-btn">
                  <button class = "btn btn-default" onclick="acrescentaServico()" type = "button">
                     <span class="glyphicon glyphicon-plus"></span>
                  </button>
               </span>

            </div>
         </div>

        </div>
		</div>
		<center>
		<br>
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Cadastrar</font></button>
		 </form>

		 <div style="padding-top:10px;">
		 <br>
<br>		 

		 <caption>Pacotes</caption>
		  </div>

        <div class="container">
            <div class="box">
   
<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Nome</th>
		 <th>Valor</th>
		 <th>Data Cadastro</th>
		 <th>Serviços</th>
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
