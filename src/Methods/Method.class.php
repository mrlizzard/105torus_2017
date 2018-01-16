<?php 

namespace Methods;

/**
 ** NewtonMethod abstract class
 **
 ** @author Cyril COLINET
 ** @version 1.0
 ** @since 1.0
 **/
abstract class Method {

	public $precision;
	public $precision_pow10;

	public $equation;
	public $verbose;

	/**
	 ** Private verbose function.
	 ** Print settings when verbose mode is active.
	 **
	 ** @param (void)
	 **/
	private function verbose() {
		printf("Precision is set to %d.\n", $this->precision);
		printf("Equation settings:\n");

		foreach ($this->equation as $key => $value) {
			printf("  (key, value) => (%s, %d)\n", $key, $value);
		}
	}

	/**
	 ** Public configure function.
	 ** Configure class with variables name, and set equation
	 **
	 ** @param (array) $argv, default = NULL
	 **/
	public function configure($argv = NULL) {
		if ($argv == NULL || !is_bool($this->verbose))
			exit(84);

		$add = ($this->verbose ? 1 : 0);
		$this->precision = $argv[7 + $add];
		$this->precision_pow10 = pow(10, $this->precision);

		for ($loop = 2 + $add, $i = 0; $loop < 7 + $add; $loop++, $i++)
			$this->equation['a' . $i] = $argv[$loop];

		if (count($this->equation) != 5) {
			printf("Error while setting equation array.\n");
			exit(84);
		}

		if ($this->verbose)
			$this->verbose();
	}

	/**
	 ** Public calcul function.
	 ** Settings class with the default variables values
	 **
	 ** @param (void)
	 **/
	public abstract function calcul();

	/**
	 ** Public display function.
	 ** Display the result and print the final function only
	 ** if the verbose mode is active.
	 **
	 ** @param (void)
	 **/
	public abstract function display();

}