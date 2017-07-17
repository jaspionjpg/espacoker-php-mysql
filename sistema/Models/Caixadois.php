<?php
class Caixadois{
    
    private $codCaixadois;
    private $dataCaixadois;
    private $valorCaixadois;
    
        
	function __construct(){}
    
    function getCodCaixadois() {
        return $this->codCaixadois;
    }

    function getDataCaixadois() {
        return $this->dataCaixadois;
    }

    function getValorCaixadois() {
        return $this->valorCaixadois;
    }

    function setCodCaixadois($codCaixadois) {
        $this->codCaixadois = $codCaixadois;
    }

    function setDataCaixadois($dataCaixadois) {
        $this->dataCaixadois = $dataCaixadois;
    }

    function setValorCaixadois($valorCaixadois) {
        $this->valorCaixadois = $valorCaixadois;
    }

    
        
}



?>