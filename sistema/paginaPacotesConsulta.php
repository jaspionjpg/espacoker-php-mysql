<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Pacotes.php';
include_once 'Entidades/Entity_Servico.php';
$serv_ent = new Entity_Servico();
$paco_ent = new Entity_Pacotes();
$lista = $serv_ent->listaTodosServicos();
$listapaco = $paco_ent->getTodosProdutoRelatorio($_GET['nome'],$_GET['servicos'],$_GET['comprade'],$_GET['compraate'],$_GET['cnome'],$_GET['cdescricao'],$_GET['cdatacadastro'],$_GET['cvalor'],$_GET['copcoes']);
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
function relatorio(id){
      window.location.href = "./relatorio/relCodPacotes.php?id="+id;
   }
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
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Pacotes</h3>
</div>
<form class="form-signin" role="form" action="#" method="get">
	<div class="" style= "float:right;">
		Deixar de Mostrar Colunas:
		<div class="checkbox"><label><input type="checkbox" name="cnome" value="1" <?php if(isset($_GET['cnome'])){ echo " checked";} ?>>Nome</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cdescricao" value="1" <?php if(isset($_GET['cdescricao'])){ echo " checked";} ?>>Valor</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cdatacadastro" value="1" <?php if(isset($_GET['cdatacadastro'])){ echo " checked";} ?>>Data Cadastro</label></div>
		<div class="checkbox"><label><input type="checkbox" name="cvalor" value="1" <?php if(isset($_GET['cvalor'])){ echo " checked";} ?>>Serviços</label></div>
		<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
	</div>
<center>
<p>
Nome :  <label>
	 <input type="text" name="nome" class="form-control" <?php if(isset($_GET['nome'])){ echo "value=\"".$_GET['nome']."\"";} ?> style="width:100px; margin-left:0%;">
 </label> Serviço :
<label style="width:190px;">
<select name="servicos" class="form-control" style="width:100%; margin-left:0%;">
	<option value="">Escolha um Serviço</option>
<?php
echo $lista;
?>
</select>
</label>
</p>

<p>
	 Valor maior que: <label style="margin-left:-10px;">
			<input type="text" name="comprade" class="form-control" <?php if(isset($_GET['comprade'])){ echo "value=\"".$_GET['comprade']."\"";} ?> style="width:100px; margin-left:10%;">
		</label>&nbsp;&nbsp;
	Valor menor que:	<label style=" margin-left:95px;">
			<input type="text" name="compraate" class="form-control"  <?php if(isset($_GET['compraate'])){ echo "value=\"".$_GET['compraate']."\"";} ?> style="width:	100px; margin-left:-190%;">
			</label>
	</p>


	 <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Buscar</font></button>
	 </form>


<table class="table lista-clientes" width="100%">
   
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
