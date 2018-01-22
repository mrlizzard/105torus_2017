<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class Test extends TestCase {

    public function bisecetion_test() {
    	$exit = 0;
    	$got = array();
    	$expected = array(
    		"x = 0.5",
			"x = 0.75",
			"x = 0.625",
			"x = 0.5625",
			"x = 0.53125",
			"x = 0.515625",
			"x = 0.523438",
			"x = 0.519531",
			"x = 0.521484",
			"x = 0.522461",
			"x = 0.522949",
			"x = 0.522705",
			"x = 0.522827",
			"x = 0.522766",
			"x = 0.522736",
			"x = 0.522751",
			"x = 0.522743",
			"x = 0.522739",
			"x = 0.522741",
			"x = 0.522740"
    	);

    	exec("./105torus 1 -1 0 6 -5 1 6", $got, $exit);

    	$this->assertEquals($exit, "0");
    	$this->assertEquals($got, $expected);
    }

}