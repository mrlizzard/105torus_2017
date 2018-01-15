<?php 

namespace Methods;

require_once "Method.class.php";

use Methods\Method;

class NewtonMethod extends Method {

	public function __construct($argv = NULL) {
		$this->configure($argv);
	}

}