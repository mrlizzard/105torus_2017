<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** SecantMethod class
 **
 ** @author Cyril COLINET
 ** @version 1.0
 ** @since 1.0
 **/
class SecantMethod extends Method {

	private $point01;
	private $point02;

	/**
	 ** Class constructor.
	 **
	 ** @param (array) $argv, default = NULL
	 ** @param (boolean) $verbose
	 **/
	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	/**
	 ** Public calcul function.
	 ** Settings class with the default variables values
	 **
	 ** @param (void)
	 **/
	public function calcul() {
		$this->point01 = 0.4;
		$this->point02 = 0.8;

		if ($this->verbose) {
			printf("Using secant method.\n");
			printf("Initial point 01 => %.1f\n", $this->point01);
			printf("Initial point 02 => %.1f\n", $this->point02);
		}
	}

	/**
	 ** Public display function.
	 ** Display the result and print the final function only
	 ** if the verbose mode is active.
	 **
	 ** @param (void)
	 **/
	public function display() {
		
	}

}