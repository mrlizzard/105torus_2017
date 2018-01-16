<?php 

namespace Methods;

abstract class Method {

	public $precision;
	public $precision_pow10;

	public $equation;
	public $verbose;

	private function verbose_equation() {
		printf("Precision is set to %d.\n", $this->precision);
		printf("Equation settings:\n");

		foreach ($this->equation as $key => $value) {
			printf("  (key, value) => (%s, %d)\n", $key, $value);
		}
	}

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
			$this->verbose_equation();
	}

	public abstract function calcul();

	public abstract function display();

}