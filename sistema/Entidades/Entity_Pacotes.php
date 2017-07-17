<?php

class Entity_Pacotes{

    function __construct(){
    }

	public function Insert(Pacote $paco){
        include_once '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbpacote(nomePacote, valorPacote, dataCadastro) VALUES ('{$paco->getNomePacote()}','{$paco->getValorPacote()}',NOW())") or die( mysql_error() );

        mysql_close();
    }

	public function EditProduto(Pacote $paco){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbpacote` SET nomePacote='{$paco->getNomePacote()}',valorPacote='{$paco->getValorPacote()}' WHERE codPacote = '{$paco->getCodPacote()}'") or die( mysql_error() );

            mysql_close();
       }

    public function deletaPacote($codPacote){
        include '../Utils/ConectaBanco.php';

        $query = mysql_query("delete from tbpacote where codPacote = '{$codPacote}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        mysql_close();
    }

    public function getCod($nome){
          include '../Utils/ConectaBanco.php';
          $agen = "";
          $query = mysql_query( "SELECT * FROM tbpacote WHERE nomePacote = '{$nome}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){
              $agen = $row['codPacote'];
          }
          return $agen;
      }
public function getTodosProdutoRelatorio($nome,$servicos,$comprade,$compraate,$cnome,$cdescricao,$cdatacadastro,$cvalor,$copcoes){
  include_once '/Utils/ConectaBanco.php';
  include_once 'Entity_ItensPacote.php';

  $itpc_ent = new Entity_ItensPacote();

  $pesquisa = "SELECT * FROM tbpacote Where 1 = 1";

  if(!empty($nome)){
    $pesquisa = $pesquisa . " AND nomePacote LIKE '%". $nome. "%'";
  }
  if(!empty($comprade)){
    $pesquisa = $pesquisa . " AND valorPacote >= ". $comprade ;
  }
  if(!empty($compraate)){
    $pesquisa = $pesquisa . " AND valorPacote <=  ". $compraate;
  }
  if(!empty($servicos)){
    $pesquisa = $pesquisa . " AND codPacote in (Select codPacote from tbitenspacote where codServico = ". $servicos .")";
  }

  $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().$pesquisa.'</p>' );
  $lista = "<thead><tr>";
  if(empty($cnome)){
    $lista = $lista . "<th>Nome</th>";
  }
  if(empty($cdescricao)){
    $lista = $lista . "<th>Valor</th>";
  }
  if(empty($cdatacadastro)){
    $lista = $lista . "<th>Data Cadastro</th>";
  }
  if(empty($cvalor)){
    $lista = $lista . "<th>Serviços</th>";
  }
  if(empty($copcoes)){
    $lista = $lista . "<th>Opções</th>";
  }
  $lista = $lista . "</tr></thead>";
  if($query != "")
  while($row = mysql_fetch_assoc($query)){

    $lista = $lista."<tbody><tr>";
    if(empty($cnome)){
      $lista = $lista . "<td>{$row['nomePacote']}</td>";
    }
    if(empty($cdescricao)){
      $lista = $lista . "<td>R$ ".number_format($row['valorPacote'],2,",",".")."</td>";
    }
    if(empty($cdatacadastro)){
      $lista = $lista . "<td>{$row['dataCadastro']}</td>";
    }
    if(empty($cvalor)){
      $lista = $lista . "<td>{$itpc_ent->getItensPeloPacote($row['codPacote'])}</td>";
    }
    if(empty($copcoes)){
      $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codPacote'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codPacote'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
        <a onclick = "relatorio('.$row['codPacote'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';
    }
    $lista = $lista . "</tr></tbody>";
  }
  return $lista;
}

    public function getTodosPacotes(){
      include_once '/Utils/ConectaBanco.php';
      include_once 'Entity_ItensPacote.php';

      $itpc_ent = new Entity_ItensPacote();

      $query = mysql_query( "SELECT * FROM tbpacote") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

       $lista = $lista."<tbody><tr>
   <td>{$row['nomePacote']}</td>
   <td>R$ ".number_format($row['valorPacote'],2,",",".")."</td>
   <td>{$row['dataCadastro']}</td>
   <td>{$itpc_ent->getItensPeloPacote($row['codPacote'])}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codPacote'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codPacote'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

  public function listaTodosPacotes(){
        include_once '/Utils/ConectaBanco.php';


        $lista = "";
        $query = mysql_query( "SELECT * FROM tbpacote") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){

          $lista =  $lista. '<option value="'.$row['codPacote'].'">'.$row['nomePacote'].'</option>';

        }
        return $lista;
    }

    public function listaTodosMetodosPacotes($cod){
      include_once '/Entidades/Entity_ItensPacote.php';

        $itpc_ent = new Entity_ItensPacote();
         $retorno = "";
 $servicos =  $itpc_ent->getServicosPeloPacote($cod);
$horarios =  $itpc_ent->getHorariosPeloPacote($cod);
$retorno = $retorno . '<div id="pacotes"><div class="col-md-6 col-sm-6" style= "padding-bot:30px;" id="servicos"> <p> Serviço :</p> ';
$retorno = $retorno . $servicos;
$retorno = $retorno . '</div> <div class="col-md-6 col-sm-6" style= "padding-bot:30px;" id="horarios">  <p> Data e Horario :</p>';
$retorno = $retorno . $horarios;
$retorno = $retorno .  '</div></div>';
          
          return $retorno;
      }

	  public function getTodosEditPacote(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbpacote") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

       $lista = $lista.'<div class="modal fade" id="myModa'.$row['codPacote'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
   					<div class="modal-dialog" role="document">
            <form class="form-signin" role="form" action="Chamadas/editPacote.php?id='.$row['codPacote'].'" method="post">

   							<div class="modal-content" style="height:285px;;width:60%;">
   									<div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
   										 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   												<span aria-hidden="true">&times;</span>
   											</button>
   											<h4 class="modal-title"><center><font color="pink">Edite o Pacote</font></center></h4>
   									</div>
   									<center>
   									<div class="modal-body" >
   												<p>
   													<label>
   														<input type="text" name="nome" class="form-control" value="'.$row['nomePacote'].'" required autofocus
   														style="width:100%; margin-left:0%;">
   													</label>
   												</p>

   												<p>
   													<label>
   														<input type="number" name="valor" class="form-control" value="'.$row['valorPacote'].'"
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

}
