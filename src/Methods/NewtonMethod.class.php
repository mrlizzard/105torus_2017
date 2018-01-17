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

	private $point01;
	private $point02;

	private $func_xn;
	private $func_xn2;
	private $func_pxn;

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
		$this->point01 = 0.5;
		$this->point02 = 0;
		$this->func_pxn = 0;
		$this->func_xn = 0;
		$this->func_xn2 = 0;

		if ($this->verbose) {
			printf("Using newton's method.\n");
			printf("Initial point => %.1f\n", $this->point01);
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
			$this->calc_function("func_xn", $this->point01);
			$this->calc_function("func_pxn", $this->point01, true);

			if ($this->func_pxn == 0) {
				printf("Error: Division by zero impossible.\n");
				exit(84);
			}

			$this->point02 = $this->point01 - ($this->func_xn / $this->func_pxn);
			$round01 = round($this->point01 * $this->precision_pow10);
			$round02 = round($this->point02 * $this->precision_pow10);

			$this->calc_function("func_xn2", $this->point02);
			printf("x = %s\n", $this->float_formating($this->point01));

			if ($round01 == $round02) {
				if ($this->verbose || $this->disp_func)
					printf("f(x): %.1e\n", $this->func_xn2);

				exit(0);
			}

			$this->point01 = $this->point02;
		}
	}

	/**
	 ** Public calc_function function.
	 ** Calculus the function passed ad parameter and set it
	 ** into class variable.
	 **
	 ** @param (String) $func, default = NULL
	 ** @param (double) $coef
	 ** @param (boolean) $prob
	 **/
	public function calc_function($func = NULL, $coef, $prob = false) {
		if (is_null($func) || $func == "" || !is_numeric($coef) || !is_bool($prob))
			exit(84);

		if ($func != "func_pxn" && $func != "func_xn" && $func != "func_xn2") {
			printf("Invalid function calculation.\n");
			exit(84);
		}

		if ($prob) {
			$this->$func = (4 * ($this->equation['a4'] * pow($coef, 3)));
			$this->$func += (3 * ($this->equation['a3'] * pow($coef, 2)));
			$this->$func += (2 * $this->equation['a2'] * $coef);
			$this->$func += $this->equation['a1'];
		} else {
			$this->$func = ($this->equation['a4'] * pow($coef, 4));
			$this->$func += ($this->equation['a3'] * pow($coef, 3));
			$this->$func += ($this->equation['a2'] * pow($coef, 2));
			$this->$func += ($this->equation['a1'] * $coef);
			$this->$func += $this->equation['a0'];
		}
	}

}