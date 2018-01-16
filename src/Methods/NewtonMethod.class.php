<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** NewtonMethod class
 ** @extends Method (abstract)
 **/
class NewtonMethod extends Method {

	private $point;

	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	public function calcul() {
		$this->point = 0.5;

		if ($this->verbose) {
			printf("Using newton's method.\n");
			printf("Initial point => %.1f\n", $this->point);
		}
	}

	public function display() {
		
	}

}