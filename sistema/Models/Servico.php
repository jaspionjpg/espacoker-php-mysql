<?php
class Servico{

	private $codServico;
	private $nomeServico;
	private $descServico;
	private $duracaoServico;
	private $valorServico;
	private $codImagem;

	function __construct(){}

	public function getCodServico(){
		return $this->codServico;
	}

	public function getNomeServico(){
		return $this->nomeServico;
	}

	public function getDescServico(){
		return $this->descServico;
	}

	public function getDuracaoServico(){
		return $this->duracaoServico;
	}

	public function getValorServico(){
		return $this->valorServico;
	}

	public function getCodImagem(){
		return $this->codImagem;
	}

	public function setCodServico($codServico){
		$this->codServico=$codServico;
	}

	public function setNomeServico($nomeServico){
		$this->nomeServico=$nomeServico;
	}

	public function setDescServico($descServico){
		$this->descServico=$descServico;
	}

	public function setDuracaoServico($duracaoServico){
		$this->duracaoServico=$duracaoServico;
	}

	public function setValorServico($valorServico){
		$this->valorServico=$valorServico;
	}

	public function setCodImagem($codImagem){
		$this->codImagem=$codImagem;
	}
}
?>
