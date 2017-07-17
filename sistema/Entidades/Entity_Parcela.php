<?php

class Entity_Parcela{

    function __construct(){
    }

     public function InsertParcela($id, $data){
        include '../Utils/ConectaBanco.php';

        $conta = new Entity_Conta();

        $valor = $conta->getCustoEntiConta($id);
        $sql = mysql_query("INSERT INTO tbparcela(valorParcela, dataParcela,codConta) VALUES ('{$valor}','{$data}','{$id}')") or die( mysql_error() );
      
        mysql_close();
    }
public function existeParcela($id){
        include '/Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbparcela WHERE codConta = '{$id}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          
          if($query != ""){
             return true;

          } else {
             return false;

          }
    }


public function existeParcelaE($id){
        include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbparcela WHERE codConta = '{$id}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          
          if($query != ""){
             return true;

          } else {
             return false;

          }
    }

  public function getTodasParcelasIgual(){
      include_once '/Utils/ConectaBanco.php';
            date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

      $query = mysql_query( "SELECT * FROM tbparcela inner join tbConta on tbConta.codConta = tbparcela.codConta inner join tbusuario on tbConta.codUsuario = tbusuario.codUsuario WHERE dataParcela = '{$date}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){


        $lista = $lista."<tbody><tr class = 'warning'>
<td>{$row['nomeUsuario']}</td>
<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['valorParcela']}</a></td>
<td>{$row['dataParcela']}</td>

</tr></tbody>";


      }
      return $lista;
  }

  public function getTodasParcelasMenor(){
      include_once '/Utils/ConectaBanco.php';
            date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

      $query = mysql_query( "SELECT * FROM tbparcela inner join tbConta on tbConta.codConta = tbparcela.codConta inner join tbusuario on tbConta.codUsuario = tbusuario.codUsuario WHERE dataParcela < '{$date}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){


        $lista = $lista."<tbody><tr class = 'danger'>
<td>{$row['nomeUsuario']}</td>
<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['valorParcela']}</a></td>
<td>{$row['dataParcela']}</td>

</tr></tbody>";


      }
      return $lista;
  }

  public function getTodasParcelasMaior(){
      include_once '/Utils/ConectaBanco.php';
            date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

      $query = mysql_query( "SELECT * FROM tbparcela inner join tbConta on tbConta.codConta = tbparcela.codConta inner join tbusuario on tbConta.codUsuario = tbusuario.codUsuario WHERE dataParcela > '{$date}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){


        $lista = $lista."<tbody><tr class = 'success'>
<td>{$row['nomeUsuario']}</td>
<td><a href='paginaPagamento.php?idConta=".$row['codConta']." '>{$row['valorParcela']}</a></td>
<td>{$row['dataParcela']}</td>

</tr></tbody>";


      }
      return $lista;
  }


public function getDataParcela($id){
        include '/Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT dataParcela FROM tbparcela WHERE codConta = '{$id}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          $agen = "";
          if($query != ""){
             while($row = mysql_fetch_assoc($query)){
              $agen = $row['dataParcela'];
          }
          }

          return $agen;
    }

}
    ?>