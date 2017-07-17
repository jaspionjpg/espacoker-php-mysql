<?php
class Caixa{

	private $codCaixa;
	private $valorCaixa;
	private $dataCaixa;
	private $codOrigemCaixa;

	function __construct(){}

	public function getCodCaixa(){
		return $this->codCaixa;
	}

	public function getValorCaixa(){
		return $this->valorCaixa;
	}

	public function getCodOrigemCaixa(){
		return $this->codOrigemCaixa;
	}

	public function getDataCaixa(){
		return $this->dataCaixa;
	}

	public function setCodCaixa($codCaixa){
		$this->codCaixa=$codCaixa;
	}

	public function setValorCaixa($valorCaixa){
		$this->valorCaixa=$valorCaixa;
	}

	public function setCodOrigemCaixa($codOrigemCaixa){
		$this->codOrigemCaixa=$codOrigemCaixa;
	}

	public function setDataCaixa($dataCaixa){
		$this->dataCaixa=$dataCaixa;
	}
}
?>
