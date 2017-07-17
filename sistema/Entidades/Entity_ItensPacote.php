<?php

class Entity_ItensPacote{

    function __construct(){

    }

    public function InsertComum($codPacote, $codServico){
        include '../Utils/ConectaBanco.php';
        $sql = mysql_query("INSERT INTO tbitenspacote(codPacote, codServico) VALUES ('{$codPacote}','{$codServico}')") or die( mysql_error() );

        mysql_close();
    }

    public function deletaItensPacote($codPacote){
        include '../Utils/ConectaBanco.php';

        $query = mysql_query("delete from tbitenspacote where codPacote = '{$codPacote}'") or die( '<p class="bg-danger">'.mysql_error().'</p>' );

        mysql_close();
    }


    public function getItensPeloPacote($codPacote){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbitenspacote inner join tbservico on tbservico.codServico = tbitenspacote.codServico WHERE codPacote = '{$codPacote}' ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod . $row['nomeServico'] . "<br> ";

        }
        return $cod;
    }

    public function getServicosPeloPacote($codPacote){
        include_once '/Utils/ConectaBanco.php';
        $query = mysql_query( "SELECT * FROM tbitenspacote inner join tbservico on tbservico.codServico = tbitenspacote.codServico WHERE codPacote = '{$codPacote}' ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $cod = "";
        $isa = 1;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){
            $cod = $cod.'<label style="width:200px;"><input class="form-control" name="servicos'.$isa.'" id="disabledInput" type="text" value="'. $row['nomeServico'] .'"></label>';
            $isa  = $isa + 1;
        }
        return $cod;
    }

    public function getHorariosPeloPacote($codPacote){
        include_once '/Utils/ConectaBanco.php';

        $query = mysql_query( "SELECT * FROM tbitenspacote inner join tbservico on tbservico.codServico = tbitenspacote.codServico WHERE codPacote = '{$codPacote}' ") or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $list = "";
        $isa = 1;
        if($query != "")
        while($row = mysql_fetch_assoc($query)){

            $list = $list.'<label style="width:280px;"><label style="width:120px;"><input type="date" class="form-control" name="dia'.$isa.'" type="datetime-local" value="" id="example-datetime-local-input"></label><label style="width:120px;"><input type="time" class="form-control" name="time'.$isa.'" ></label></label>';
            $isa = $isa +1;
        }

        return $list;
    }

}
