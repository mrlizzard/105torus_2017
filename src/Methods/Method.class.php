<?php 

namespace Methods;

abstract class Method {

	public $equation;

	public function __construct($argv = NULL) {
		$this->equation = array();
		$this->configure($argv);
	}

	public function configure($argv = NULL) {
		if ($argv == NULL)
			exit(84);

		for ($loop = 2, $i = 0; $loop < 7; $loop++, $i++)
			$this->equation[$i] = $argv[$loop];

		if (count($this->equation) != 5) {
			printf("Error while setting equation array.\n");
			exit(84);
		}
	}

	public abstract function calcul();

}