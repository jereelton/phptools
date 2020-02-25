<?php

require_once("autoload.php");

use \Classes\Classe1;
use \Classes\Classe2;

/*var_dump((new class {
	public static function test() { return "123 testando"; }
	public static function test2() { return "finalizando"; }
})->test2());*/

$obj = new Classe1(getData());

echo $obj->executarClasse1();

?>
