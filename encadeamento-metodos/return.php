<?php

function f1() {

	return function() {
	
		return function() {
			
			return function(){
				return "f3";
			}
		}
	}
}

$var = f1();

echo $var;

?>