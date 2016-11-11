<?php
class Opcao {
	public $titulo;

	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($titulo) {
		
		$this->titulo =  $titulo;
		return $this;
	}


}