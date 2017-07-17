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
$tabela =$conta_ent->getTodasComandasRelatorio($_GET['usuario'],$_GET['servicos1'],$_GET['produtos1'],$_GET['dinheirode'],$_GET['dinheiroate'],$_GET['vTotal'],$_GET['resto'],$_GET['servicos'],$_GET['produtos'],$_GET['cliente'],$_GET['copcoes']);

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
 function relatorio(id){
	       window.location.href = "./relatorio/relCodComanda.php?id="+id;
	    }
	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">


                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Comandas</h3>
</div>
    <form class="form-signin" name="geradorDeComanda" role="form" action="#" method="GET">

<div class="" style= "float:right;">
	Deixar de Mostrar Colunas:
	<div class="checkbox"><label><input type="checkbox" name="vTotal" value="1" <?php if(isset($_GET['vTotal'])){ echo " checked";} ?>>Valor Total</label></div>
	<div class="checkbox"><label><input type="checkbox" name="resto" value="1" <?php if(isset($_GET['resto'])){ echo " checked";} ?>>Resto</label></div>
	<div class="checkbox"><label><input type="checkbox" name="servicos" value="1" <?php if(isset($_GET['servicos'])){ echo " checked";} ?>>Serviços</label></div>
	<div class="checkbox"><label><input type="checkbox" name="produtos" value="1" <?php if(isset($_GET['produtos'])){ echo " checked";} ?>>Produtos</label></div>
	<div class="checkbox"><label><input type="checkbox" name="cliente" value="1" <?php if(isset($_GET['cliente'])){ echo " checked";} ?>>Cliente</label></div>
	<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
</div>

 <div class="container">
            <div class="box first">
	<center>

	<p> Cliente :<label>
		  <select name="usuario" class="form-control" required autofocus style="width:200px; margin-left:5%;">
								 <?php
							 echo $listausers;
								 ?>
				 </select> </label>
	  </p>
	  
			  <p> Com o Servico :
		  <label>
           <select name="servicos1" class="form-control" required autofocus style="width:100%; margin-left:0%;">
				 <?php
			 echo $lista;
				 ?>
			 </select></label>
	  Com o Produto :
		  <label>
               <select name="produtos1" class="form-control" required autofocus style="width:100%; margin-left:0%;">
					 <?php
				 echo $listaprod;
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
<button type = "submit" class = "btn btn-info"style="background-color:#DB7093; border-color:#DB7093"><font color="white">Buscar</font></button>
</form>

       

  <div class="container">
            <div class="box">

<table class="table lista-clientes" width="100%">
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
