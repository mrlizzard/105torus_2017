<?php 

require_once "src/Methods/BisectionMethod.class.php";
require_once "src/Methods/NewtonMethod.class.php";
require_once "src/Methods/SecantMethod.class.php";

use Methods\BisectionMethod;
use Methods\NewtonMethod;
use Methods\SecantMethod;

/**
 ** Utils class
 **
 ** @author Cyril COLINET
 ** @version 2.0
 ** @since 1.0
 **/
class Utils {

	public $verbose;
	public $start;
	public $disp_func;

	/**
	 ** Class constructor.
	 **
	 ** @param (void)
	 **/
	public function __construct() {
		$this->verbose = false;
		$this->start = 1;
		$this->disp_func = false;
	}

	/**
	 ** Public check_help function.
	 ** Check if the help flag is present, and display
	 ** the help of this poject
	 **
	 ** @param (array) $argv
	 **/
	public function check_help($argv) {
		$args = count($argv);

		if ($args == 2 && $argv[1] == "-h") {
			printf("USAGE:\n\t./105torus [-v,--verbose,-f,--func] opt a0 a1 a2 a3 a4 n\n\n");
			printf("DESCRIPTION:\n");
			printf("\t-v, --verbose\tVerbose mode (debug)\n");
			printf("\t-f, --func\tDisplay function at the end of iterations\n");
			printf("\topt\t\tMethod number (0: bisection, 1: newton, 2: secant)\n");
			printf("\ta(i)\t\tCoefficients of the equation\n");
			printf("\tn\t\tPrecision (meaning the application of the polynomial\n");
			printf("\t\t\tto the solution should be smaller than 10^-n)\n");
		}
	}

	/**
	 ** Public check_flags function.
	 ** Check the verbose, func, and if the amount if correct
	 ** and don't exceed the maximum of arguments.
	 **
	 ** @param (array) $argv
	 **/
	public function check_flags($argv) {
		$args = count($argv);

		if ($args == 9 && ($argv[1] == "-v" || $argv[1] == "--verbose")) {
			$this->start++;
			$this->verbose = true;
			printf("Verbose mode actived.\n");
		} else if ($args == 9 && ($argv[1] == "-f" || $argv[1] == "--func")) {
			$this->start++;
			$this->disp_func = true;
		} else if ($args != 8) {
			printf("Too much/less arguments. Only 7 (or 8) arguments needed.\n");
			exit(84);
		}
	}

	/**
	 ** Public check_arguments function.
	 ** Check if all the arguments is correct.
	 ** Only equation numbers is checked, flags and method is check after.
	 **
	 ** @param (array) $argv
	 **/
	public function check_arguments($argv) {
		for ($loop = $this->start; $loop < (($this->start == 1 ? 8 : 9)); $loop++) { 
			if (!is_numeric($argv[$loop])) {
				printf("One of the arguments isn't a number.\n");
				exit(84);
			}
		}
	}

	/**
	 ** Public select_method function.
	 ** Select the method who want to use.
	 ** Must be between 1 and 3 (included).
	 **
	 ** @param (array) $argv
	 ** @return (Method) $method
	 **/
	public function select_method($argv) {
		$nmet = $argv[$this->start];

		if ($nmet == 1) {
			$method = new BisectionMethod($argv, $this->verbose, $this->disp_func);
		} else if ($nmet == 2) {
			$method = new NewtonMethod($argv, $this->verbose, $this->disp_func);
		} else if ($nmet == 3) {
			$method = new SecantMethod($argv, $this->verbose, $this->disp_func);
		} else {
			$method = NULL;
		}

		if ($method == NULL) {
			printf("Method must be between 1 and 3(included)\n");
			exit(84);
		}

		return ($method);
	}

}