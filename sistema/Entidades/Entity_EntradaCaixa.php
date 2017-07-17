<?php

class Entity_EntradaCaixa{

    function __construct(){
    }

    public function Insert(Caixa $caixa){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tbentradacaixa(valorEntradaCaixa,dataEntradaCaixa,codOrigemEntradaCaixa) VALUES ('{$caixa->getValorCaixa()}',NOW(),'{$caixa->getCodOrigemCaixa()}')") or die( mysql_error() );

          mysql_close();
      }

      public function EditEntradaCaixa(Caixa $caixa){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbentradacaixa` SET valorEntradaCaixa='{$caixa->getValorCaixa()}',dataEntradaCaixa='{$caixa->getDataCaixa()}',codOrigemEntradaCaixa='{$caixa->getCodOrigemCaixa()}' WHERE codEntradaCaixa = '{$caixa->getCodCaixa()}'") or die( mysql_error() );

            mysql_close();
        }

      public function deletaEntrada($codEntrada){
          include '../Utils/ConectaBanco.php';

          $query = mysql_query("delete from tbentradacaixa where codEntradaCaixa = '{$codEntrada}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          mysql_close();
      }

      public function getTodosEntrada(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbentradacaixa inner join tborigementradacaixa on tborigementradacaixa.codOrigemEntradaCaixa = tbentradacaixa.codOrigemEntradaCaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>R$ ".number_format($row['valorEntradaCaixa'],2,",",".")."</td>
     <td>{$row['dataEntradaCaixa']}</td>
     <td>{$row['descOrigemEntradaCaixa']}</td>
     <td>";

    $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codEntradaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
         <a onclick = "deletar('.$row['codEntradaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


        }
        return $lista;
    }

    public function getTodosEntradaRelatorio($origem, $dinheirode,$dinheiroate,$de,$ate){
      include_once '/Utils/ConectaBanco.php';
      $pesquisa =  "SELECT * FROM tbentradacaixa inner join tborigementradacaixa on tborigementradacaixa.codOrigemEntradaCaixa = tbentradacaixa.codOrigemEntradaCaixa WHERE 1 = 1";

      if(!empty($origem)){
        $pesquisa = $pesquisa . " AND tborigementradacaixa.codOrigemEntradaCaixa = ". $origem;
      }
      if(!empty($dinheirode)){
        $pesquisa = $pesquisa . " AND valorEntradaCaixa >= ". $dinheirode;
      }
      if(!empty($dinheiroate)){
        $pesquisa = $pesquisa . " AND valorEntradaCaixa <= ". $dinheiroate;
      }
      if(!empty($de)){
        $pesquisa = $pesquisa . " AND dataEntradaCaixa >= ". $de;
      }
      if(!empty($ate)){
        $pesquisa = $pesquisa . " AND dataEntradaCaixa <= ". $ate;
      }

      $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

       $lista = $lista."<tbody><tr>
   <td>R$ ".number_format($row['valorEntradaCaixa'],2,",",".")."</td>
   <td>{$row['dataEntradaCaixa']}</td>
   <td>{$row['descOrigemEntradaCaixa']}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codEntradaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
       <a onclick = "deletar('.$row['codEntradaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
       <a onclick = "relatorio('.$row['codEntradaCaixa'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';


      }
      return $lista;
  }

    public function getTodosEditEntradaCaixa(){
      include_once '/Utils/ConectaBanco.php';

      include_once '/Entidades/Entity_OrigemEntrada.php';
      $oren_ent = new Entity_OrigemEntrada();
      $coco = $oren_ent->listaTodosOrigens();

      $query = mysql_query( "SELECT * FROM tbentradacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

     $lista = $lista.'<div class="modal fade" id="myModa'.$row['codEntradaCaixa'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
          <div class="modal-dialog" role="document">
          <form class="form-signin" role="form" enctype="multipart/form-data" action="Chamadas/EditEntradaCaixa.php?id='.$row['codEntradaCaixa'].'" method="post">

              <div class="modal-content" style="height:285px;;width:60%;">
                  <div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title"><center><font color="pink">Edite o Entrada do Caixa</font></center></h4>
                  </div>
                  <center>
                  <div class="modal-body" >
                  <p>
                    <label>
                      <input type="text" name="valor" class="form-control" value="'.$row['valorEntradaCaixa'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                  <p>
                 <label>
                  <select name="origem" class="form-control" required autofocus style="width:100%; margin-left:0%;">
                    '.$coco.'
                   </select>
                   </label>
                  </p>

                          </div>
                  </center>
                  <div class="modal-footer"style="background:captiontext;opacity: 0.70; z-index:1000;">
                      <button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button  class="btn btn-primary" type="submit" style="background:pink;border-color:white;">
                      <font color="black">Finalizar</font></button>
                      </form>
                  </div>
              </div>
          </div>
      </div>' ;
    }
      return $lista; }

}
