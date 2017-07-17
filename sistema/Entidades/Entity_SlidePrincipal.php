<?php

class Entity_SlidePrincipal{

    function __construct(){

    }

   
    public function InsertPrincipal($texto,$nomeimagem){
        include '../../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO slideprincipal(texto, nomeImagem) VALUES ('{$texto}','{$nomeimagem}')") or die( mysql_error() );
      
        mysql_close();
    }

    public function deletar($codSliderPrincipal){
        include '../Utils/ConectaBanco.php';
        
        $sql = mysql_query("delete FROM slideprincipal  where codSliderPrincipal = '{$codSliderPrincipal}'") or die( mysql_error() );
      
           
        mysql_close();
    }

      public function getImagensEdit(){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM slideprincipal ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod . '<a onclick = "deletar('.$row['codSliderPrincipal'].')"><img class="mySlides" src="imagens/imagensUpload/'.$row['nomeImagem'].'" style="width:600px; height:400px"></a>';
       }
        return $cod;
    }

     public function getImagensIndex(){
        include_once '../sistema/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM slideprincipal ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
           $cod = $cod . '<li><div class="overlay"></div>
                                <img src="../sistema/imagens/imagensUpload/'.$row['nomeImagem'].'" alt="">
                                <div class="slider-caption visible-md visible-lg"><p>
                                    '.$row['texto'].'</p>
                                    <input type="submit" class="btn btn-primary" value="Entrar" data-toggle="modal" data-target="#myModa3" style="background-color:#FF69B4;border-color:#FF69B4;"></div></li>';
       }
        return $cod;
    }




   
}
