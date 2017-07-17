<?php

class Entity_Produto{

    function __construct(){
    }

    public function Insert(Produto $produto){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tbproduto(descProduto,quantidadeProduto,valorUnidadeVenda,valorUnidadeCompra,codFabricante) VALUES ('{$produto->getDescProduto()}','{$produto->getQuantidadeProduto()}','{$produto->getValorUnidadeVenda()}','{$produto->getValorUnidadeCompra()}','{$produto->getCodFabricante()}')") or die( mysql_error() );

          mysql_close();
      }

      public function EditProduto(Produto $produto){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbproduto` SET descProduto='{$produto->getDescProduto()}',quantidadeProduto='{$produto->getQuantidadeProduto()}',valorUnidadeVenda='{$produto->getValorUnidadeVenda()}',valorUnidadeCompra='{$produto->getValorUnidadeCompra()}',codFabricante='{$produto->getCodFabricante()}' WHERE codProduto = '{$produto->getCodProduto()}'") or die( mysql_error() );

            mysql_close();
        }

      public function deletaProduto($codProduto){
          include '../Utils/ConectaBanco.php';

          $query = mysql_query("delete from tbproduto where codProduto = '{$codProduto}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          mysql_close();
      }


        public function getValorProduto($cod){
          include_once '../Utils/ConectaBanco.php';
          include_once '../Models/Produto.php';

          $lista = "";
          $query = mysql_query( "SELECT * FROM tbproduto where codProduto = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
                      $lista = $row['valorUnidadeVenda'];
                      }
          return $lista;
      }

      public function getTodosEditProduto(){
        include_once '/Utils/ConectaBanco.php';
        include_once '/Entidades/Entity_Fabricante.php';
        $fabr_ent = new Entity_Fabricante();
        $coco = $fabr_ent->listaTodosFabricante();
        $query = mysql_query( "SELECT * FROM tbproduto") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

       $lista = $lista.'<div class="modal fade" id="myModa'.$row['codProduto'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
   					<div class="modal-dialog" role="document">
            <form class="form-signin" role="form" action="Chamadas/editProduto.php?id='.$row['codProduto'].'" method="post">

   							<div class="modal-content" style="height:430px;width:60%;">
   									<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
   										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   												<span aria-hidden="true">&times;</span>
   											</button>
   											<h4 class="modal-title"><center><font color="pink">Edite o Produto</font></center></h4>
   									</div>
   									<center>
   									<div class="modal-body" >
   												<p>
   													<label>
   														<input type="text" name="nome" class="form-control" value="'.$row['descProduto'].'" required autofocus
   														style="width:100%; margin-left:0%;">
   													</label>
   												</p>

   												<p>
   													<label>
   														<input type="number" name="quantidade" class="form-control" value="'.$row['quantidadeProduto'].'"
   														required autofocus style="width:100%; margin-left:0%;">
   													</label>
   												</p>
   												<p>
   											 <label>
   												<select name="codFabricante" class="form-control" required autofocus style="width:100%; margin-left:0%;">
   													'.$coco.'
   												 </select>
   												 </label>
   												</p>

   												<p>
   													<label>
   													 <input type="text" name="valorcompra" class="form-control" value="'.$row['valorUnidadeCompra'].'" required autofocus
   													 style="width:100%; margin-left:0%;">
   													</label>
   												</p>

   												<p>
   													<label>
   														<input type="text" name="valorvenda" class="form-control" value="'.$row['valorUnidadeVenda'].'"
   														required autofocus style="width:100%; margin-left:0%;">
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

      public function getTodosProduto(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbproduto  inner join tbfabricante on tbfabricante.codFabricante = tbproduto.codFabricante") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>{$row['descProduto']}</td>
     <td>{$row['quantidadeProduto']}</td>
     <td>R$ ".number_format($row['valorUnidadeCompra'],2,",",".")."</td>
     <td>R$ ".number_format($row['valorUnidadeVenda'],2,",",".")."</td>
     <td>{$row['descFabricante']}</td>
     <td>";

    $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codProduto'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codProduto'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';
        }
        return $lista;
    }

    public function getTodosProdutoRelatorio($nome,$codFabricante,$vendade,$vendaate,$comprade,$compraate,$quantidadede,$quantidadeate,$cnome,$cquantidade,$cvendacompra,$cvalorvenda,$cfabricante,$copcoes){
      include_once '/Utils/ConectaBanco.php';

      $pesquisa = "SELECT * FROM tbproduto  inner join tbfabricante on tbfabricante.codFabricante = tbproduto.codFabricante where 1 = 1 ";

      if(!empty($nome)){
        $pesquisa = $pesquisa . " AND descProduto LIKE '%". $nome. "%'";
      }
      if(!empty($codFabricante)){
        $pesquisa = $pesquisa . " AND codFabricante = ". $codFabricante;
      }
      if(!empty($quantidadede)){
        $pesquisa = $pesquisa . " AND quantidadeProduto >= ". $quantidadede;
      }
      if(!empty($quantidadeate)){
        $pesquisa = $pesquisa . " AND quantidadeProduto <= ". $quantidadeate;
      }
      if(!empty($comprade)){
        $pesquisa = $pesquisa . " AND valorUnidadeCompra >= ". $comprade;
      }
      if(!empty($compraate)){
        $pesquisa = $pesquisa . " AND valorUnidadeCompra <= ". $compraate;
      }
      if(!empty($vendade)){
        $pesquisa = $pesquisa . " AND valorUnidadeVenda >= ". $vendade;
      }
      if(!empty($vendaate)){
        $pesquisa = $pesquisa . " AND valorUnidadeVenda <= ". $vendaate;
      }

      $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );

      $lista = "<thead><tr>";
      if(empty($cnome)){
        $lista = $lista . "<th>Nome</th>";
      }
      if(empty($cquantidade)){
        $lista = $lista . "<th>Quantidade</th>";
      }
      if(empty($cvendacompra)){
        $lista = $lista . "<th>Valor Compra</th>";
      }
      if(empty($cvalorvenda)){
        $lista = $lista . "<th>Valor Venda</th>";
      }
      if(empty($cfabricante)){
        $lista = $lista . "<th>Fabricante</th>";
      }
      if(empty($copcoes)){
        $lista = $lista . "<th>Opções</th>";
      }
      $lista = $lista . "</tr></thead>";

      if($query != "")
      while($row = mysql_fetch_assoc($query)){

        $lista = $lista . "<tbody><tr>";
        if(empty($cnome)){
          $lista = $lista . "<td>{$row['descProduto']}</td>";
        }
        if(empty($cquantidade)){
          $lista = $lista . "<td>{$row['quantidadeProduto']}</td>";
        }
        if(empty($cvendacompra)){
          $lista = $lista . "<td>R$ ".number_format($row['valorUnidadeCompra'],2,",",".")."</td>";
        }
        if(empty($cvalorvenda)){
          $lista = $lista . "<td>R$ ".number_format($row['valorUnidadeVenda'],2,",",".")."</td>";
        }
        if(empty($cfabricante)){
          $lista = $lista . "<td>{$row['descFabricante']}</td>";
        }
        if(empty($copcoes)){
          $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codProduto'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
              <a onclick = "deletar('.$row['codProduto'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
              <a onclick = "relatorio('.$row['codProduto'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td>';
        }
        $lista = $lista . "</tr></tbody>";

      }
      return $lista;
  }

    public function listaTodosProdutos(){
          include_once '/Utils/ConectaBanco.php';
          $lista = "";
          $query = mysql_query( "SELECT * FROM tbproduto") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
          if($query != "")
          while($row = mysql_fetch_assoc($query)){
            $lista =  $lista. '<option value="'.$row['codProduto'].'">'.$row['descProduto'].'</option>';
          }
          return $lista;
      }
}
