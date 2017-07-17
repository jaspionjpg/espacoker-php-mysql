<?php
Class Agendamento{

	private $codAgendamento;
	private $dataAgendamento;
	private $horarioAgendamento;
	private $codUsuario;
	private $codServico;

	function __construct(){}

	public function getCodAgendamento(){
		return $this->codAgendamento;
	}

	public function getDataAgendamento(){
		return $this->dataAgendamento;
	}

	public function getHorarioAgendamento(){
		return $this->horarioAgendamento;
	}

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function getCodServico(){
		return $this->codServico;
	}

	public function setCodAgendamento($codAgendamento){
		$this->codAgendamento=$codAgendamento;
	}

	public function setDataAgendamento($dataAgendamento){
		$this->dataAgendamento=$dataAgendamento;
	}

	public function setHorarioAgendamento($horarioAgendamento){
		$this->horarioAgendamento=$horarioAgendamento;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario=$codUsuario;
	}

	public function setCodServico($codServico){
		$this->codServico=$codServico;
	}
}
