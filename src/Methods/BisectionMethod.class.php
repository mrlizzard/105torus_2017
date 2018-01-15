<?php 

namespace Methods;

include "Method.class.php";

use Methods\Method;

class BisectionMethod extends Method {

	public function __construct($argv = NULL) {
		$this->configure($argv);
	}

}