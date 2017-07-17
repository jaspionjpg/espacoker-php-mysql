<?php

class Entity_Agendamento{

    function __construct(){
    }

    public function Insert(Agendamento $agendamento){
        include_once '../Utils/ConectaBanco.php';

        $sql = mysql_query("INSERT INTO tbagendamento(dataAgendamento, horarioAgendamento, codUsuario, codServico) VALUES ('{$agendamento->getDataAgendamento()}','{$agendamento->getHorarioAgendamento()}','{$agendamento->getCodUsuario()}','{$agendamento->getCodServico()}')") or die( mysql_error() );
        mysql_close();
    }

    public function InsertPacote($data, $codUsuario, $horarioAgendamento, $codServico){
        include '../Utils/ConectaBanco.php';

        $sql = mysql_query("INSERT INTO tbagendamento(dataAgendamento, horarioAgendamento, codUsuario, codServico) VALUES ('{$data}','{$horarioAgendamento}','{$codUsuario}','{$codServico}')") or die( mysql_error() );
     mysql_close();
    }

    public function DeletarAgendamento($codAgendamento){
        include '../Utils/ConectaBanco.php';

        $query = mysql_query("delete from tbagendamento where codAgendamento = '{$codAgendamento}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        mysql_close();
    }

    public function getTodosAgendamentos(){
      include_once '/Utils/ConectaBanco.php';
      $query = mysql_query( "SELECT * FROM tbagendamento inner join tbusuario on tbagendamento.codUsuario = tbusuario.codUsuario inner join tbservico on tbagendamento.codServico = tbservico.codServico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

        $lista = $lista."<tbody><tr>
<td>{$row['dataAgendamento']}</td>
<td>{$row['horarioAgendamento']}</td>
<td>{$row['nomeUsuario']}</td>
<td>{$row['nomeServico']}</td>
<td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codAgendamento'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codAgendamento'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

  public function getTodosAgendamentosIndex(){
      include_once '/Utils/ConectaBanco.php';
      date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
      $query = mysql_query( "SELECT * FROM tbagendamento inner join tbusuario on tbagendamento.codUsuario = tbusuario.codUsuario inner join tbservico on tbagendamento.codServico = tbservico.codServico Where dataAgendamento = '{$date}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

        $lista = $lista."<tbody><tr>
<td>{$row['nomeUsuario']}</td>
<td>{$row['nomeServico']}</td>
<td>{$row['horarioAgendamento']}</td>

</tr></tbody>";


      }
      return $lista;
  }

  public function getTodosAgendamentosConsulta($de,$ate,$datas,$horas,$usuarios,$servicos,$copcoes){
    include_once '/Utils/ConectaBanco.php';
    $pesquisa =  "SELECT * FROM tbagendamento inner join tbusuario on tbagendamento.codUsuario = tbusuario.codUsuario inner join tbservico on tbagendamento.codServico = tbservico.codServico WHERE 1 = 1";
      
      if(!empty($ate)){
        str_replace("-","/",$ate);
        $pesquisa = $pesquisa . " AND dataAgendamento <= ". $ate;
      }
      if(!empty($de)){
        str_replace("-","/",$de);
        $pesquisa = $pesquisa . " AND dataAgendamento >= ". $de;
      }

    $query = mysql_query($pesquisa) or die($pesquisa );
    
  $lista = "<thead><tr>";
  if(empty($datas)){
    $lista = $lista . "<th>Data</th>";
  }
  if(empty($horas)){
    $lista = $lista . "<th>Hora</th>";
  }
  if(empty($usuarios)){
    $lista = $lista . "<th>Usuario</th>";
  }
  if(empty($servicos)){
    $lista = $lista . "<th>Serviço</th>";
  }
    if(empty($copcoes)){
    $lista = $lista . "<th>Opções</th>";
  }
  $lista = $lista . "</tr></thead>";


    if($query != "")
    while($row = mysql_fetch_assoc($query)){
      $lista = $lista."<tbody><tr>";
      if(empty($datas)){
    $lista = $lista . "<td>{$row['dataAgendamento']}</td>";
  }
  if(empty($horas)){
    $lista = $lista . "<td>{$row['horarioAgendamento']}</td>";
  }
  if(empty($usuarios)){
    $lista = $lista . "
<td>{$row['nomeUsuario']}</td>";
  }
  if(empty($servicos)){
    $lista = $lista . "<td>{$row['nomeServico']}</td>";
  }
    if(empty($copcoes)){
  $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codAgendamento'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
    <a onclick = "deletar('.$row['codAgendamento'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
      <a onclick = "relatorio('.$row['codAgendamento'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';

  }
    }
    return $lista;
}

	public function listaTodosAgendamentosDoUsuario($cod){
        include_once '/Utils/ConectaBanco.php';
		include_once '/Entidades/Entity_Servico.php';
        include_once '/Models/Servico.php';

        $serv_ent = new Entity_Servico();

        $lista = "";
        $query = mysql_query( "SELECT * FROM tbagendamento where codUsuario =  '.$cod.'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){

          $serv = $serv_ent->getServico($row['codServico']);

          $lista = $lista.'<li class = "media"><a class = "pull-left" href = "#"><img class = "media-object" src = "'.$serv->getCodImagem().'" width="50px" height="50px"/></a><div class = "media-body"><h4 class = "media-heading">'.$serv->getNomeServico().'</h4>'.$row['dataAgendamento'].' '.$row['horarioAgendamento'].'</div></li>';


        }
        return $lista;
    }

}
