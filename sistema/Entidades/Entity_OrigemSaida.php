<?php

class Entity_OrigemSaida{

    function __construct(){
    }

    public function Insert(Origem $origem){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tborigemsaidacaixa(descOrigemSaidaCaixa) VALUES ('{$origem->getDescOrigem()}')") or die( mysql_error() );

          mysql_close();
      }

      public function EditOrigem(Origem $origem){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tborigemsaidacaixa` SET descOrigemSaidaCaixa='{$origem->getDescOrigem()}' WHERE codOrigemSaidaCaixa = '{$origem->getCodOrigem()}'") or die( mysql_error() );

            mysql_close();
        }

      public function deletaOrigem($codOrigemSaida){
          include '../Utils/ConectaBanco.php';

          $query = mysql_query("delete from tborigemsaidacaixa where codOrigemSaidaCaixa = '{$codOrigemSaida}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          mysql_close();
      }

      public function getTodosOrigemSaida(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tborigemsaidacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>{$row['descOrigemSaidaCaixa']}</td>
     <td>";

    $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codOrigemSaidaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codOrigemSaidaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


        }
        return $lista;
    }

    public function getTodosOrigemSaidaRelatorio(){
      include_once '/Utils/ConectaBanco.php';

      $query = mysql_query( "SELECT * FROM tborigemsaidacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

       $lista = $lista."<tbody><tr>
   <td>{$row['descOrigemSaidaCaixa']}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codOrigemSaidaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codOrigemSaidaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
      <a onclick = "relatorio('.$row['codOrigemSaidaCaixa'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a> </td></tr></tbody>';


      }
      return $lista;
  }

    public function listaTodosOrigens(){
          include_once '/Utils/ConectaBanco.php';


          $lista = "";
          $query = mysql_query( "SELECT * FROM tborigemsaidacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){

            $lista =  $lista. '<option value="'.$row['codOrigemSaidaCaixa'].'">'.$row['descOrigemSaidaCaixa'].'</option>';

          }
          return $lista;
      }

      public function getTodosEditOrigem(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tborigemsaidacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

       $lista = $lista.'<div class="modal fade" id="myModa'.$row['codOrigemSaidaCaixa'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
            <div class="modal-dialog" role="document">
            <form class="form-signin" role="form" action="Chamadas/EditOrigemSaida.php?id='.$row['codOrigemSaidaCaixa'].'" method="post">

                <div class="modal-content" style="height:235px;width:60%;">
                    <div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><center><font color="pink">Edite a Origem da Saida</font></center></h4>
                    </div>
                    <center>
                    <div class="modal-body" >
                          <p>
                            <label>
                              <input type="text" name="nome" class="form-control" value="'.$row['descOrigemSaidaCaixa'].'" required autofocus
                              style="width:100%; margin-left:0%;">
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
