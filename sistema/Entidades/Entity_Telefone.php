<?php

class Entity_Telefone{

    function __construct(){

    }

    public function InsertComum($codUsuario, $numUsuario){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbtelefoneusuario(numTelefoneUsuario, codUsuario) VALUES ('{$numUsuario}','{$codUsuario}')") or die( mysql_error() );

        mysql_close();
    }

    public function getTelefonesPeloUsuario($codUsuario){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbtelefoneusuario WHERE codUsuario = '{$codUsuario}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod . "".$row['numTelefoneUsuario']. "<br> ";

        }
        return $cod;
    }

}
