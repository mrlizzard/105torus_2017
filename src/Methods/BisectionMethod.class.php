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

	private $xm;
	private $func_xm;
	private $func_x1;

	public function __construct($argv = NULL, $verbose) {
		$this->verbose = $verbose;

		$this->configure($argv);
	}

	public function calcul() {
		$this->point01 = 0;
		$this->point02 = 1;

		if ($this->verbose) {
			printf("Using bisection method.\n");
			printf("Initial point 01 => %d\n", $this->point01);
			printf("Initial point 02 => %d\n", $this->point02);
		}
	}

	public function display() {
		$this->xm = 0;
		$this->func_xm = 0;
		$this->func_x1 = 0;

		for ($i = 0; $i < 250; $i++) { 
			if (round($this->point01 * $this->precision_pow10) == round($this->point02 * $this->precision_pow10)) {
				printf("f(x): %.1e", $this->func_xm);
				exit(0);
			}

			$this->xm = ($this->point01 + $this->point02) / 2;

			printf("x = %." . $this->precision ."f\n", $this->xm);

			$this->calc_function("func_xm", $this->xm);
			$this->calc_function("func_x1", $this->x1);

			if (($this->func_x1 * $this->func_xm) < 0) {
				$this->point02 = $this->xm;
			} else {
				$this->point01 = $this->xm;
			}
		}
	}

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