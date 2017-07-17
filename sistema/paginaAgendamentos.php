<?php
include_once 'topo.php';
include_once 'Entidades/Entity_Servico.php';
include_once 'Entidades/Entity_Usuario.php';
include_once 'Entidades/Entity_Agendamento.php';
include_once 'Entidades/Entity_Pacotes.php';


$serv_ent = new Entity_Servico();
$user_ent = new Entity_Usuario();
$agen_ent = new Entity_Agendamento();
$paco_ent = new Entity_Pacotes();
$lista = $serv_ent->listaTodosServicos();
$listausers = $user_ent->listaTodosServicos();
$listaagens = $agen_ent->getTodosAgendamentos();
$listapaco = $paco_ent->listaTodosPacotes();
$listaPacotes = $paco_ent->listaTodosMetodosPacotes($_GET['i']);
if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Agendamento editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
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
      window.location.href = "./Chamadas/DeletarAgendamento.php?id="+id;
   });}
	function abrePacotex1() {
 var asdf = document.getElementById("codPacote")
 
 window.location.href = "?i="+asdf.options[asdf.selectedIndex].value;
	}
	</script>

	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Agendamentos</h3>
</div>


 <div class="container">
            <div class="box first">


	<center>

	<div class="col-md-6 col-sm-6" style= "padding-top:30px;">
<form class="form-signin" role="form" action="./Chamadas/cadastraAgenda.php" method="post">
		<p>
		  <label>
				Agende Serviços
			</label>
	  </p>

		<p>Data :
		  <label style="width:200px;">
			  <input type="date" name="data" class="form-control" placeholder="Data do agendamento" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  <p>Hora :
		  <label style="width:200px;">
			  <input type="time" name="hora" class="form-control" placeholder="Hora do Agendamento"
			  required autofocus style="width:100%; margin-left:0%;">
		  </label>
		</p>



                <p style="margin-left:-4%;">Usuario :
	 <label style="width:200px;">
		<select name="codUsuario" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		echo $listausers;
			?>
		 </select>
	   </label>
	  </p>

	  <p style="margin-left:-3%;">Serviço :
	 <label style="width:200px;">
		<select name="codServico" class="form-control" required autofocus style="width:100%; margin-left:0%;">
			<?php
		echo $lista;
			?>
		 </select>
	   </label>
	  </p>
		<p>
		  <label>
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Cadastrar</font></button>
	 		 </form></label>
		</p>
</div>
				<div class="col-md-6 col-sm-6 " style= "padding-top:30px;">
					<p>
					  <label>
							Agende Pacotes
						</label>
				  </p>

<form class="form-signin" role="form" action="./Chamadas/cadastrarAgendamentoPacote.php" method="post">

                                  <p> Usuario :
				 <label style="width:200px;">
					<select name="codUsuario" class="form-control" required autofocus style="width:100%; margin-left:0%;">
						<?php
					echo $listausers;
						?>
					 </select>
				   </label>
				  </p>

                                  <p style="margin-left:1%;"> Pacote :
				 <label style="width:200px;">
					<select name="codPacote" id="codPacote" onchange="abrePacotex1()" class="form-control" style="width:100%; margin-left:0%;">
						<option value="">escolha algum pacote</option>
						<?php
					echo $listapaco;
						?>
					 </select>
				   </label>

				  </p>

				  <?php echo $listaPacotes; ?>

</div>

		<p >
			<label>
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Cadastrar</font></button>
			 </form>
		 </label>
		</p>
<center>



        <div class="container">
            <div class="box">

   <caption>Agendamentos</caption>
<table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Data</th>
		 <th>Hora</th>
		 <th>Codigo do Usuario</th>
		 <th>Codigo do Serviço</th>
		 <th>Opções</th>
      </tr>
   </thead>
	 <?php
 echo $listaagens;
	 ?>
	  </table>
		</div>
	</div>
</div>
    </div>
<?php
include_once 'baixo.php';
?>
