<?php
class Pacote{

	private $codPacote;
	private $nomePacote;
  	private $valorPacote;
  	private $dataCadastro;
    private $nomeImagem;


	function __construct(){}

	public function getCodPacote(){
		return $this->codPacote;
	}

	public function getNomePacote(){
		return $this->nomePacote;
	}

	public function getValorPacote(){
		return $this->valorPacote;
	}

	public function getDataCadastro(){
		return $this->dataCadastro;
	}

	public function getNomeImagem(){
		return $this->nomeImagem;
	}

	public function setNomeImagem($nomeImagem){
		$this->nomeImagem=$nomeImagem;
	}

	public function setCodPacote($codPacote){
		$this->codPacote=$codPacote;
	}

	public function setNomePacote($nomePacote){
		$this->nomePacote=$nomePacote;
	}

	public function setValorPacote($valorPacote){
		$this->valorPacote=$valorPacote;
	}

	public function setDataCadastro($dataCadastro){
		$this->dataCadastro=$dataCadastro;
	}
}
?>
