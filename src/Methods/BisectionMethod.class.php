<?php

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

/**
 ** BisectionMethod class
 **
 ** @author Cyril COLINET
 ** @version 1.0
 ** @since 1.0
 **/
class BisectionMethod extends Method {

	private $point01;
	private $point02;

	private $xm;
	private $func_xm;
	private $func_x1;

	/**
	 ** Class constructor.
	 **
	 ** @param (array) $argv, default = NULL
	 ** @param (boolean) $verbose
	 ** @param (boolean) $disp_func
	 **/
	public function __construct($argv = NULL, $verbose, $disp_func) {
		$this->verbose = $verbose;
		$this->disp_func = $disp_func;

		$this->configure($argv);
	}

	/**
	 ** Public calcul function.
	 ** Settings class with the default variables values
	 **
	 ** @param (void)
	 **/
	public function calcul() {
		$this->point01 = 0;
		$this->point02 = 1;
		$this->xm = 0;
		$this->func_xm = 0;
		$this->func_x1 = 0;

		if ($this->verbose) {
			printf("Using bisection method.\n");
			printf("Initial point 01 => %d\n", $this->point01);
			printf("Initial point 02 => %d\n", $this->point02);
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
		for ($i = 0; $i < 250; $i++) {
			$this->xm = ($this->point01 + $this->point02) / 2;
			$this->calc_function("func_xm", $this->xm);
			$this->calc_function("func_x1", $this->point01);

			if (($this->func_x1 * $this->func_xm) < 0) {
				$this->point02 = $this->xm;
			} else {
				$this->point01 = $this->xm;
			}

			$round01 = round($this->point01 * $this->precision_pow10);
			$round02 = round($this->point02 * $this->precision_pow10);

			if ($round01 == $round02) {
				if ($this->verbose || $this->disp_func)
					printf("f(x): %.1e\n", $this->func_xm);
				
				exit(0);
			}

			printf("x = %s\n", $this->float_formating($this->xm));
		}
	}

	/**
	 ** Privat ecalc_function function.
	 ** Calculus the function passed ad parameter and set it
	 ** into class variable.
	 **
	 ** @param (String) $func, default = NULL
	 ** @param (double) $coef
	 **/
	private function calc_function($func = NULL, $coef) {
		if (is_null($func) || $func == "" || !is_numeric($coef))
			exit(84);

		if ($func != "func_xm" && $func != "func_x1") {
			printf("Invalid function calculation.\n");
			exit(84);
		}

		$this->$func = ($this->equation['a4'] * pow($coef, 4));
		$this->$func += ($this->equation['a3'] * pow($coef, 3));
		$this->$func += ($this->equation['a2'] * pow($coef, 2));
		$this->$func += ($this->equation['a1'] * $coef);
		$this->$func += $this->equation['a0'];
	}

}