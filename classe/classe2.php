<?php

namespace Classes;

class Classe2 {

	protected $parametro;
	
	public function __construct($parametro)
	{
		$this->parametro = $parametro . "::Classe2";
	}
	
	public function getDataClasse2()
	{
		var_dump("getDataClasse2");
	
		return $this->parametro;
	}
	
}

?>
