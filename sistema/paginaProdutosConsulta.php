<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Fabricante.php';
include_once 'Entidades/Entity_Produto.php';

$fabr_ent = new Entity_Fabricante();
$prod_ent = new Entity_Produto();
$listaprod = $prod_ent->getTodosProdutoRelatorio($_GET['nome'],$_GET['codFabricante'],$_GET['vendade'],$_GET['vendaate'],$_GET['comprade'],$_GET['compraate'],$_GET['quantidadede'],$_GET['quantidadeate'],$_GET['cnome'],$_GET['cquantidade'],$_GET['cvalorcompra'],$_GET['cvalorvenda'],$_GET['cfabricante'],$_GET['copcoes']);
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
function relatorio(id){
      window.location.href = "./relatorio/relCodProdutos.php?id="+id;
   }
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
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Produtos</h3>
</div>
<form class="form-signin" role="form" action="#" method="get">
<div class="" style= "float:right;">
	Deixar de Mostrar Colunas:
	<div class="checkbox"><label><input type="checkbox" name="cnome" value="1" <?php if(isset($_GET['cnome'])){ echo " checked";} ?>>Nome</label></div>
	<div class="checkbox"><label><input type="checkbox" name="cquantidade" value="1" <?php if(isset($_GET['cquantidade'])){ echo " checked";} ?>>Quantidade</label></div>
	<div class="checkbox"><label><input type="checkbox" name="cvalorcompra" value="1" <?php if(isset($_GET['cvalorcompra'])){ echo " checked";} ?>>Valor de Compra</label></div>
	<div class="checkbox"><label><input type="checkbox" name="cvalorvenda" value="1" <?php if(isset($_GET['cvalorvenda'])){ echo " checked";} ?>>Valor de Venda</label></div>
	<div class="checkbox"><label><input type="checkbox" name="cfabricante" value="1" <?php if(isset($_GET['cfabricante'])){ echo " checked";} ?>>Fabricante</label></div>
	<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
</div>
<center>


<p>

Nome :  <label style="margin-left:0%;">
	 <input type="text" name="nome" class="form-control" <?php if(isset($_GET['nome'])){ echo "value=\"".$_GET['nome']."\"";} ?> style="width:100px; margin-left:0%;">
 </label> 
Fabricante :<label style="margin-left:-10%;">
<select name="codFabricante" class="form-control" style="width:100%; margin-left:55%;">
<option value="">Escolha um fabricante</option>
<?php
echo $lista;
?>
</select>
</label>
</p>

<p>
 Valor venda maior que:  <label>
		 <input type="text" name="vendade" class="form-control" <?php if(isset($_GET['vendade'])){ echo "value=\"".$_GET['vendade']."\"";} ?> style="width:100px; margin-left:0%;">
	 </label>&nbsp;&nbsp;
 Valor venda menor que:	<label>
		 <input type="text" name="vendaate" class="form-control"  <?php if(isset($_GET['vendaate'])){ echo "value=\"".$_GET['vendaate']."\"";} ?> style="width:	100px; margin-left:0%;">
	 </label>
 </p>

 <p>
	  Valor compra maior que:  <label>
			 <input type="text" name="comprade" class="form-control" <?php if(isset($_GET['comprade'])){ echo "value=\"".$_GET['comprade']."\"";} ?> style="width:100px; margin-left:5%;">
		 </label>&nbsp;&nbsp;
	 Valor compra menor que:	<label style="margin-left:1%;">
			 <input type="text" name="compraate" class="form-control"  <?php if(isset($_GET['compraate'])){ echo "value=\"".$_GET['compraate']."\"";} ?> style="width:	100px; margin-left:-25%;">
		 </label>
	 </p>

	 <p>
		 Quantidade maior que :  <label>
				 <input type="text" name="quantidadede" class="form-control" <?php if(isset($_GET['quantidadede'])){ echo "value=\"".$_GET['quantidadede']."\"";} ?> style="width:100px; margin-left:0%;">
			 </label>&nbsp;&nbsp;
		 Quantidade menor que :	<label>
				 <input type="text" name="quantidadeate" class="form-control"  <?php if(isset($_GET['quantidadeate'])){ echo "value=\"".$_GET['quantidadeate']."\"";} ?> style="width:	100px; margin-left:0%;">
			 </label>
		 </p>

<button type = "submit" class = "btn btn-info"style="background-color:#DB7093; border-color:#DB7093"><font color="white">Buscar</font></button>
</form>


	<table class="table lista-clientes" width="100%">

	 <?php
 echo $listaprod;
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
