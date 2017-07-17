<?php

include_once 'topo.php';
include_once 'Entidades/Entity_Usuario.php';

$user_ent = new Entity_Usuario();
$lista = $user_ent->getTodosUsuarios();
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
function senhaCerta(){
	if( document.querySelector('#senha').value == document.querySelector('#senha2').value){
		document.querySelector('#repita').innerHTML = 	'<p id="repita"> Repita : <label>  <input type="password" name="senha2" id="senha2" class="form-control" value="'+document.querySelector('#senha2').value +'" onblur="senhaCerta()" placeholder="Confirme a Senha"  required autofocus style="width:100%; margin-left:0%;"> </label></p>';
	}else{
		 document.querySelector('#repita').innerHTML = 	'<p id="repita"> Repita : <label>  <input type="password" name="senha2" id="senha2" class="form-control" value="'+document.querySelector('#senha2').value +'" onblur="senhaCerta()" placeholder="Confirme a Senha"  required autofocus style="width:100%; margin-left:0%;">  </label>  </p>Senha Invalida';
		 document.querySelector('#senha2').style.background = "red";
	}
}
     var count = 1;
	function acrescentaTelefone() {
    count++;
    if(count < 5){

      document.querySelector('#telefones').innerHTML +=
			'<div class = "input-group"><input type="text" name="tel'+count+'" id="tel'+count+'" class="form-control " maxlength="15" onkeypress="mascara(this, \'## #####-####\')" id="phone" style="width:100%; margin-left:0%;"></div>';
    }

	}
	</script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

				<div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Clientes </h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Chamadas/cadastrarUsuarioComum.php" method="post">

	<center>

	<div class="col-md-4 col-sm-6" style= "padding-top:30px;">
	  <p> Nome :
		  <label>
			  <input type="text" name="nome" alt="lista-clientes" class="form-control input-search" placeholder="Digite seu Nome" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	  <p> Email :
		  <label>
			  <input type="email" name="email" alt="lista-clientes"  class="form-control input-search" placeholder="Digite seu E-mail"
			  required autofocus style="width:100%; margin-left:0%;">
		  </label>
	  </p>





	</div>
	<div class="col-md-4 col-sm-6" style= "padding-top:30px;">
	
	  <p style="margin-left:-18%;"> Nascimento :
		  <label>
			  <input type="date" name="data" class="form-control"  required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	</div>
	<div class="col-md-4 col-sm-6" style= "padding-top:30px;" >
	<p> Sexo :
	 <label style="width:200px;">
		<select name="sexo" class="form-control" required autofocus style="width:100%; margin-left:0%;">
		  <option value="Masculino">Masculino</option>
		  <option value="Feminino">Feminino</option>
		 </select>
	   </label>
	  </p>
	  	  <div id="telefones" name="telefones" class = "col-md-10 col-sm-6 input-group"  style= "padding-top:30px;margin-left:55px;">Telefones :
            <div class = "input-group">
               <input type="text" name="tel1" id="tel1" class="form-control" maxlength="13" onkeypress="mascara(this, '## #####-####')" id="phone" style="width:100%; margin-left:0%;">
               <span class = "input-group-btn">
                  <button class = "btn btn-default" onclick="acrescentaTelefone()" type = "button">
                     <span class="glyphicon glyphicon-plus"></span>
                  </button>
               </span>
            </div>
         </div>


	</div>

        </div>

		</div>	<center>
		 <button type = "submit" class = "btn btn-info" style="background-color: #DB7093; border-color:#DB7093">Cadastrar</button>
		 </form>

          <div style="height:30px;">
		  </div>

        <div class="container">
            <div class="box">
                <table class = "table">
   <caption>Clientes</caption>
	<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
      <th>Nome</th>
		 <th>Data</th>
		 <th>Email</th>
		 <th>Sexo</th>
		 <th>Telefones</th>
		 <th>Opções</th>
      </tr>
   </thead>
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
