<?php 

namespace Methods;

abstract class Method {

	public $equation;

	public function __construct($argv = NULL, $verbose = false) {
		$this->equation = array();
		$this->configure($argv);
	}

	public function configure($argv = NULL, $verbose = false) {
		if ($argv == NULL || !is_bool($verbose))
			exit(84);

		for ($loop = (($verbose == true) ? 3 : 2), $i = 0; $loop < 7; $loop++, $i++)
			$this->equation[$i] = $argv[$loop];

		if (count($this->equation) != 5) {
			printf("Error while setting equation array.\n");
			exit(84);
		}
	}

	public abstract function calcul();

	public abstract function display();

}