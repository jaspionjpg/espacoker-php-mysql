<?php

class Entity_SaidaCaixa{

    function __construct(){
    }

    public function Insert(Caixa $caixa){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tbsaidacaixa(valorSaidaCaixa,dataSaidaCaixa,codOrigemSaidaCaixa) VALUES ('{$caixa->getValorCaixa()}',NOW(),'{$caixa->getCodOrigemCaixa()}')") or die( mysql_error() );

          $sql = mysql_query("uPDATE tbcaixa SET valorfinaCaixa  = 0 WHERE valorfinaCaixa < 0 ") or die( mysql_error() );

          mysql_close();
      }

      public function EditSaidaCaixa(Caixa $caixa){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbsaidacaixa` SET valorSaidaCaixa='{$caixa->getValorCaixa()}',dataSaidaCaixa='{$caixa->getDataCaixa()}',codOrigemSaidaCaixa='{$caixa->getCodOrigemCaixa()}' WHERE codSaidaCaixa = '{$caixa->getCodCaixa()}'") or die( mysql_error() );

            mysql_close();
        }

      public function deletaSaida($codSaida){
          include '../Utils/ConectaBanco.php';

          $query = mysql_query("delete from tbsaidacaixa where codSaidaCaixa = '{$codSaida}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          mysql_close();
      }
      public function getTodosSaidaRelatorio($origem, $dinheirode,$dinheiroate,$de,$ate){
        include_once '/Utils/ConectaBanco.php';

        $pesquisa = "SELECT * FROM tbsaidacaixa inner join tborigemsaidacaixa on tborigemsaidacaixa.codOrigemSaidaCaixa = tbsaidacaixa.codOrigemSaidaCaixa WHERE 1=1";
        if(!empty($origem)){
          $pesquisa = $pesquisa . " AND tborigemsaidacaixa.codOrigemSaidaCaixa = ". $origem;
        }
        if(!empty($dinheirode)){
          $pesquisa = $pesquisa . " AND valorSaidaCaixa >= ". $dinheirode;
        }
        if(!empty($dinheiroate)){
          $pesquisa = $pesquisa . " AND valorSaidaCaixa <= ". $dinheiroate;
        }
        if(!empty($de)){
          $pesquisa = $pesquisa . " AND dataSaidaCaixa >= ". $de;
        }
        if(!empty($ate)){
          $pesquisa = $pesquisa . " AND dataSaidaCaixa <= ". $ate;
        }

        $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
      <td>R$ ".number_format($row['valorSaidaCaixa'],2,",",".")."</td>
      <td>{$row['dataSaidaCaixa']}</td>
      <td>{$row['descOrigemSaidaCaixa']}</td>
      <td>";

      $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codSaidaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codSaidaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
          <a onclick = "relatorio('.$row['codSaidaCaixa'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';


        }
        return $lista;
      }


      public function getTodosSaida(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbsaidacaixa inner join tborigemsaidacaixa on tborigemsaidacaixa.codOrigemSaidaCaixa = tbsaidacaixa.codOrigemSaidaCaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
    <td>R$ ".number_format($row['valorSaidaCaixa'],2,",",".")."</td>
     <td>{$row['dataSaidaCaixa']}</td>
     <td>{$row['descOrigemSaidaCaixa']}</td>
     <td>";

    $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codSaidaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codSaidaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


        }
        return $lista;
    }

    public function getTodosEditSaidaCaixa(){
      include_once '/Utils/ConectaBanco.php';

      include_once '/Entidades/Entity_OrigemSaida.php';
      $oren_ent = new Entity_OrigemSaida();
      $coco = $oren_ent->listaTodosOrigens();

      $query = mysql_query( "SELECT * FROM tbsaidacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

     $lista = $lista.'<div class="modal fade" id="myModa'.$row['codSaidaCaixa'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
          <div class="modal-dialog" role="document">
          <form class="form-signin" role="form" enctype="multipart/form-data" action="Chamadas/EditSaidaCaixa.php?id='.$row['codSaidaCaixa'].'" method="post">

              <div class="modal-content" style="height:285px;width:60%;">
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
                      <input type="text" name="valor" class="form-control" value="'.$row['valorSaidaCaixa'].'" required autofocus
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
