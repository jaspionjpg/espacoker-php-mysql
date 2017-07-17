<?php
session_start();
include_once '../site/Verificador.php';
include_once 'Entidades/Entity_Usuario.php';
include_once 'Entidades/Entity_Caixa.php';

$user_ent = new Entity_Usuario();
$caixa_ent = new Entity_Caixa();
$hum = $caixa_ent->apresentarvalorcaixa();

 ?>

 <script>
 function sair(){
   window.location.href='http://localhost/batata/site/Logout.php';
 }
 </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Area do Admim</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">


<script src="js/sweetalert.min.js"></script>

</head>

<body>
  <?php if(empty($caixa_ent->apresentarvalorcaixa())){
echo '<script>swal({   title: "Atualize o caixa, digite o valor atual",
  closeOnConfirm: false,   text: "Valor do caixa ainda não foi iniciado hoje",   type: "input",   confirmButtonText: "OK!!" },
function(inputValue){
   if (inputValue === "") {
    swal.showInputError("Você não deu entrada em um valor");
    return false
  }
  window.location.href="http://localhost/batata/sistema/Chamadas/cadastrarEntradaDia.php?valor=" + inputValue;
});</script>';

}?>
  <nav class="navbar navbar-default navbar-fixed-top"  style="background-color: #DB7093;">
  <div class="container" style="background-color: #DB7093;">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>


  </button>
<a class="navbar-brand" style="color:black">Espaço K&R System</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" >
      <ul class="nav navbar-nav">
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#"data-toggle="modal" data-target="#myMoldal"  data-dismiss="modal"style="width:140%; background-color: white;margin-left:-40%;"><?php
                echo "Valor do Caixa: ".$hum;
                ?></a></li>

   <li><a href="#"style="color:black">Bem vindo(a) !! <?php  echo $user_ent->getNome($_SESSION['login']);?></a></li>

   <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="#">Habilitar Agenda Cliente</a></li>
          <li><a href="#">Preciso de Ajuda</a></li>
          <li><a href="#">Mudar Senha</a></li>
          <li><a onclick="sair()">Sair</a></li>
          </ul>
        </li>

   </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="row affix-row" style="background-color:#DB7093 ;">
<div class="col-sm-3 col-md-2 affix-sidebar">
<div class="sidebar-nav">
<div class="navbar navbar-default" role="navigation">
<div class="navbar-header">

  <span class="visible-xs navbar-brand">Sidebar menu</span>
</div>
<div class="navbar-collapse collapse sidebar-navbar-collapse"  style="background-color: #ee88ee;">
  <ul class="nav nav-list" id="sidenav01">
    <li style="height:50px;">

    </li>
    <li>
      <a href="indexSistema.php"><span class="glyphicon glyphicon-user"></span> Home Sistema</a>
    </li>
    <li>
    <a href="#" data-toggle="collapse" data-target="#cadastros" data-parent="#sidenav01" style="background-color:pink; color: black"class="collapsed">
          <span class="glyphicon glyphicon-plus"></span> Cadastros <span class="caret pull-right"></span></a>
          <div class="collapse" id="cadastros" style="height: 0px; background-color:#DB7093;">
            <ul class="nav nav-list">
              <li class="active"><a href="paginaUsuarios.php"><span class="glyphicon glyphicon-user" ></span> Clientes</a></li>
              <li><a href="paginaFuncionarios.php"><span class="glyphicon glyphicon-user"></span> Funcionarios</a></li>
              <li><a href="paginaServicos.php"><span class="glyphicon glyphicon-wrench"></span> Serviços</a></li>
              <li><a href="paginaProdutos.php"><span class="glyphicon glyphicon-paperclip"></span> Produtos</a></li>
              <li><a href="paginaPacotes.php"><span class="glyphicon glyphicon-shopping-cart"></span> Pacotes</a></li>
              <li><a href="paginaAgendamentos.php"><span class="glyphicon glyphicon-calendar"></span> Agendamentos</a></li>
              <li><a href="paginaComanda.php"><span class="glyphicon glyphicon-shopping-cart"></span> Comanda de Serviço</a></li>
              <li><a href="paginaEntradaCaixa.php"><span class="glyphicon glyphicon-floppy-save"></span> Entradas do Caixas </a></li>
              <li><a href="paginaSaidaCaixa.php"><span class="glyphicon glyphicon-floppy-remove"></span> Saidas do Caixas</a></li>
              <li><a href="paginaOrigemSaida.php"><span class="glyphicon glyphicon-credit-card"></span> Origens Saidas</a></li>
              <li><a href="paginaOrigemEntrada.php"><span class="glyphicon glyphicon-credit-card"></span> Origens Entradas</a></li>
              <li><a href="paginaFabricante.php"><span class="glyphicon glyphicon-signal"></span> Fabricantes</a></li>
            </ul>
          </div>
          </li>

          <li>
          <a href="#" data-toggle="collapse" data-target="#consultas" data-parent="#sidenav01" style="background-color: pink; color: black" class="collapsed">
                <span class="glyphicon glyphicon-zoom-in"></span> Consultas <span class="caret pull-right"></span></a>
                <div class="collapse" id="consultas" style="height: 0px; background-color:#DB7093;">
                  <ul class="nav nav-list ">
                    <li class=""><a href="paginaUsuariosConsulta.php"><span class="glyphicon glyphicon-user"></span> Clientes</a></li>
                    <li><a href="paginaFuncionariosConsulta.php"><span class="glyphicon glyphicon-user"></span> Funcionarios</a></li>
                    <li><a href="paginaServicosConsulta.php"><span class="glyphicon glyphicon-wrench"></span> Serviços</a></li>
                    <li><a href="paginaProdutosConsulta.php"><span class="glyphicon glyphicon-paperclip"></span> Produtos</a></li>
                    <li><a href="paginaPacotesConsulta.php"><span class="glyphicon glyphicon-shopping-cart"></span> Pacotes</a></li>
                    <li><a href="paginaAgendamentosConsulta.php"><span class="glyphicon glyphicon-calendar"></span> Agendamentos</a></li>
                    <li><a href="paginaComandaConsulta.php"><span class="glyphicon glyphicon-shopping-cart"></span> Comanda de Serviço</a></li>
                    <li><a href="paginaEntradaCaixaConsulta.php"><span class="glyphicon glyphicon-floppy-save"></span> Entradas do Caixas </a></li>
                    <li><a href="paginaSaidaCaixaConsulta.php"><span class="glyphicon glyphicon-floppy-remove"></span> Saidas do Caixas</a></li>
                    <li><a href="paginaOrigemSaidaConsulta.php"><span class="glyphicon glyphicon-credit-card"></span> Origens Saidas</a></li>
                    <li><a href="paginaOrigemEntradaConsulta.php"><span class="glyphicon glyphicon-credit-card"></span> Origens Entradas</a></li>
                    <li><a href="paginaFabricanteConsulta.php"><span class="glyphicon glyphicon-signal"></span> Fabricantes</a></li>
                  </ul>
                </div>
                </li>

                <li>
                <a href="#" data-toggle="collapse" data-target="#relatorio" data-parent="#sidenav01" style="background-color: pink; color: black" class="collapsed">
                      <span class="glyphicon glyphicon-stats"></span> Relatórios <span class="caret pull-right"></span></a>
                      <div class="collapse" id="relatorio" style="height: 0px; background-color:#DB7093;">
                        <ul class="nav nav-list">
                          <li><a href="paginaRelatorio.php"><span class="glyphicon glyphicon-signal"></span> Relatórios</a></li>
                        </ul>
                      </div>
                      </li>

                      <li>
                      <a href="#" data-toggle="collapse" data-target="#configuracoes" data-parent="#sidenav01" style="background-color:pink; color:black;" class="collapsed">
                            <span class="glyphicon glyphicon-cog"></span> Configurações <span class="caret pull-right"></span></a>
                            <div class="collapse" id="configuracoes" style="height: 0px; background-color:#DB7093;">
                              <ul class="nav nav-list">
                                <li><a href="paginaSliderPrincipal.php"><span class="glyphicon glyphicon-film"></span> Slider Principal</a></li>
                                 <li><a href="paginaPacoteEServico.php"><span class="glyphicon glyphicon-film"></span> Pacotes e Serviços Em Destaque</a></li>
                              </ul>
                            </div>
                            </li>


  </ul>
  </div>
</div>
</div>
</div>

