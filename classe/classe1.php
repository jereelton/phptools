<?php

namespace Classes;

class Classe1 {
	
	private $obj_from_class2;
	
    public function __construct($obj_from_class2)
    {
		$this->obj_from_class2 = $obj_from_class2;
    }
	
	public function executarClasse1()
	{
		return $this->obj_from_class2->getDataClasse2();
	}
	
}

?>
