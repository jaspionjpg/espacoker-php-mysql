<?php

class Entity_Usuario{

    function __construct(){

    }
    public function listaTodosServicos(){
          include_once '/Utils/ConectaBanco.php';


          $lista = "";
          $query = mysql_query( "SELECT * FROM tbusuario") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

          if($query != "")
          while($row = mysql_fetch_assoc($query)){

            $lista =  $lista. '<option value="'.$row['codUsuario'].'">'.$row['nomeUsuario'].'</option>';

          }
          return $lista;
      }

      public function EditUsuario(Usuario $usuario){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbusuario` SET nomeUsuario='{$usuario->getNomeUsuario()}',emailUsuario='{$usuario->getEmailUsuario()}',sexoUsuario='{$usuario->getSexoUsuario()}',login='{$usuario->getLogin()}',dataNascimentoUsuario='{$usuario->getDataNascimentoUsuario()}' WHERE codUsuario = '{$usuario->getCodUsuario()}'") or die( mysql_error() );

            mysql_close();
        }

		public function EditFunc(Usuario $usuario){
            include_once '../Utils/ConectaBanco.php';
            $sql = mysql_query("UPDATE `tbusuario` SET nomeUsuario='{$usuario->getNomeUsuario()}',emailUsuario='{$usuario->getEmailUsuario()}',sexoUsuario='{$usuario->getSexoUsuario()}',login='{$usuario->getLogin()}',dataNascimentoUsuario='{$usuario->getDataNascimentoUsuario()}' ,salarioFuncionario='{$usuario->getSalarioFuncionario()}' ,cpfFuncionario='{$usuario->getCpfUsuario()}' WHERE codUsuario = '{$usuario->getCodUsuario()}'") or die( mysql_error() );

            mysql_close();
        }

    public function InsertFunc(Usuario $usuario){
          include_once '../Utils/ConectaBanco.php';
          $sql = mysql_query("INSERT INTO tbusuario(nomeUsuario, dataNascimentoUsuario, emailUsuario, sexoUsuario, login, senha, salarioFuncionario, cpfFuncionario, tipoUsuario,dataCadastro) VALUES ('{$usuario->getNomeUsuario()}','{$usuario->getDataNascimentoUsuario()}', '{$usuario->getEmailUsuario()}','{$usuario->getSexoUsuario()}','{$usuario->getLogin()}','{$usuario->getSenha()}','{$usuario->getSalarioFuncionario()}','{$usuario->getCpfUsuario()}','{$usuario->getTipoUsuario()}', NOW())") or die( mysql_error() );

          mysql_close();
      }

    public function InsertComum(Usuario $usuario){
        include_once '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbusuario(nomeUsuario, dataNascimentoUsuario, emailUsuario, sexoUsuario, login, senha, tipoUsuario,dataCadastro) VALUES ('{$usuario->getNomeUsuario()}','{$usuario->getDataNascimentoUsuario()}', '{$usuario->getEmailUsuario()}','{$usuario->getSexoUsuario()}','{$usuario->getLogin()}','{$usuario->getSenha()}','{$usuario->getTipoUsuario()}', NOW())") or die( mysql_error() );

        mysql_close();
    }

    public function deletaUsuario($codUsuario){
        include '../Utils/ConectaBanco.php';

        $query = mysql_query("delete from tbusuario where codUsuario = '{$codUsuario}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        mysql_close();
    }

    public function getTodosUsuarios(){
      include_once '/Utils/ConectaBanco.php';
      include_once 'Entity_Telefone.php';

      $tele_ent = new Entity_Telefone();

      $query = mysql_query( "SELECT * FROM tbusuario where tipoUsuario like 'comum'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

       $lista = $lista."<tbody><tr>
   <td>{$row['nomeUsuario']}</td>
   <td>{$row['dataNascimentoUsuario']}</td>
   <td>{$row['emailUsuario']}</td>
   <td>{$row['sexoUsuario']}</td>
     <td>{$tele_ent->getTelefonesPeloUsuario($row['codUsuario'])}</td>
   <td>";

  $lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codUsuario'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
      <a onclick = "deletar('.$row['codUsuario'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


      }
      return $lista;
  }

  public function getTodosUsuariosRelatorio($nome, $email,$sexo,$tel,$cnome,$cnascimento,$cemail,$csexo,$clogin,$ctelefone,$copcoes){
    include_once '/Utils/ConectaBanco.php';
    include_once 'Entity_Telefone.php';

    $tele_ent = new Entity_Telefone();

    $pesquisa =  "SELECT * FROM tbusuario where tipoUsuario like 'comum'";

    if(!empty($nome)){
      $pesquisa = $pesquisa . " AND nomeUsuario LIKE '%". $nome. "%'";
    }
    if(!empty($email)){
      $pesquisa = $pesquisa . " AND emailUsuario LIKE '%". $email. "%'";
    }
    if(!empty($sexo)){
      $pesquisa = $pesquisa . " AND sexoUsuario LIKE '". $sexo."'";
    }
    if(!empty($tel)){
      $pesquisa = $pesquisa . " AND codUsuario in (Select codUsuario from tbtelefoneusuario where numTelefoneUsuario like '".$tel."')";
    }

    $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
    $lista = "<thead><tr>";
    if(empty($cnome)){
      $lista = $lista . "<th>Nome</th>";
    }
    if(empty($cnascimento)){
      $lista = $lista . "<th>Nascimento</th>";
    }
    if(empty($cemail)){
      $lista = $lista . "<th>Email</th>";
    }
    if(empty($csexo)){
      $lista = $lista . "<th>Sexo</th>";
    }
    if(empty($ctelefone)){
      $lista = $lista . "<th>Telefones</th>";
    }
    if(empty($copcoes)){
      $lista = $lista . "<th>Opções</th>";
    }
    $lista = $lista . "</tr></thead>";
    if($query != "")
    while($row = mysql_fetch_assoc($query)){

      $lista =$lista. "<tbody><tr>";
      if(empty($cnome)){
        $lista = $lista . " <td>{$row['nomeUsuario']}</td>";
      }
      if(empty($cnascimento)){
        $lista = $lista . " <td>{$row['dataNascimentoUsuario']}</td>";
      }
      if(empty($cemail)){
        $lista = $lista . " <td>{$row['emailUsuario']}</td>";
      }
      if(empty($csexo)){
        $lista = $lista . " <td>{$row['sexoUsuario']}</td>";
      }
      if(empty($ctelefone)){
        $lista = $lista . " <td>{$tele_ent->getTelefonesPeloUsuario($row['codUsuario'])}</td>";
      }
      if(empty($copcoes)){
        $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codUsuario'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
            <a onclick = "deletar('.$row['codUsuario'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
              <a onclick = "relatorio('.$row['codUsuario'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';
      }
      $lista = $lista . "</tr></tbody>";
    }
    return $lista;
}

  public function getTodosUsuariosFunc(){
    include_once '/Utils/ConectaBanco.php';
    include_once 'Entity_Telefone.php';

    $tele_ent = new Entity_Telefone();

    $query = mysql_query("SELECT * FROM tbusuario where tipoUsuario like 'admim'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
    $lista = "";
    if($query != "")
    while($row = mysql_fetch_assoc($query)){
    $salario = number_format($row['salarioFuncionario'],2,",",".");
     $lista = $lista."<tbody><tr>
 <td>{$row['nomeUsuario']}</td>
 <td>{$row['dataNascimentoUsuario']}</td>
 <td>{$row['emailUsuario']}</td>
 <td>{$row['sexoUsuario']}</td>
 <td>{$row['login']}</td>
 <td>R$ ".$salario."</td>
 <td>{$row['cpfFuncionario']}</td>
 <td>{$tele_ent->getTelefonesPeloUsuario($row['codUsuario'])}</td>
 <td>";

$lista = $lista.'<a data-toggle="modal" data-target="#myModa'.$row['codUsuario'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
    <a onclick = "deletar('.$row['codUsuario'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
  </td></tr></tbody>';


    }
    return $lista;
}

public function getTodosUsuariosFuncRelatorio($nome, $email,$sexo,$tel,$cnome,$cnascimento,$cemail,$csexo,$clogin,$csalario,$ccpf,$ctelefone,$copcoes){
  include_once '/Utils/ConectaBanco.php';
  include_once 'Entity_Telefone.php';

  $tele_ent = new Entity_Telefone();

  $pesquisa =  "SELECT * FROM tbusuario where tipoUsuario like 'admim'";

  if(!empty($nome)){
    $pesquisa = $pesquisa . " AND nomeUsuario LIKE '%". $nome. "%'";
  }
  if(!empty($email)){
    $pesquisa = $pesquisa . " AND emailUsuario LIKE '%". $email. "%'";
  }
  if(!empty($sexo)){
    $pesquisa = $pesquisa . " AND sexoUsuario LIKE '". $sexo."'";
  }
  if(!empty($tel)){
    $pesquisa = $pesquisa . " AND codUsuario in (Select codUsuario from tbtelefoneusuario where numTelefoneUsuario like '".$tel."')";
  }

  $query = mysql_query($pesquisa) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
  $lista = "<thead><tr>";
  if(empty($cnome)){
    $lista = $lista . "<th>Nome</th>";
  }
  if(empty($cnascimento)){
    $lista = $lista . "<th>Nascimento</th>";
  }
  if(empty($cemail)){
    $lista = $lista . "<th>Email</th>";
  }
  if(empty($csexo)){
    $lista = $lista . "<th>Sexo</th>";
  }
  if(empty($clogin)){
    $lista = $lista . "<th>Login</th>";
  }
  if(empty($csalario)){
    $lista = $lista . "<th>Salario</th>";
  }
  if(empty($ccpf)){
    $lista = $lista . "<th>Cpf</th>";
  }
  if(empty($ctelefone)){
    $lista = $lista . "<th>Telefones</th>";
  }
  if(empty($copcoes)){
    $lista = $lista . "<th>Opções</th>";
  }
  $lista = $lista . "</tr></thead>";
  if($query != "")
  while($row = mysql_fetch_assoc($query)){
  $salario = number_format($row['salarioFuncionario'],2,",",".");

  $lista =$lista. "<tbody><tr>";
  if(empty($cnome)){
    $lista = $lista . " <td>{$row['nomeUsuario']}</td>";
  }
  if(empty($cnascimento)){
    $lista = $lista . " <td>{$row['dataNascimentoUsuario']}</td>";
  }
  if(empty($cemail)){
    $lista = $lista . " <td>{$row['emailUsuario']}</td>";
  }
  if(empty($csexo)){
    $lista = $lista . " <td>{$row['sexoUsuario']}</td>";
  }
  if(empty($clogin)){
    $lista = $lista . " <td>{$row['login']}</td>";
  }
  if(empty($csalario)){
    $lista = $lista . " <td>R$ ".$salario."</td>";
  }
  if(empty($ccpf)){
    $lista = $lista . " <td>{$row['cpfFuncionario']}</td>";
  }
  if(empty($ctelefone)){
    $lista = $lista . " <td>{$tele_ent->getTelefonesPeloUsuario($row['codUsuario'])}</td>";
  }
  if(empty($copcoes)){
    $lista = $lista.'<td><a data-toggle="modal" data-target="#myModa'.$row['codUsuario'].'"  data-dismiss="modal" ><img src="./imagens/editar.png"  width="20px" alt="editar"></a>
        <a onclick = "deletar('.$row['codUsuario'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a>
          <a onclick = "relatorio('.$row['codUsuario'].')"><img src="./imagens/relatorio.png" width="20px" alt="relatorio"></a></td></tr></tbody>';
  }
  $lista = $lista . "</tr></tbody>";
  }
  return $lista;
}

    public function SelectLogin(Usuario $usuario){
      session_start();
        include_once 'C:\wamp\www\batata\sistema\Utils\ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbusuario WHERE login like '{$usuario->getLogin()}' AND senha like '{$usuario->getSenha()}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $retorno = false;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $retorno = true;
            session_start();
            $_SESSION['login'] = $row['login'];
            $_SESSION['logado'] = 'true';
        }
        return $retorno;
    }

    public function getNome($login){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbusuario WHERE login = '{$login}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $row['nomeUsuario'];

        }
        return $cod;
    }

    public function getCodIndex($login){
        include_once "/Utils/ConectaBanco.php";
        include_once "/Models/Usuario.php";
        $agen = "";
        $query = mysql_query( "SELECT * FROM tbusuario WHERE login = '{$login}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $agen = $row['codUsuario'];
            // $agen->setNomeUsuario($row['nomeUsuario']);
            // $agen->setDataNascimentoUsuario($row['dataNascimentoUsuario']);
            // $agen->setEmailUsuario($row['emailUsuario']);
            // $agen->setSexoUsuario($row['sexoUsuario']);
            // $agen->setLogin($row['login']);
            // $agen->setSenha($row['senha']);
            // $agen->setTipoUsuario($row['tipoUsuario']);
            // $agen->setSalarioFuncionario($row['salarioFuncionario']);
            // $agen->setCpfUsuario($row['cpfUsuario']);

        }
        return $agen;
    }

	public function getCodOutras($login){
        include '../Utils/ConectaBanco.php';
        $agen = "";
        $query = mysql_query( "SELECT * FROM tbusuario WHERE login = '{$login}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $agen = $row['codUsuario'];
        }
        return $agen;
    }

    public function getTipoUsuario($login){
        include_once '..\sistema\Utils\ConectaBanco.php';
        $agen = "";
        $query = mysql_query( "SELECT * FROM tbusuario WHERE login = '{$login}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $agen = $row['tipoUsuario'];
        }
        return $agen;
    }

    public function getTodosEditUsuario(){
      include_once '/Utils/ConectaBanco.php';

      $query = mysql_query( "SELECT * FROM tbusuario") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

     $lista = $lista.'<div class="modal fade" id="myModa'.$row['codUsuario'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
          <div class="modal-dialog" role="document">
          <form class="form-signin" role="form" action="Chamadas/editUsuarioComum.php?id='.$row['codUsuario'].'" method="post">

              <div class="modal-content" style="height:383px;;width:60%;">
                  <div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title"><center><font color="pink">Edite o Usuario</font></center></h4>
                  </div>
                  <center>
                  <div class="modal-body" >
                  <p> Nome :
                    <label>
                      <input type="text" name="nome" class="form-control" value="'.$row['nomeUsuario'].'" placeholder="'.$row['nomeUsuario'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                  <p> Email :
                    <label>
                      <input type="email" name="email" class="form-control" value="'.$row['emailUsuario'].'" placeholder="'.$row['emailUsuario'].'"
                      required autofocus style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                  <p> Nascimento :
                    <label>
                      <input type="date" name="data" class="form-control"  required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                <p> Sexo :
                 <label style="width:200px;">
                  <select name="sexo" class="form-control" required autofocus style="width:100%; margin-left:0%;">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
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

	    public function getTodosEditFunc(){
      include_once '/Utils/ConectaBanco.php';

      $query = mysql_query( "SELECT * FROM tbusuario") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
      $lista = "";
      if($query != "")
      while($row = mysql_fetch_assoc($query)){

     $lista = $lista.'<div class="modal fade" id="myModa'.$row['codUsuario'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:20%;">>
          <div class="modal-dialog" role="document">
          <form class="form-signin" role="form" action="Chamadas/editUsuario.php?id='.$row['codUsuario'].'" method="post">

              <div class="modal-content" style="height:530px;width:60%;">
                  <div class="modal-header"style="background:captiontext;opacity: 0.70; z-index:1000;">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title"><center><font color="pink">Edite o Funcionario</font></center></h4>
                  </div>
                  <center>
                  <div class="modal-body" >
                  <p> Nome :
                    <label>
                      <input type="text" name="nome" class="form-control" value="'.$row['nomeUsuario'].'" placeholder="'.$row['nomeUsuario'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                  <p> Email :
                    <label>
                      <input type="email" name="email" class="form-control" value="'.$row['emailUsuario'].'" placeholder="'.$row['emailUsuario'].'"
                      required autofocus style="width:100%; margin-left:0%;">
                    </label>
                  </p>



                  <p> Login :
                    <label>
                      <input type="text" name="login" class="form-control" value="'.$row['login'].'" placeholder="'.$row['login'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                  <p> Nascimento :
                    <label>
                      <input type="date" name="data" class="form-control"  required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

				  <p> Salario :
                    <label>
                      <input type="text" name="salario" class="form-control" value="'.$row['salarioFuncionario'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

				  <p> Cpf :
                    <label>
                      <input type="text" name="cpf" class="form-control" value="'.$row['cpfFuncionario'].'" required autofocus
                      style="width:100%; margin-left:0%;">
                    </label>
                  </p>

                <p> Sexo :
                 <label style="width:200px;">
                  <select name="sexo" class="form-control" required autofocus style="width:100%; margin-left:0%;">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
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

?>
