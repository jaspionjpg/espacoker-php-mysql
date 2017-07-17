<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Fabricante.php';
include_once 'Entidades/Entity_Produto.php';

$fabr_ent = new Entity_Fabricante();
$prod_ent = new Entity_Produto();
$listaprod = $prod_ent->getTodosProduto();
$lista = $fabr_ent->listaTodosFabricante();
$listaedit = $prod_ent->getTodosEditProduto();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Produto cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Produto deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Produto editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletarProduto.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Produtos</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Chamadas/cadastraProduto.php" method="post">

	<center>

	<div class="col-md-6 col-sm-6" style= "padding-top:30px;">
	  <p> Nome :
		  <label>
			  <input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome do Produto" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  <p style="margin-left:-8%;"> Quantidade :
		  <label>
			  <input type="number" name="quantidade" class="form-control" placeholder="Quantidade Inicial"
			  required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>



          <p style="margin-left:-8%;"> Fabricante :
	 <label style="width:190px;">
		<select name="codFabricante" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		echo $lista;
			?>
		 </select>
	    </label><br><a href="#" data-toggle="modal" style="color:#CD6090;" data-target="#cadastrafabricante"  data-dismiss="modal">cadastre um fabricante</a>
	  </p>
	 
	</div>
	<div class="col-md-6 col-sm-6" style= "padding-top:30px;">
	  <p> Valor Compra :
		  <label>
		   <input type="text" name="valorcompra" class="form-control" placeholder="Valor da Compra" required autofocus
		   style="width:100%; margin-left:0%;">
		 </label>
	  </p>

          <p style="margin-left:2%;"> Valor Venda :
		  <label>
			  <input type="text" name="valorvenda" class="form-control" placeholder="Valor de Venda"
			  required autofocus style="width:100%; margin-left:0%;">
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
   <caption>Produtos</caption>
	<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Nome</th>
		 <th>Quantidade</th>
		 <th>Valor Compra</th>
		 <th>Valor Venda</th>
		 		 <th>Fabricante</th>
		 <th>Opções</th>
		</tr>
   </thead>
	 <?php
 echo $listaprod;
	 ?>
       </table>
		</div>
	</div>
</div>
    </div>

		<div class="modal fade" id="cadastrafabricante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;height:280px;">
											<div class="modal-dialog" role="document">
												<form class="form-signin" role="form" action="./Chamadas/cadastraFabricante.php" method="post">
													<div class="modal-content" style="height:79%;width:60%; background-color:;">

															<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
																 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>

																	<h4 class="modal-title"><center><font color="pink">Espaço K & R</font></center></h4>
															</div>
															<center>
																			<p><h5>Cadastre um Fabricante</h5></p>

																				<p> Nome :
																					<label>
																						<input type="text" name="nome" alt="lista-clientes"  class="form-control input-search" placeholder="Nome Origem Saida" required autofocus
																						style="width:100%; margin-left:0%;">
																					</label>
																				</p>

														<div class="modal-footer"style="background:captiontext;opacity: 0.70; z-index:1000;">
															<center>

																	<button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
																	<input  class="btn btn-primary" type="submit" value="Cadastrar" style="background:pink;color:black;">
																	</center>

															</div>
													</div>
													 </form>
											</div></div>


<?php
echo $listaedit;
include_once 'baixo.php';
?>
