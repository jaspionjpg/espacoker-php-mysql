<?php
include_once 'topo.php';
?>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Relatório</h3>
</div>


 <div class="container">
            <div class="box first">
    <form class="form-signin" role="form" action="./Utils/Relatorio.php" method="post">

	<center>

	<div class="col-md-12 col-sm-6" style= "padding-top:30px;">
		<p> Escolha o tipo de relatório :
		 <label style="width:200px;">
			<select name="tipoRelatorio" class="form-control" required autofocus style="width:100%; margin-left:0%;">
				<option value="Usuarios">Usuarios</option>
				<option value="Funcionarios">Funcionarios</option>
				<option value="Pacote">Pacote</option>
				<option value="Produto">Produto</option>
				<option value="Serviço">Serviço</option>
			 	</select>
			 </label>
			</p>

			<p>
			De :  <label>
				  <input type="date" name="de" class="form-control"  required autofocus style="width:100%; margin-left:0%;">
			  </label>&nbsp;&nbsp;
			Até :	<label>
					<input type="date" name="ate" class="form-control"  required autofocus style="width:100%; margin-left:0%;">
				</label>
		  </p>
	</div>

        </div>
		</div>
<center>
                    <button type = "submit" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Gerar Relatorio</font></button>
		 </form>

</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>
