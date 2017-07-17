<?php
include_once 'topo.php';

include_once 'Entidades/Entity_Parcela.php';
$parc_ent = new Entity_Parcela();
include_once 'Entidades/Entity_Agendamento.php';
$serv_ent = new Entity_Agendamento();
$lista = $serv_ent->getTodosAgendamentosIndex();
?>

<script>
$().ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
	<div class="col-sm-9 col-md-10 affix-content">
		<div class="container">

                    <div class="page-header" style="border-color:#DB7093;"><div style="height:50px;"></div>
	<h3><span class="glyphicon glyphicon-th-list"></span> Home 
        
  </h3>
</div>

<center>
   <div class="col-md-6 col-sm-6 " >
   	 	<p><h3>Agenda do dia</h3></p>

	  <table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Pessoa</th>
         <th>Serviço</th>
         <th>Hora</th>
      </tr>
   </thead>
	 <?php
 echo $lista;
	 ?>
	  </table>
	</div>


<div class="col-md-6 col-sm-6 " >
    	 <p ><h3>Devedores</h3> 
	</p>


	  <table class="table lista-clientes" width="100%">
   <thead>
      <tr>
         <th>Pessoa</th>
         <th>Valor</th>
         <th>Data</th>
      </tr>
   </thead>
	 <?php
echo $parc_ent->getTodasParcelasIgual();
echo $parc_ent->getTodasParcelasMenor();
echo $parc_ent->getTodasParcelasMaior();

	 ?>
	  </table>
	</div>

        
                    </form>

</div>
    </div>
<?php
echo $listaedit;
include_once 'baixo.php';
?>