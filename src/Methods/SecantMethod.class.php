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

	private $xn;
	private $func_xn;
	private $func_point01;
	private $func_point02;

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
		$this->point01 = 0.4;
		$this->point02 = 0.8;
		$this->xn = 0;
		$this->func_xn = 0;
		$this->func_point01 = 0;
		$this->func_point02 = 0;

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
		for ($i = 0; $i < 250; $i++) {
			$this->calc_function("func_point01", $this->point01);
			$this->calc_function("func_point02", $this->point02);

			$sub = $this->func_point02 - $this->func_point01;
			$round01 = round($this->point01 * $this->precision_pow10);
			$round02 = round($this->point02 * $this->precision_pow10);

			if ($sub == 0) {
				printf("Error: Division by zero impossible.\n");
				exit(84);
			}

			$this->xn = $this->point02 - ($this->func_point02 * ($this->point02 - $this->point01)) / $sub;
			
			$this->calc_function("func_xn", $this->xn);
			printf("x = %." . $this->precision . "f\n", $this->xn);

			if ($round01 == $round02) {
				if ($this->verbose || $this->disp_func)
					printf("f(x): %.1e\n", $this->func_xn);
				
				exit(0);
			}

			$this->point01 = $this->point02;
			$this->point02 = $this->xn;
		}
	}

	/**
	 ** Private calc_function function.
	 ** Calculus the function passed ad parameter and set it
	 ** into class variable.
	 **
	 ** @param (String) $func, default = NULL
	 ** @param (double) $coef
	 **/
	private function calc_function($func = NULL, $coef) {
		if (is_null($func) || $func == "" || !is_numeric($coef))
			exit(84);

		if ($func != "func_point01" && $func != "func_point02" && $func != "func_xn") {
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