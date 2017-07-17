<?php
include_once 'topo.php';
include_once 'Entidades/Entity_OrigemEntrada.php';
include_once 'Entidades/Entity_EntradaCaixa.php';

$oren_ent = new Entity_OrigemEntrada();
$enca_ent = new Entity_EntradaCaixa();

$lista = $oren_ent->listaTodosOrigens();
$listapaco = $enca_ent->getTodosEntrada();
$listaedit = $enca_ent->getTodosEditEntradaCaixa();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Entrada em caixa cadastrada com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Entrada em caixa deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Entrada em caixa editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletaEntradaCaixa.php?id="+id;
   });}

	</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Entradas do Caixa</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Chamadas/cadastraEntradaCaixa.php" method="post">

	<center>

	<div class="col-md-12 col-sm-6" style= "padding-top:30px;">
	  <p> Valor :
		  <label>
			  <input type="text" name="valor" alt="lista-clientes"  class="form-control input-search" placeholder="Valor da Entrada" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

          <p style="margin-left:-1%;"> Origem :
	 <label style="width:200px;">
		<select name="origem" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		 echo $lista;
		  ?>
		 </select>
	   </label><br><a href="#" data-toggle="modal" data-target="#cadastraorigem"  data-dismiss="modal">cadastre uma origem</a>
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

   <caption>Entradas do Caixa</caption>
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
	 ?></table>
		</div>
	</div>
</div>
    </div>
		<div class="modal fade" id="cadastraorigem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;height:280px;">
											<div class="modal-dialog" role="document">
												<form class="form-signin" role="form" action="./Chamadas/cadastraOrigemEntrada.php" method="post">
													<div class="modal-content" style="height:79%;width:60%; background-color:;">

															<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
																 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>

																	<h4 class="modal-title"><center><font color="pink">Espaço K & R</font></center></h4>
															</div>
															<center>
																			<p><h5>Cadastre uma origem de Entrada de caixa</h5></p>

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
											</div>
									</div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
