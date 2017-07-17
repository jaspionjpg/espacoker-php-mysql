<?php

include_once 'topo.php';
include_once 'Entidades/Entity_Conta.php';

$oren_ent = new Entity_Conta();
$lista = $oren_ent->getCustoConta($_GET['idConta']);
$listad = $oren_ent->getCustodConta($_GET['idConta']);
$listaTotal = $listad + $lista;
if($lista<=0){
	echo "<script>  window.location.href = \"http://localhost/batata/sistema/paginaComanda.php\";</script>";
}

if(!empty($_GET['i']))
if($_GET['i'] == 'sucess'){
		echo '<script>swal({   title: "Sucesso!",   text: "Comanda cadastrado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'del'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pagamento deletado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
} else if($_GET['i'] == 'ed'){
		echo '<script>swal({   title: "Sucesso!",   text: "Pagamento editado com sucesso!",   type: "success",   confirmButtonText: "OK!!" });</script>';
}
?>

<script type="text/javascript">
var total = 0;
function darBaixa(){
		var asdf = document.getElementById("forma");
if(asdf.selectedIndex == 1){  total  = document.querySelector('#valorRecebido').value - document.querySelector('#valorAPagar').value;
		if(total < 0) {
			swal({   title: "Valor pago não é o suficiente!",   text: "Caso não tenho o valor inteiro troque a forma de pagamento para fiado!",   type: "warning",   confirmButtonText: "OK!!" });

		} else {
			
    window.location.href = "./Chamadas/darBaixa.php?id="+<?php echo $_GET['idConta']; ?>+"&valor="+document.querySelector('#valorRecebido').value+"&valortotal="+document.querySelector('#valor').value;
   	
		}


   } else if(asdf.selectedIndex == 2){
       window.location.href = "./Chamadas/darBaixa.php?id="+<?php echo $_GET['idConta']; ?>+"&valor="+document.querySelector('#valorRecebido').value+"&valortotal="+document.querySelector('#valorAPagar').value+"&dataApagar="+document.querySelector('#dataApagar').value;
   }}
	function mudaValor(){
		total  = document.querySelector('#valorRecebido').value - document.querySelector('#valorAPagar').value;
		if(total < 0) {
			document.querySelector('#valorMostra').innerHTML = 'Esta faltando '+ (total*-1) + ' Reais';
		} else if(total > 0) {
			document.querySelector('#valorMostra').innerHTML = 'O Troco é de '+ total;
		} else {
			document.querySelector('#valorMostra').innerHTML = 'Não ha Troco ';
		}
	}
		function abreForma() {
 	var asdf = document.getElementById("forma");
if(asdf.selectedIndex == 1){  var div = document.getElementById("divResultado");
    div.innerHTML = "<p> Valor Recebido: <label><input type='text' name='valorRecebido' id='valorRecebido' class='form-control input-search' onchange='mudaValor()' style='width:100%; margin-left:0%;'>  </label></p>";
} else if(asdf.selectedIndex == 2){
	var div = document.getElementById("divResultado");
  div.innerHTML = "<p> Valor Recebido: <label><input type='text' name='valorRecebido' id='valorRecebido' class='form-control input-search' onchange='mudaValor()' style='width:100%; margin-left:0%;'>  </label> <label>Data a pagar o resto<input type='date' name='dataApagar' id='dataApagar' class='form-control input-search' style='width:100%; margin-left:0%;'>  </label></p>";

}
		}
</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Pagamento da comanda</h3>
</div>


 <div class="container">
            <div class="box first">
	<center>
	<div class="col-md-12 col-sm-6" style= "padding-top:10px;">

 
	  <p> Valor Total:
		  <label>
			  <input type="text" name="valor" alt="lista-clientes" id="valor"  value=<?php echo '\''.$listaTotal.'\''; ?> class="form-control input-search" placeholder="Valor a pagar" onchange="mudaValor()" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	   <p> Valor do desconto:
		  <label>
			  <input type="text" name="valor" alt="lista-clientes" id="valorDesconto"  value=<?php echo '\''.$listad.'\''; ?> class="form-control input-search" placeholder="Valor a pagar" onchange="mudaValor()" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>
	   <p> Valor a pagar:
		  <label>
			  <input type="text" name="valor" alt="lista-clientes" id="valorAPagar"  value=<?php echo '\''.$lista.'\''; ?> class="form-control input-search" placeholder="Valor a pagar" onchange="mudaValor()" required autofocus
			  style="width:100%; margin-left:0%;">
		  </label>
	  </p>

	  	<p> Forma de pagamento:
		  <label>
 		<select name="forma" id="forma" onchange="abreForma()" class="form-control" required autofocus style="width:100%; margin-left:0%;">
 								<option value="">Escolha uma forma de pagamento</option>
								 <option value="vista">A Vista</option>
								 <option value="fiado">Fiado</option>
				 </select>
 		</label>
	  </p>

	 

	  <div id="divResultado">
    </div>
 <p id="valorMostra">
	  </p>

	</div>

        </div>
		</div>
		<center><a href="paginaComanda.php" style="color:blue">Pagar Mais Tarde</a>
			<br>
                    <button onclick="darBaixa()" class = "btn btn-info"style="background-color: #DB7093; border-color:#DB7093"><font color="white">Dar Baixa</font></button>
		 	<br>
		 </form>
   
</div>
    </div>
		
<?php
include_once 'baixo.php';
?>
