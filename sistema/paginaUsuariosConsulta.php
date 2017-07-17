<?php

include_once 'topo.php';
include_once 'Entidades/Entity_Usuario.php';

$user_ent = new Entity_Usuario();
$lista = $user_ent->getTodosUsuariosRelatorio($_GET['nome'],$_GET['email'],$_GET['sexo'],$_GET['tel'],$_GET['cnome'],$_GET['cnascimento'],$_GET['cemail'],$_GET['csexo'],$_GET['clogin'],$_GET['ctelefone'],$_GET['copcoes']);
$listac = $user_ent->getTodosEditUsuario();
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Usuario cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Usuario deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'se'){
		echo '<script>swal({   title: "Falha!",   text: "As senhas digitadas não são iguais!",   type: "error",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Usuario editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>
   <script>
	 function relatorio(id){
				 window.location.href = "./relatorio/relCodClientes.php?id="+id;
			}
function deletar(id){
swal({
      title: "Deseja realmente Deletar?",
      type: "warning",
		showCancelButton: true,
      confirmButtonText: 'Deletar'

   }, function(){
      window.location.href = "./Chamadas/DeletarUsuario.php?id="+id;
   });}

function mascara(t, mask){
	if(t.value.length <= 15){
		var i = t.value.length;
		var saida = mask.substring(1,0);
		var texto = mask.substring(i)
		if (texto.substring(0,1) != saida){
			t.value += texto.substring(0,1);
		}
	}
 }

	</script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

				<div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Consultar Clientes </h3>
</div>
        <div class="container">
            <div class="box">
								<form class="form-signin" role="form" action="#" method="get">
								<div class="" style= "float:right;">
									Deixar de Mostrar Colunas:
									<div class="checkbox"><label><input type="checkbox" name="cnome" value="1" <?php if(isset($_GET['cnome'])){ echo " checked";} ?>>Nome</label></div>
									<div class="checkbox"><label><input type="checkbox" name="cnascimento" value="1" <?php if(isset($_GET['cnascimento'])){ echo " checked";} ?>>Nascimento</label></div>
									<div class="checkbox"><label><input type="checkbox" name="cemail" value="1" <?php if(isset($_GET['cemail'])){ echo " checked";} ?>>Email</label></div>
									<div class="checkbox"><label><input type="checkbox" name="csexo" value="1" <?php if(isset($_GET['csexo'])){ echo " checked";} ?>>Sexo</label></div>
									<div class="checkbox"><label><input type="checkbox" name="ctelefone" value="1" <?php if(isset($_GET['ctelefone'])){ echo " checked";} ?>>Telefones</label></div>
									<div class="checkbox"><label><input type="checkbox" name="copcoes" value="1" <?php if(isset($_GET['copcoes'])){ echo " checked";} ?>>Opções</label></div>
								</div>
												<center>
						 <p>
							Nome :  <label>
								 <input type="text" name="nome" class="form-control" <?php if(isset($_GET['nome'])){ echo "value=\"".$_GET['nome']."\"";} ?> style="width:100px; margin-left:0%;">
							 </label> &nbsp;&nbsp;
							Telefone :	<label>
								 <input type="text" name="tel" id="tel1" class="form-control" maxlength="13" onkeypress="mascara(this, '## #####-####')"  <?php if(isset($_GET['tel'])){ echo "value=\"".$_GET['tel']."\"";} ?>   style="width:100%; margin-left:0%;">
							 </label>
							</p>
							<p>
							 Email :  <label style="margin-left:2%;">
									<input type="text" name="email" class="form-control" <?php if(isset($_GET['email'])){ echo "value=\"".$_GET['email']."\"";} ?> style="width:100px; margin-left:-39%;">
								</label> &nbsp;&nbsp;
							 Sexo :	<label style="width:200px; margin-left:0%;">
								<select name="sexo" class="form-control"  style="width:100%; margin-left:2%;">
									<option value="">Escolha o Sexo</option>
								  <option value="Masculino">Masculino</option>
								  <option value="Feminino">Feminino</option>
								 </select>
							   </label>
							 </p>

								<button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093;margin-top:20px;"><font color="white">Buscar</font></button>
							</form>






                <table class = "table">

	<table class="table lista-clientes" width="100%">

   <?php
	echo $lista;
   ?>
   </table>
		</div>

	</div>

</div>

    </div>

<?php
echo $listac;
include_once 'baixo.php';
?>
