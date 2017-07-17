<?php

class Entity_Destaques{

    function __construct(){

    }
    public function deletarS($codSliderPrincipal){
        include '../Utils/ConectaBanco.php';
        
        $sql = mysql_query("delete FROM servicosindex  where codServico = '{$codSliderPrincipal}'") or die( mysql_error() );
      
           
        mysql_close();
    }
    public function deletarP($codSliderPrincipal){
        include '../Utils/ConectaBanco.php';
        
        $sql = mysql_query("delete FROM pacotesindex  where codPacote = '{$codSliderPrincipal}'") or die( mysql_error() );
      
           
        mysql_close();
    }

   
    public function InsertServico($nomeimagem){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO servicosindex(codServico) VALUES ('{$nomeimagem}')") or die( mysql_error() );
      
        mysql_close();
    }
    public function InsertPacote($nomeimagem){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO pacotesindex(codPacote) VALUES ('{$nomeimagem}')") or die( mysql_error() );
      
        mysql_close();
    }

      public function getTodosServicos(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM servicosindex inner join tbservico on servicosindex.codServico = tbservico.codServico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>{$row['nomeServico']}</td>
     <td>";

    $lista = $lista.'<a onclick = "deletarS('.$row['codServico'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


        }
        return $lista;
    }

 public function getTodosPacotes(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM pacotesindex inner join tbpacote on pacotesindex.codPacote = tbpacote.codPacote") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista."<tbody><tr>
     <td>{$row['nomePacote']}</td>
     <td>";

    $lista = $lista.'<a onclick = "deletarP('.$row['codPacote'].')"><img src="./imagens/lixeira.png" width="20px" alt="excluir"></a></td></tr></tbody>';


        }
        return $lista;
    }

    public function getNServicos(){
        include_once '../Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM servicosindex ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $intt = 0;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

        $intt = $intt+1;

        }
        return $intt;
    }

        public function getNPacotes(){
        include_once '../Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM pacotesindex ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $intt = 0;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

        $intt = $intt+1;

        }
        return $intt;
    }

     public function getExistsServicos($valor){
        include_once '../Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM servicosindex where codServico = ".$valor) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $intt = 0;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

        $intt = $intt+1;

        }
        return $intt;
    }

        public function getExistsPacotes($valor){
        include_once '../Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM pacotesindex where codPacote = ".$valor) or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $intt = 0;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

        $intt = $intt+1;

        }
        return $intt;
    }

 public function getTodosPortifolioServicos(){
        include_once '../sistema/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM servicosindex inner join tbservico on servicosindex.codServico = tbservico.codServico") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $lista = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

         $lista = $lista. '<div class="portfolio-item col-md-3 col-sm-6">
                        <div class="portfolio-thumb">
                            <img src="../sistema/imagens/imagensUpload/'.$row['nomeImagem'].'" alt="Cortes" height="230px;" >
                            <div class="portfolio-overlay">
                                <h3>'.$row['nomeServico'].'</h3>
                                <p>'.$row['descServico'].'</p>
                                <a href="../sistema/imagens/imagensUpload/'.$row['nomeImagem'].'" data-rel="lightbox" class="expand">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div> 
                        </div> 
                    </div> ';

        }
        return $lista;
    }


  
}
