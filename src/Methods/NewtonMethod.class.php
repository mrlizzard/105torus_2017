<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** NewtonMethod class
 ** @extends Method (abstract)
 **/
class NewtonMethod extends Method {

	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	public function calcul() {

	}

	public function display() {
		
	}

}