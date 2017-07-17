<?php

class Entity_Servico{

    function __construct(){
    }

	public function Insert(Servico $servico){
        include_once '../../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbservico(nomeServico, descServico, duracaoServico, valorServico, nomeImagem) VALUES ('{$servico->getNomeServico()}','{$servico->getDescServico()}','{$servico->getDuracaoServico()}','{$servico->getValorServico()}','{$servico->getCodImagem()}')") or die( mysql_error() );

        mysql_close();
    }

    public function EditServico(Servico $servico){
          include_once '../../Utils/ConectaBanco.php';
          $sql = mysql_query("UPDATE `tbservico` SET nomeServico='{$servico->getNomeServico()}',descServico='{$servico->getDescServico()}',duracaoServico='{$servico->getDuracaoServico()}',valorServico='{$servico->getValorServico()}',nomeImagem='{$servico->getCodImagem()}' WHERE codServico = '{$servico->getCodServico()}'") or die( mysql_error() );

          mysql_close();
      }

    public function deletaServico($codServico){
        include '../Utils/ConectaBanco.php';

        $query = mysql_query("delete from tbservico where codServico = '{$codServico}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        mysql_close();
    }


    public function getServico($cod){
          include_once '/Utils/ConectaBanco.php';
          include_once '/Models/Servico.php';

          $lista = new Servico();
          $query = mysql_query( "SELECT * FROM tbservico where codServico = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
            $lista->setNomeServico($row['nomeServico']);
            $lista->setDescServico($row['descServico']);
            $lista->setDuracaoServico($row['duracaoServico']);
            $lista->setValorServico($row['valorServico']);
            $lista->setCodImagem($row['nomeImagem']);

          }
          return $lista;
      }

        public function getValorServico($cod){
          include_once '../Utils/ConectaBanco.php';
          include_once '../Models/Servico.php';

          $lista = "";
          $query = mysql_query( "SELECT * FROM tbservico where codServico = '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
                      $lista = $row['valorServico'];
                      }
          return $lista;
      }

      public function getcodPeloNome($cod){
          include '../Utils/ConectaBanco.php';

          $lista = "";
          $query = mysql_query( "SELECT * FROM tbservico where nomeServico Like '{$cod}'") or die( '<p class="bg-danger">'.mysql_error().'asdasd</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
                      $lista = $row['codServico'];
                      }

          return $lista;
      }

	public function listaTodosServicos(){
        include_once '/Utils/ConectaBanco.php';


        $lista = "";
        $query = mysql_query( "SELECT * FROM tbservico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){

          $lista =  $lista. '<option value="'.$row['codServico'].'">'.$row['nomeServico'].'</option>';

        }
        return $lista;
    }

    public function getTodosServicos(){
      include_once '/Utils/ConectaBanco.php';
      include_once 'Entity_Telefone.php';

      $tele_ent = new Entity_Telefone();

      $query = mysql_query( "SELECT * FROM tbservico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){
$valor = number_format($row['valorServico'],2,",",".");
       $lista = $lista."<tbody><tr>
   <td>{$row['nomeServico']}</td>
   <td>{$row['descServico']}</td>
   <td>{$row['duracaoServico']}</td>
   <td>R$ ".$valor."</td>
   <td>{$row['nomeImagem']}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codServico'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codServico'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

  public function getTodosServicosRelatorio($nome,$tempo,$valor,$cnome,$cdescricao,$cduracao,$cvalor,$cnomeimagem,$copcoes){
    include_once '/Utils/ConectaBanco.php';

    $pesquisa =  "SELECT * FROM tbservico where 1 = 1";

    if(!empty($nome)){
      $pesquisa = $pesquisa . " AND nomeServico LIKE '%". $nome. "%'";
    }
    if(!empty($tempo)){
    }
    if(!empty($valor)){
    }


    $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );

    $lista = "<thead><tr>";
    if(empty($cnome)){
      $lista = $lista . "<th>Nome</th>";
    }
    if(empty($cdescricao)){
      $lista = $lista . "<th>Descrição</th>";
    }
    if(empty($cduracao)){
      $lista = $lista . "<th>Duração</th>";
    }
    if(empty($cvalor)){
      $lista = $lista . "<th>Valor</th>";
    }
    if(empty($cnomeimagem)){
      $lista = $lista . "<th>Nome Imagem</th>";
    }
    if(empty($copcoes)){
      $lista = $lista . "<th>Opções</th>";
    }
    $lista = $lista . "</tr></thead>";

    if($query != "")
    while($row = mysql_fetch_assoc($query)){
$valor = number_format($row['valorServico'],2,",",".");

$lista =$lista. "<tbody><tr>";
if(empty($cnome)){
  $lista = $lista . "<td>{$row['nomeServico']}</td>";
}
if(empty($cdescricao)){
  $lista = $lista . " <td>{$row['descServico']}</td>";
}
if(empty($cduracao)){
  $lista = $lista . " <td>{$row['duracaoServico']}</td>";
}
if(empty($cvalor)){
  $lista = $lista . "  <td>R$ ".$valor."</td>";
}
if(empty($cnomeimagem)){
  $lista = $lista . " <td>{$row['nomeImagem']}</td>";
}
if(empty($copcoes)){
  $lista = $lista.' <td><a data-toggle="modal" data-target="#myModa'.$row['codServico'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codServico'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
      <a onclick = "relatorio('.$row['codServico'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td>';

}
$lista = $lista . "</tr></tbody>";

    }
    return $lista;
}

  public function getTodosEditProduto(){
    include_once '/Utils/ConectaBanco.php';

    $query = mysql_query( "SELECT * FROM tbservico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
    $lista = "";
    if($query != "")
    while($row = mysql_fetch_assoc($query)){

   $lista = $lista.'<div class="modal fade" id="myModa'.$row['codServico'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
        <div class="modal-dialog" role="document">
        <form class="form-signin" role="form" enctype="multipart/form-data" action="imagens/imagensUpload/EditServico.php?id='.$row['codServico'].'" method="post">

            <div class="modal-content" style="height:430px;width:60%;">
                <div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><center><font color="pink">Edite o Serviço</font></center></h4>
                </div>
                <center>
                <div class="modal-body" >
                <p>
                  <label>
                    <input type="text" name="nome" class="form-control" value="'.$row['nomeServico'].'" required autofocus
                    style="width:100%; margin-left:0%;">
                  </label>
                </p>

                <p>
                  <label>
                    <input type="text" name="descricao" class="form-control" value="'.$row['descServico'].'"
                    required autofocus style="width:100%; margin-left:0%;">
                  </label>
                </p>

                <p>
                  <label>
                    <input type="time" name="tempo" class="form-control" value="'.$row['duracaoServico'].'" required autofocus
                    style="width:100%; margin-left:0%;">
                  </label>
                </p>
                <p>
                  <label>
                   <input type="text" name="valor" class="form-control" value="'.$row['valorServico'].'" required autofocus
                   style="width:100%; margin-left:0%;">
                  </label>
                </p>

                <p>
                  <label>
                    <input type="file" name="file" class="form-control" required autofocus style="width:100%; margin-left:0%;">
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
?>