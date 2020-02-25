<?php

require_once("autoload.php");

use \Classes\Classe1;
use \Classes\Classe2;

function getData()
{
	return new Classe2("Parametro getData");
}

?>
