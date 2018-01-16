<?php 

namespace Methods;

abstract class Method {

	public $equation;
	public $verbose;

	private function verbose_equation() {
		printf("Equation settings:\n");

		foreach ($this->equation as $key => $value) {
			printf("  (key, value) => (%s, %d)\n", $key, $value);
		}
	}

	public function configure($argv = NULL) {
		if ($argv == NULL || !is_bool($this->verbose))
			exit(84);

		$add = ($this->verbose ? 1 : 0);

		for ($loop = 2 + $add, $i = 0; $loop < 7 + $add; $loop++, $i++)
			$this->equation['a' . $i] = $argv[$loop];

		if (count($this->equation) != 5) {
			printf("Error while setting equation array.%d\n", count($this->equation));
			exit(84);
		}

		if ($this->verbose)
			$this->verbose_equation();
	}

	public abstract function calcul();

	public abstract function display();

}