<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** SecantMethod class
 ** @extends Method (abstract)
 **/
class SecantMethod extends Method {

	private $point01;
	private $point02;

	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	public function calcul() {
		$this->point01 = 0.4;
		$this->point02 = 0.8;

		if ($this->verbose) {
			printf("Using secant method.\n");
			printf("Initial point 01 => %.1f\n", $this->point01);
			printf("Initial point 02 => %.1f\n", $this->point02);
		}
	}

	public function display() {
		
	}

}