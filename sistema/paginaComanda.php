<?php
include_once 'topo.php';


include_once 'Entidades/Entity_Pacotes.php';
include_once 'Entidades/Entity_Servico.php';
include_once 'Entidades/Entity_Produto.php';
include_once 'Entidades/Entity_Usuario.php';
include_once 'Entidades/Entity_Conta.php';
$serv_ent = new Entity_Servico();
$paco_ent = new Entity_Pacotes();
$prod_ent = new Entity_Produto();
$user_ent = new Entity_Usuario();
$conta_ent = new Entity_Conta();
$lista = $serv_ent->listaTodosServicos();
$listaprod = $prod_ent->listaTodosProdutos();
$listapaco = $paco_ent->getTodosPacotes();
$listausers = $user_ent->listaTodosServicos();
$tabela =$conta_ent->getTodasComandas();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pago com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/deleteConta.php?id="+id;
   });}

var countprod = 1;
var countserv = 1;
var total = 0;
		
	function mudaValor(valorqp1){
		total += valorqp1.value;
		document.querySelector('#valor').innerHTML = 'O Valor atual é '+ total;
	}



	function acrescentaServico() {
		countserv+=1;
		if(countserv < 8){
		document.querySelector('#servicoss').innerHTML +=
		'<div class = "input-group"><select name="servicos'+countserv+'" class="form-control" required autofocus style="width:40%; margin-left:0%;">' +
				   '"<?php echo $lista;?>" </select>'+
				   ' <label  style=" width:30%;">'+
				   '<input type="text" name="valorqs'+countserv+'" alt="lista-clientes"  class="form-control input-search" placeholder="Quantidade"  style=" margin-left:0%;"> </label>'+
				   ' <label  style=" width:30%;">'+
				   '<input type="text" name="valords'+countserv+'" alt="lista-clientes"  class="form-control input-search" placeholder="Desconto"  style=" margin-left:0%;"> </label>'+
				   ' </div>';
	}
	}

		function enviar() {
			document.geradorDeComanda.submit; 
		}

	function acrescentaProduto() {
		countprod+=1;
		if(countprod < 8){
		document.querySelector('#produtoss').innerHTML +=
		'<div class = "input-group"><select name="produtos'+countprod+'" class="form-control" required autofocus style="width:40%; margin-left:0%;">' +
				   '"<?php echo $listaprod;?>" </select>'+
				   ' <label  style=" width:30%;">'+
				   '<input type="text" name="valorqp'+countprod+'" alt="lista-clientes"  class="form-control input-search" placeholder="Quantidade"  style=" margin-left:0%;"> </label>'+
				   ' <label  style=" width:30%;">'+
				   '<input type="text" name="valordp'+countprod+'" alt="lista-clientes"  class="form-control input-search" placeholder="Desconto"  style=" margin-left:0%;"> </label>'+
				   ' </div>';
	}
	}
	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">


                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Comandas</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" name="geradorDeComanda" role="form" action="./Chamadas/cadastraComanda.php" method="POST">
	<center>

	<p> Cliente :<label>
		  <select name="usuario" class="form-control" required autofocus style="width:200px; margin-left:5%;">
								 <?php
							 echo $listausers;
								 ?>
				 </select> </label>
	  </p>
	  <p> Descrição :
		  <label>
			  <input type="text" name="descricao" alt="lista-clientes"  class="form-control input-search" placeholder="Descrição da comanda" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	   <p id="valor"> O Valor atual é 
	  </p>
	  
 	<div id="servicoss" class = "col-md-6 col-sm-6"  style= "padding-top:15px;">
			<p>
			  <label>
					Adicione Serviços a Comanda
			  </label>
		  </p>
            <div class = "input-group">
               <select name="servicos1" class="form-control" required autofocus style="width:40%; margin-left:0%;">
								 <?php
							 echo $lista;
								 ?>
				 </select>


		  <label  style=" width:30%;">
			  <input type="text" name="valorqs1" alt="lista-clientes"  class="form-control input-search" placeholder="Quantidade"
			  style=" margin-left:0%;">	
		  </label>

		  <label style=" width:30%;">
			  <input type="text" name="valords1" alt="lista-clientes"  class="form-control input-search" placeholder="Desconto"
			  style=" margin-left:0%;">
		  </label>

		         <span class = "input-group-btn">
                  <button class = "btn btn-default" onclick="acrescentaServico()" type = "button">
                     <span class="glyphicon glyphicon-plus"></span>
                  </button>
               </span>
            </div>
         </div>

         <div id="produtoss" class = "col-md-6 col-sm-6"  style= "padding-top:15px;">
			<p>
			  <label>
					Adicione Produtos a comanda
			  </label>
		  </p>
            <div class = "input-group">
               <select name="produtos1" class="form-control" required autofocus style="width:40%; margin-left:0%;">
								 <?php
							 echo $listaprod;
								 ?>
				 </select>


		  <label  style=" width:30%;">
			  <input type="text" name="valorqp1" alt="lista-clientes"  class="form-control input-search" placeholder="Quantidade" onchange="mudaValor(this)"
			  style=" margin-left:0%;">	
		  </label>

		  <label style=" width:30%;">
			  <input type="text" name="valordp1" alt="lista-clientes"  class="form-control input-search" placeholder="Desconto"
			  style=" margin-left:0%;">
		  </label>

		         <span class = "input-group-btn">
                  <button class = "btn btn-default" onclick="acrescentaProduto()" type = "button">
                     <span class="glyphicon glyphicon-plus"></span>
                  </button>
               </span>
            </div>
         </div>
		

        </div>
		</div>
		<center>
		<br>
                    <button class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093" onclick="enviar()"><font color="white">Gerar Comanda</font></button>
		 </form>


       

  <div class="container">
            <div class="box">

<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Valor Total</th>
		 <th>Resto</th>
		 <th>Serviços</th>
		  <th>Produtos</th>
		  <th>Cliente</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
 echo $tabela;
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
