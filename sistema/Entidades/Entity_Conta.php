<?php

class Entity_Conta{ 

    function __construct(){

    }

     public function getTodasComandas(){
      include_once '/Utils/ConectaBanco.php';
      include_once 'Entity_Parcela.php';
   include_once 'Entity_ItensComanda.php';
    $itpc_ent = new Entity_ItensComanda();

    $parc_ent = new Entity_Parcela();
      $query = mysql_query( "SELECT * FROM tbconta inner join tbusuario on tbusuario.codUsuario = tbconta.codUsuario") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){
         $row['valorTotal'] = $row['valorTotal'] + $row['desconto'];
        $lista = $lista."<tbody><tr>
<td>{$row['valorTotal']}</td>";
if($row['restaPagar'] > 0 )
{
if($parc_ent->existeParcela($row['codConta'])){
   $lista = $lista."<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['restaPagar']} {$parc_ent->getDataParcela($row['codConta'])}</a></td>";

} else {
   $lista = $lista."<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['restaPagar']}</a></td>";

}

} else {
   $lista = $lista."<td>Quitado</td>";
}
 $lista = $lista."<td>{$itpc_ent->getItensPeloComandaServico($row['codComandaServico'])}</td>
<td>{$itpc_ent->getItensPeloComandaProdutos($row['codComandaVenda'])}</td>
<td>{$row['nomeUsuario']}</td>
<td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codConta'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codConta'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

     public function getTodasComandasRelatorio($usuario,$servicos1,$produtos1,$dinheirode,$dinheiroate,$vTotal,$resto,$servicos,$produtos,$cliente,$copcoes){
      include_once '/Utils/ConectaBanco.php';
      include_once 'Entity_Parcela.php';
   include_once 'Entity_ItensComanda.php';
    $itpc_ent = new Entity_ItensComanda();
    $parc_ent = new Entity_Parcela();

  $pesquisa = "SELECT * FROM tbconta inner join tbusuario on tbusuario.codUsuario = tbconta.codUsuario 
                                      inner join tbcomandaservico on tbcomandaservico.codComandaServico = tbconta.codComandaServico
                                      inner join tbcomandavenda on tbcomandavenda.codComandaVenda = tbconta.codComandaVenda where 1 = 1 ";

      if(!empty($usuario)){
        $pesquisa = $pesquisa . " AND tbusuario.codUsuario = ".$usuario;
      }
      if(!empty($servicos1)){
        $pesquisa = $pesquisa . " AND tbconta.codComandaServico in (Select codComandaServico from tbitenscomandaservico where codServico = ". $servicos1 .")";
      }
      if(!empty($produtos1)){
        $pesquisa = $pesquisa . " AND tbconta.codComandaVenda in (Select codComandaVenda from tbitenscomandavenda where codProduto = ". $produtos1 .")";
      }
      if(!empty($dinheiroate)){
        $pesquisa = $pesquisa . " AND valorTotal <= ". $dinheiroate;
      }
      if(!empty($dinheirode)){
        $pesquisa = $pesquisa . " AND valorTotal >= ". $dinheirode;
      }

      $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";

  $lista = "<thead><tr>";
  if(empty($vTotal)){
    $lista = $lista . "<th>Valor Total</th>";
  }
  if(empty($resto)){
    $lista = $lista . "<th>Resto</th>";
  }
  if(empty($servicos)){
    $lista = $lista . "<th>Serviços</th>";
  }
  if(empty($produtos)){
    $lista = $lista . "<th>Produtos</th>";
  }
    if(empty($cliente)){
    $lista = $lista . "<th>Cliente</th>";
  }
  if(empty($copcoes)){
    $lista = $lista . "<th>Opções</th>";
  }
  $lista = $lista . "</tr></thead>";


      if($query != "")
      while($row = mysql_fetch_assoc($query)){
 $row['valorTotal'] = $row['valorTotal'] + $row['desconto'];
  $lista = $lista."<tbody><tr>";
  if(empty($vTotal)){
    $lista = $lista . "<td>{$row['valorTotal']}</td>";
  }
  if(empty($resto)){
    if($row['restaPagar'] > 0 )
{
if($parc_ent->existeParcela($row['codConta'])){
   $lista = $lista."<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['restaPagar']} {$parc_ent->getDataParcela($row['codConta'])}</a></td>";

} else {
   $lista = $lista."<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['restaPagar']}</a></td>";

}
 
} else {
   $lista = $lista."<td>Quitado</td>";
}}       
       
 if(empty($servicos)){
    $lista = $lista . "<td>{$itpc_ent->getItensPeloComandaServico($row['codComandaServico'])}</td>";
  }
  if(empty($produtos)){
    $lista = $lista . "<td>{$itpc_ent->getItensPeloComandaProdutos($row['codComandaVenda'])}</td>";
  }
    if(empty($cliente)){
    $lista = $lista . "<td>{$row['nomeUsuario']}</td>";
  }
  if(empty($copcoes)){
  $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codConta'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codConta'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
       <a onclick = "relatorio('.$row['codConta'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';
 }
 
      }
      return $lista;
  }
    public function InsertConta($valorTotal,$valorDesconto,$codUsuario,$desconto,$codFuncionario,$codComandaServico,$codComandaVenda){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbconta(dataConta, desconto, valorTotal,codUsuario,Status,codFuncionario,codComandaServico,codComandaVenda,restaPagar) VALUES (NOW(),'{$valorDesconto}','{$valorTotal}','{$codUsuario}', 'A Pagar','{$codFuncionario}','{$codComandaServico}','{$codComandaVenda}','{$valorTotal}')") or die( mysql_error() );
      
        mysql_close();
    }

    public function deletar($codConta){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("delete FROM tbconta  where codConta = '{$codConta}'") or die( mysql_error() );
      
        mysql_close();
    }

    public function darBaixa($id, $valor, $valorTotal){
        include '../Utils/ConectaBanco.php';
        include_once 'Entity_Parcela.php';
        $asdf = new Entity_Parcela();
          $agen = "";
          $query = mysql_query( "UPDATE tbconta SET restaPagar = restaPagar - '{$valor}' WHERE codConta = '{$id}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          
          if($valorTotal  - $valor < 0){
            $sql = mysql_query("INSERT INTO tbentradacaixa(valorEntradaCaixa,dataEntradaCaixa,codOrigemEntradaCaixa) VALUES ('{$valorTotal}',NOW(),'2')") or die( mysql_error() );
            
          } else {
            $sql = mysql_query("INSERT INTO tbentradacaixa(valorEntradaCaixa,dataEntradaCaixa,codOrigemEntradaCaixa) VALUES ('{$valor}',NOW(),'2')") or die( mysql_error() );
          }
          if($asdf->existeParcelaE($id)){
              $sql = mysql_query("delete from tbparcela where codConta = {$id}") or die( mysql_error() );
              
          }         
    }

     public function existeConta($id){
        include '/Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT restaPagar FROM tbconta WHERE codConta = '{$id}' AND restaPagar > 0") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          
          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['restaPagar'];
          }

          if($agen > 0){
             return true;

          } else {
             return false;

          }
    }

  public function getUltimaConta(){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbconta  where codConta = (SELECT MAX(codConta) FROM tbconta )") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['codConta'];
          }
          return $agen;
      }

     public function getCustoConta($cod){
          include '/Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbconta  where codConta = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['restaPagar'];
          }
          return $agen;
      }
       public function getCustoEntiConta($cod){
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbconta  where codConta = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['restaPagar'];
          }
          return $agen;
      }
       public function getCustodConta($cod){
          include '/Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbconta  where codConta = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['desconto'];
          }
          return $agen;
      }


   
}
?>