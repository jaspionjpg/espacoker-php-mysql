<?php

class Entity_ItensComanda{

    function __construct(){

    }

    public function InsertServico($codComanda, $codServico, $quantidade, $desconto){
        include '../Utils/ConectaBanco.php';
        include_once 'Entity_Servico.php';
        $sql = mysql_query("INSERT INTO tbitenscomandaservico(codComandaServico, codServico, qtdeServico) VALUES ('{$codComanda}','{$codServico}','{$quantidade}')") or die( mysql_error() );
        $Servico = new Entity_Servico();
        $valorServico =($Servico->getValorServico($codServico)-$desconto)*$quantidade;

        $sql = mysql_query("UPDATE tbcomandaservico SET subTotalServico = subTotalServico + '{$valorServico}', descontoServico = descontoServico + '{$desconto}' WHERE codComandaServico = '{$codComanda}'") or die( mysql_error() );

        mysql_close();
    }


    public function InsertProduto($codComanda, $codProduto, $quantidade, $desconto){
        include '../Utils/ConectaBanco.php';
        include_once 'Entity_Produto.php';
        $sql = mysql_query("INSERT INTO tbitenscomandavenda(codComandaVenda, codProduto, qtdeProdutoVenda) VALUES ('{$codComanda}','{$codProduto}','{$quantidade}')") or die( mysql_error() );

        $Servico = new Entity_Produto();
        $valorServico =($Servico->getValorProduto($codProduto)-$desconto)*$quantidade;

        $sql = mysql_query("UPDATE tbcomandavenda SET subTotalVenda = subTotalVenda + '{$valorServico}', descontoVenda = descontoVenda + '{$desconto}' WHERE codComandaVenda = '{$codComanda}'") or die( mysql_error() );

        $sql = mysql_query("UPDATE tbproduto SET quantidadeProduto = quantidadeProduto - '{$quantidade}' WHERE codProduto = '{$codProduto}'") or die( mysql_error() );


        mysql_close();
    }

        public function getItensPeloComandaServico($codComanda){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbitenscomandaservico inner join tbservico on tbservico.codServico = tbitenscomandaservico.codServico WHERE codComandaServico = '{$codComanda}' ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod . $row['nomeServico'] ." /qt = ".$row['qtdeServico']."<br> ";

        }
        return $cod;
    }

    public function getItensPeloComandaProdutos($codComanda){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbitenscomandavenda inner join tbproduto on tbproduto.codProduto = tbitenscomandavenda.codProduto WHERE codComandaVenda = '{$codComanda}' ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod . $row['descProduto'] . " /qt = ".$row['qtdeProdutoVenda']."<br> ";

        }
        return $cod;
    }

}
