<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase {

	public function testTooLessArgument() {
		$exit = 0;

		exec("./105torus", $got, $exit);

		$this->assertEquals($exit, "84");
		$this->assertEquals($got[0], "Too much/less arguments. Only 7 (or 8) arguments needed.");
	}

	public function testTooMuchArgument() {
		$exit = 0;
		$got = array();

		exec("./105torus 3 5 6 7 8 9 0 6 1", $got, $exit);

		$this->assertEquals($exit, "84");
		$this->assertEquals($got[0], "Too much/less arguments. Only 7 (or 8) arguments needed.");
	}

}