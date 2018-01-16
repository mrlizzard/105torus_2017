<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

class BisectionMethod extends Method {

	public function __construct($argv = NULL, $verbose) {
		$this->configure($argv, $verbose);
	}

	public function calcul() {
		foreach ($this->equation as $value) {
			printf("\$value = %d\n", $value);
		}
	}

	public function display() {

	}

}