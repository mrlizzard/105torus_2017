<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** BisectionMethod class
 ** @extends Method (abstract)
 **/
class BisectionMethod extends Method {

	private $point01;
	private $point02;

	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	public function calcul() {
		$this->point01 = 0;
		$this->point02 = 1;

		if ($this->verbose) {
			printf("Using bisection method.\n");
			printf("Initial point 01 => %d.\n", $this->point01);
			printf("Initial point 02 => %d.\n", $this->point02);
		}
	}

	public function display() {

	}

}