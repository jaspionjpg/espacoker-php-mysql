<?php

class Entity_OrigemEntrada{

    function __construct(){
    }

    public function Insert(Origem $origem){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tborigementradacaixa(descOrigemEntradaCaixa) VALUES ('{$origem->getDescOrigem()}')") or die( mysql_error() );

          mysql_close();
      }

      public function EditOrigem(Origem $origem){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tborigementradacaixa` SET descOrigemEntradaCaixa='{$origem->getDescOrigem()}' WHERE codOrigemEntradaCaixa = '{$origem->getCodOrigem()}'") or die( mysql_error() );

            mysql_close();
        }

      public function deletaOrigem($codOrigemEntrada){
          include '../Utils/ConectaBanco.php';

          $query = mysql_query("delete from tborigementradacaixa where codOrigemEntradaCaixa = '{$codOrigemEntrada}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          mysql_close();
      }

      public function getTodosOrigemEntradaRelatorio(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tborigementradacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>{$row['descOrigemEntradaCaixa']}</td>
     <td>";

    $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codOrigemEntradaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codOrigemEntradaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
        <a onclick = "relatorio('.$row['codOrigemEntradaCaixa'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';


        }
        return $lista;
    }
    public function getTodosOrigemEntrada(){
      include_once '/Utils/ConectaBanco.php';

      $query = mysql_query( "SELECT * FROM tborigementradacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

       $lista = $lista."<tbody><tr>
   <td>{$row['descOrigemEntradaCaixa']}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codOrigemEntradaCaixa'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codOrigemEntradaCaixa'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

    public function listaTodosOrigens(){
          include_once '/Utils/ConectaBanco.php';


          $lista = "";
          $query = mysql_query( "SELECT * FROM tborigementradacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){

            $lista =  $lista. '<option value="'.$row['codOrigemEntradaCaixa'].'">'.$row['descOrigemEntradaCaixa'].'</option>';

          }
          return $lista;
      }

      public function getTodosEditOrigem(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tborigementradacaixa") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

       $lista = $lista.'<div class="modal fade" id="myModa'.$row['codOrigemEntradaCaixa'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
   					<div class="modal-dialog" role="document">
            <form class="form-signin" role="form" action="Chamadas/EditOrigemEntrada.php?id='.$row['codOrigemEntradaCaixa'].'" method="post">

   							<div class="modal-content" style="height:235px;width:60%;">
   									<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
   										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   												<span aria-hidden="true">&times;</span>
   											</button>
   											<h4 class="modal-title"><center><font color="pink">Edite a Origem da Entrada</font></center></h4>
   									</div>
   									<center>
   									<div class="modal-body" >
   												<p>
   													<label>
   														<input type="text" name="nome" class="form-control" value="'.$row['descOrigemEntradaCaixa'].'" required autofocus
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
