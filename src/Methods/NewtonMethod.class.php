<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** NewtonMethod class
 **
 ** @author Cyril COLINET
 ** @version 1.0
 ** @since 1.0
 **/
class NewtonMethod extends Method {

	private $point;

	private $xn2;
	private $func_xn;
	private $func_xn2;
	private $func_pxn;

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
		$this->point = 0.5;

		if ($this->verbose) {
			printf("Using newton's method.\n");
			printf("Initial point => %.1f\n", $this->point);
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