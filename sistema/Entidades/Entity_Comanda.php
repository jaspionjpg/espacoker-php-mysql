<?php

class Entity_Comanda{

    function __construct(){

    }

    public function InsertVenda($subtotal){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbcomandavenda(subTotalVenda,descontoVenda) VALUES ('{$subtotal}','0')") or die( mysql_error() );

        mysql_close();
    }

    public function InsertServico($subtotal){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbcomandaservico(subTotalServico,descontoServico) VALUES ('{$subtotal}','0')") or die( mysql_error() );

        mysql_close();
    }
      public function getCodServico(){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbcomandaservico  where codComandaServico = (select MAX(codComandaServico) FROM tbcomandaservico)") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['codComandaServico'];
          }
          return $agen;
      }

       public function getTotalComanda($codComandaServico,$codComandaVenda){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT subTotalServico FROM tbcomandaservico  where codComandaServico = '{$codComandaServico}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
            while($row = mysql_fetch_assoc($query)){
                $agen = $row['subTotalServico'];
            }

          $query = mysql_query( "SELECT subTotalVenda FROM tbcomandavenda  where codComandaVenda = '{$codComandaVenda}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
            while($row = mysql_fetch_assoc($query)){
                $agen += $row['subTotalVenda'];
            }

          return $agen;
      }

public function getTotalDescontoComanda($codComandaServico,$codComandaVenda){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT descontoServico FROM tbcomandaservico  where codComandaServico = '{$codComandaServico}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
            while($row = mysql_fetch_assoc($query)){
                $agen = $row['descontoServico'];
            }

          $query = mysql_query( "SELECT descontoVenda FROM tbcomandavenda  where codComandaVenda = '{$codComandaVenda}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
            while($row = mysql_fetch_assoc($query)){
                $agen += $row['descontoVenda'];
            }

          return $agen;
      }

      public function getCodVenda(){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbcomandavenda WHERE  codComandaVenda = (select MAX(codComandaVenda) FROM tbcomandavenda)") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['codComandaVenda'];
          }
          return $agen;
      }

}
